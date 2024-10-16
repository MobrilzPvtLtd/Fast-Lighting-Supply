<?php

namespace Modules\Import\Imports;

use Carbon\Carbon;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Collection;
use Modules\Product\Entities\Product;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\Media\Eloquent\HasMedia;
use Modules\Media\Entities\File;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Entities\EntityFile;

// class ProductImport implements OnEachRow, WithChunkReading, WithHeadingRow
class ProductImport implements ToModel, WithChunkReading, WithHeadingRow
{
    use HasMedia;

    private $rowCount = 0;
    private $products = [];
    private $files = [];

    public function chunkSize(): int
    {
        return 200;
    }

    public function model(array $row)
    {
        $this->rowCount++;

        $data = $this->normalize($row, $this->rowCount);
        // dd($data);
        try {
            \Log::channel('custom')->info("Importing... Line: {$this->rowCount}");

            $file = File::create([
                'user_id' => auth()->id(),
                'disk' => config('filesystems.default'),
                'filename' => $data['files']['base_image']['filename'],
                'path' => $data['files']['base_image']['path'],
                'extension' => pathinfo($data['files']['base_image']['filename'], PATHINFO_EXTENSION),
                'mime' => $data['files']['base_image']['mime'],
                'size' => $data['files']['base_image']['fileContent'],
            ]);

            $product = Product::create($data);
            $this->products[] = $product;
            $this->files[] = $file;

            return $product;

        } catch (\InvalidArgumentException $e) {
            \Log::channel('custom')->info("Validation error on line {$this->rowCount}: ".$e->getMessage());
        } catch (QueryException $e) {
            \Log::channel('custom')->info("Database error on line {$this->rowCount}: ".$e->getMessage());
        }
    }

    public function getRowCount()
    {
        return $this->rowCount;
    }

    public function getImportedData()
    {
        return [
            'products' => $this->products,
            'files' => $this->files,
        ];
    }


    private function normalize(array $data, int $lineNumber)
    {
        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:255|unique:products,sku',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'active' => 'boolean',
            'brand' => ['nullable', Rule::exists('brands', 'id')],
            'categories.*' => 'exists:categories,id',
            'tax_class' => ['nullable', Rule::exists('tax_classes', 'id')],
            'tags.*' => 'string|max:50',
            'price' => 'required|numeric|min:0|max:99999999999999',
            'special_price' => 'nullable|numeric|min:0|max:99999999999999',
            'special_price_type' => ['nullable', Rule::in(['fixed', 'percent'])],
            'special_price_start' => 'nullable|date|before_or_equal:special_price_end',
            'special_price_end' => 'nullable|date|after_or_equal:special_price_start',
            'manage_stock' => 'nullable|boolean',
            'quantity' => 'required_if:manage_stock,1|nullable|numeric',
            'in_stock' => 'nullable|boolean',
            'new_from' => 'nullable|date',
            'new_to' => 'nullable|date|after:new_from',
            'up_sells.*' => 'exists:products,id',
            'cross_sells.*' => 'exists:products,id',
            'related_products.*' => 'exists:products,id',
        ]);

        if ($validator->fails()) {
            $errorMessages = $validator->errors()->all();
            throw new \InvalidArgumentException("Validation errors on line $lineNumber: " . implode(', ', $errorMessages));
        }

        return array_filter([
            'name' => $data['name'],
            'sku' => $data['sku'],
            'description' => $data['description'],
            'short_description' => $data['short_description'],
            'is_active' => $data['active'],
            'brand_id' => $data['brand'],
            'categories' => $this->explode($data['categories']),
            'tax_class_id' => $data['tax_class'],
            'tags' => $this->explode($data['tags']),
            'price' => $data['price'],
            'special_price' => $data['special_price'],
            'special_price_type' => $data['special_price_type'],
            'special_price_start' => $this->formatDate($data['special_price_start']),
            'special_price_end' => $this->formatDate($data['special_price_end']),
            'manage_stock' => $data['manage_stock'] ?? 0, //bug fix
            'qty' => $data['quantity'],
            'in_stock' => $data['in_stock'] ?? 1, //bug fix
            'new_from' => $this->formatDate($data['new_from']),
            'new_to' => $this->formatDate($data['new_to']),
            'up_sells' => $this->explode($data['up_sells']),
            'cross_sells' => $this->explode($data['cross_sells']),
            'related_products' => $this->explode($data['related_products']),
            'files' => $this->normalizeFiles($data),
            'meta' => $this->normalizeMetaData($data),
            'attributes' => $this->normalizeAttributes($data),
            'options' => $this->normalizeOptions($data),
        ], function ($value) {
            return $value || is_numeric($value);
        });
    }


    private function explode($values)
    {
        if (trim($values) == '') {
            return false;
        }

        return array_map('trim', explode(',', $values));
    }


    private function normalizeFiles(array $data)
    {
        $fileData = [];

        if (!empty($data['base_image'])) {
            $fileData['base_image'] = $this->processFile($data['base_image']);
        }

        if (!empty($data['additional_images'])) {
            $additionalImages = $this->explode($data['additional_images']);
            $fileData['additional_images'] = array_map([$this, 'processFile'], $additionalImages);
        }

        return $fileData;

        // return [
        //     'base_image' => $this->getFilePathOrId($data['base_image'] ?? null),
        //     'additional_images' => array_map([$this, 'getFilePathOrId'], $this->explode($data['additional_images'] ?? '')),
        // ];
    }

    private function processFile($fileUrl)
    {
        $fileContent = file_get_contents($fileUrl);

        $fileName = uniqid() . '.' . pathinfo($fileUrl, PATHINFO_EXTENSION);
        $relativePath = "media/{$fileName}";

        Storage::put($relativePath, $fileContent);

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_buffer($finfo, $fileContent);
        finfo_close($finfo);

        return [
            'filename' => $fileName,
            'path' => $relativePath,
            'mime' => $mimeType,
            'fileContent' => strlen($fileContent)
        ];
    }


    private function formatDate($date)
    {
        return $date ? Carbon::parse($date)->format('Y-m-d') : null;
    }


    private function normalizeMetaData($data)
    {
        return [
            'meta_title' => $data['meta_title'],
            'meta_description' => $data['meta_description'],
        ];
    }


    private function normalizeAttributes(array $data)
    {
        $attributes = [];

        foreach ($this->findAttributes($data) as $attributeNumber => $attributeId) {
            $attributes[] = [
                'attribute_id' => $attributeId,
                'values' => $this->findAttributeValues($data, $attributeNumber),
            ];
        }

        return $attributes;
    }


    private function findAttributes(array $data)
    {
        return collect($data)->filter(function ($value, $column) {
            preg_match('/^attribute_\d$/', $column, $matches);

            return !empty($matches);
        })->filter();
    }


    private function findAttributeValues(array $data, $attributeNumber)
    {
        return collect($data)->filter(function ($value, $column) use ($attributeNumber) {
            return $column === "{$attributeNumber}_values";
        })->map(function ($values) {
            return $this->explode($values);
        })->flatten()->toArray();
    }


    private function normalizeOptions(array $data)
    {
        $options = [];

        foreach ($this->findOptionPrefixes($data) as $optionPrefix) {
            $option = $this->findOptionAttributes($data, $optionPrefix);

            if (is_null($option['name'])) {
                continue;
            }

            $options[] = [
                'name' => $option['name'],
                'type' => $option['type'],
                'is_required' => $option['is_required'],
                'values' => $this->findOptionValues($option),
            ];
        }

        return $options;
    }


    private function findOptionPrefixes(array $data)
    {
        return collect($data)->filter(function ($value, $column) {
            preg_match('/^option_\d_name$/', $column, $matches);

            return !empty($matches);
        })->keys()->map(function ($column) {
            return str_replace('_name', '', $column);
        });
    }


    private function findOptionAttributes(array $data, $optionPrefix)
    {
        return collect($data)->filter(function ($value, $column) use ($optionPrefix) {
            preg_match("/{$optionPrefix}_.*/", $column, $matches);

            return !empty($matches);
        })->mapWithKeys(function ($value, $column) use ($optionPrefix) {
            $column = str_replace("{$optionPrefix}_", '', $column);

            return [$column => $value];
        });
    }


    private function findOptionValues(Collection $option)
    {
        $values = [];

        foreach ($this->findOptionValuePrefixes($option) as $valuePrefix) {
            $value = $this->findOptionValueAttributes($option, $valuePrefix);

            if (is_null($value['label'])) {
                continue;
            }

            $values[] = [
                'label' => $value['label'],
                'price' => $value['price'],
                'price_type' => $value['price_type'],
            ];
        }

        return $values;
    }


    private function findOptionValuePrefixes(Collection $option)
    {
        return $option->filter(function ($value, $column) {
            preg_match('/value_\d_.+/', $column, $matches);

            return !empty($matches);
        })->keys()->map(function ($column) {
            preg_match('/value_\d/', $column, $matches);

            return $matches[0];
        })->unique();
    }


    private function findOptionValueAttributes(Collection $option, $valuePrefix)
    {
        return $option->filter(function ($value, $column) use ($valuePrefix) {
            preg_match("/{$valuePrefix}_.*/", $column, $matches);

            return !empty($matches);
        })->mapWithKeys(function ($value, $column) use ($valuePrefix) {
            $column = str_replace("{$valuePrefix}_", '', $column);

            return [$column => $value];
        })->toArray();
    }
}
