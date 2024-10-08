@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('Why Choose Us')]))
    @slot('subtitle', $header->title)

    <li><a href="{{ route('admin.header-section.index') }}">{{ trans('menu::header-section.header-section') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('Why Choose Us')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.header-section.update', $header) }}" class="form-horizontal" id="menu-edit-form" novalidate enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}

        <div class="box">
            <div class="box-body clearfix">
                <div class="form-group">
                    <div class="col-md-12">
                        <label for="title" class="control-label text-left">
                            {{ trans('blog::attributes.posts.title') }}

                            <span class="text-red">*</span>
                        </label>

                        <input type="text" name="title" id="title" class="form-control"  value="{{ $header->title }}">

                        <template x-if="errors.has('title')">
                            <span class="help-block text-red" x-text="errors.get('title')"></span>
                        </template>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="is_active" class="control-label text-left">
                            {{ trans('Status') }}
                        </label>
                        <select name="is_active" id="is_active" class="form-control wysiwyg">
                            <option value="1" {{ $header->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $header->is_active == 0 ? 'selected' : '' }}>InActive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    {{ trans('admin::admin.buttons.save') }}
                </button>
            </div>
        </div>

    </form>
@endsection
