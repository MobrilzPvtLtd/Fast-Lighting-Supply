<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Modules\Admin\Entities\HeaderSection;
use Illuminate\Http\Request;

class HeaderSectionController
{
    /**
     * Display the dashboard with its widgets.
     *
     * @return Response
     */
    public function index()
    {
        $headers = HeaderSection::get();
        return view('admin::header-section.index',compact('headers'));
    }

    public function create()
    {
        return view('admin::header-section.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $header = new HeaderSection();
        $header->title = $request->title;
        $header->is_active = $request->is_active;
        $header->save();

        $message = trans('Header Section created.');

        return redirect()->route('admin.header-section.index')
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
        $header = HeaderSection::withoutGlobalScope('active')->findOrFail($id);

        return view('admin::header-section.edit', compact('header'));
    }

    public function update(Request $request, $id)
    {
        $header = HeaderSection::find($id);

        $header->title = $request->title;
        $header->is_active = $request->is_active;
        $header->save();

        $message = trans('Header Section updated.');

        return redirect()->route('admin.header-section.index')
            ->withSuccess($message);
    }

    public function destroy($id)
    {
        $header = HeaderSection::find($id);
        $header->delete();

        $message = trans('Header Section deleted.');

        return redirect()->route('admin.header-section.index')
            ->withSuccess($message);
    }
}
