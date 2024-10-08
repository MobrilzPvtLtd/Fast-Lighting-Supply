<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Menu\Entities\WhyChooseUs;
use Modules\Admin\Traits\HasCrudActions;
use Illuminate\Support\Facades\Storage;
use Modules\Menu\Http\Requests\SaveWhyChooseUsRequest;

class WhyChooseUsController
{
    use HasCrudActions;

    /**
     * Model for the resource.
     *
     * @var string
     */
    protected $model = WhyChooseUs::class;

    /**
     * Label of the resource.
     *
     * @var string
     */
    protected $label = 'menu::why-choose-us.why-choose-us';

    /**
     * View path of the resource.
     *
     * @var string
     */
    protected $viewPath = 'menu::admin.why-choose-us';

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $choose = new WhyChooseUs();
        $choose->title = $request->title;

        $imagePath = null;
        // if ($request->hasFile('icon')) {
        //     $imagePath = $request->file('icon')->store('why-choose-us', 'public');
        //     $choose->icon = $imagePath;
        // }
        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $imageName = time() . '_' . $icon->getClientOriginalName();
            $imagePath = public_path('why-choose-us');

            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0755, true);
            }

            $icon->move($imagePath, $imageName);

            $choose->icon = 'why-choose-us/' . $imageName;
        }


        $choose->description = $request->description;
        $choose->is_active = 1;
        $choose->save();

        $message = trans('Why Choose Us created', ['resource' => $this->getLabel()]);

        return redirect()->route('admin.why-choose-us.index')
            ->withSuccess($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $choose = WhyChooseUs::withoutGlobalScope('active')->findOrFail($id);

        return view('menu::admin.why-choose-us.edit', compact('choose'));
    }

    public function update(Request $request, $id)
    {
        $choose = WhyChooseUs::find($id);

        $oldIconPath = $choose->icon;

        $choose->title = $request->title;

        // $imagePath = null;
        // if ($request->hasFile('icon')) {
        //     $imagePath = $request->file('icon')->store('why-choose-us', 'public');
        //     $choose->icon = $imagePath;

        //     if ($oldIconPath) {
        //         Storage::disk('public')->delete($oldIconPath);
        //     }
        // }

        $imagePath = null;

        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');

            $imageName = time() . '_' . $icon->getClientOriginalName();

            $imagePath = public_path('why-choose-us/' . $imageName);

            if (!file_exists(public_path('why-choose-us'))) {
                mkdir(public_path('why-choose-us'), 0755, true);
            }

            $icon->move(public_path('why-choose-us'), $imageName);

            $choose->icon = 'why-choose-us/' . $imageName;

            if ($oldIconPath) {
                $oldFilePath = public_path($oldIconPath);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }
        }

        $choose->description = $request->description;
        $choose->is_active = 1;
        $choose->save();

        $message = trans('Why Choose Us updated', ['resource' => $this->getLabel()]);

        return redirect()->route('admin.why-choose-us.index')
            ->withSuccess($message);
    }

    public function destroy($id)
    {
        $choose = WhyChooseUs::find($id);
        $choose->delete();

        $message = trans('Why Choose Us deleted', ['resource' => $this->getLabel()]);

        return redirect()->route('admin.why-choose-us.index')
            ->withSuccess($message);
    }

}
