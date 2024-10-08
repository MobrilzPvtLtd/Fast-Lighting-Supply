@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('Header Section')]))

    <li><a href="{{ route('admin.header-section.index') }}">{{ trans('Header Section') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('Header Section')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.header-section.store') }}" class="blog-post-form form" id="menu-create-form" novalidate enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-left-column col-md-12">
                <div class="box">
                    <div class="box-body clearfix">
                        <div class="form-group">
                            <label for="title" class="control-label text-left">
                                {{ trans('blog::attributes.posts.title') }}
                                <span class="text-red">*</span>
                            </label>

                            <input type="text" name="title" id="title" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="is_active" class="control-label text-left">
                                {{ trans('Status') }}
                            </label>
                            <select name="is_active" id="is_active" class="form-control wysiwyg">
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>

                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ trans('admin::admin.buttons.save') }}
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </form>
@endsection
