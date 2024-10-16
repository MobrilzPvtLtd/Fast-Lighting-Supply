<?php

namespace Modules\Product\Http\Controllers\Admin;

use FleetCart\Jobs\ImportProductsJob;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Illuminate\Http\Response;
use Modules\Import\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel as ExcelFacade;
use Modules\Import\Http\Requests\StoreImporterRequest;
use Modules\Product\Entities\Product;
use Illuminate\Support\Facades\Validator;
use Modules\Media\Entities\EntityFile;

class BulkProductController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return view('product::admin.bulk_product.index');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreImporterRequest $request
     *
     * @return Response
     */
    public function store(StoreImporterRequest $request)
    {
        $originalFileName = $request->file('csv_file')->getClientOriginalName();
        $newFileName = time() . '_' . $originalFileName;
        $path = $request->file('csv_file')->storeAs('uploads', $newFileName);

        // ImportProductsJob::dispatch($path);

        $importerClass = $request->import_type === 'product' ? ProductImport::class : null;
        if ($importerClass) {
            $importer = new $importerClass;
            ExcelFacade::import($importer, $request->file('csv_file'), null, Excel::CSV);
        }

        $importedData = $importer->getImportedData();
        $products = $importedData['products'];
        $files = $importedData['files'];

        // dd($products,$files);

        foreach ($products as $index => $product) {
            $entityFile = new EntityFile();
            $entityFile->file_id = $files[$index]->id;
            $entityFile->entity_type = Product::class;
            $entityFile->entity_id = $product->id;
            $entityFile->zone = "base_image";
            $entityFile->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Product data imported successfully.',
            'filename' => $originalFileName,
            'rowCount' => $importer->getRowCount(),
            // 'products' => $products,
        ]);
    }
}
