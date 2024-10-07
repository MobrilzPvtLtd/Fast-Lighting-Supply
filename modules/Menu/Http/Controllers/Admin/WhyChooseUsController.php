<?php

namespace Modules\Menu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Menu\Entities\WhyChooseUs;
use Modules\Admin\Traits\HasCrudActions;
use Illuminate\Support\Facades\Storage;

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
        $choose = new WhyChooseUs();
        $choose->title = $request->title;

        $imagePath = null;
        if ($request->hasFile('icon')) {
            $imagePath = $request->file('icon')->store('why-choose-us', 'public');
            $choose->icon = $imagePath;
        }

        $choose->description = $request->description;
        $choose->is_active = $request->is_active;
        $choose->save();

        $message = trans('admin::messages.resource_created', ['resource' => $this->getLabel()]);

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

        $imagePath = null;
        if ($request->hasFile('icon')) {
            $imagePath = $request->file('icon')->store('why-choose-us', 'public');
            $choose->icon = $imagePath;

            if ($oldIconPath) {
                Storage::disk('public')->delete($oldIconPath);
            }
        }

        $choose->description = $request->description;
        $choose->is_active = $request->is_active;
        $choose->save();

        $message = trans('admin::messages.resource_updated', ['resource' => $this->getLabel()]);

        return redirect()->route('admin.why-choose-us.index')
            ->withSuccess($message);
    }

    public function destroy($id)
    {
        $choose = WhyChooseUs::find($id);
        $choose->delete();

        $message = trans('admin::messages.resource_deleted', ['resource' => $this->getLabel()]);

        return redirect()->route('admin.why-choose-us.index')
            ->withSuccess($message);
    }

}
