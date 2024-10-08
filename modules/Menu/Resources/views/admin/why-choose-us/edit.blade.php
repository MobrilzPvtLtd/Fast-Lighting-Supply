@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.edit', ['resource' => trans('Why Choose Us')]))
    @slot('subtitle', $choose->title)

    <li><a href="{{ route('admin.why-choose-us.index') }}">{{ trans('menu::why-choose-us.why-choose-us') }}</a></li>
    <li class="active">{{ trans('admin::resource.edit', ['resource' => trans('Why Choose Us')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.why-choose-us.update', $choose) }}" class="form-horizontal" id="menu-edit-form" novalidate enctype="multipart/form-data">
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

                        <input type="text" name="title" id="title" class="form-control"  value="{{ $choose->title }}">

                        <template x-if="errors.has('title')">
                            <span class="help-block text-red" x-text="errors.get('title')"></span>
                        </template>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-10">
                        <label for="icon" class="control-label text-left">
                            {{ trans('Icon') }}
                            <span class="text-red">*</span>
                        </label>

                        <input type="file" name="icon" id="icon" class="form-control" x-model="form.icon" autofocus>

                        <template x-if="errors.has('icon')">
                            <span class="help-block text-red" x-text="errors.get('icon')"></span>
                        </template>
                    </div>
                    <div class="col-md-2" style="margin-top: 20px">
                        <img src="{{ asset('public/storage/' . $choose->icon) }}" alt="" width="100px">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label for="description" class="control-label text-left" @click="focusDescriptionField">
                            {{ trans('blog::attributes.posts.description') }}

                            <span class="text-red">*</span>
                        </label>

                        <textarea name="description" id="description" class="form-control wysiwyg" rows="4">{{ $choose->description }}
                        </textarea>

                        <template x-if="errors.has('description')">
                            <span class="help-block text-red" x-text="errors.get('description')"></span>
                        </template>
                    </div>
                </div>

                {{-- <div class="form-group">
                    <div class="col-md-12">
                        <label for="is_active" class="control-label text-left">
                            {{ trans('Status') }}
                        </label>
                        <select name="is_active" id="is_active" class="form-control wysiwyg">
                            <option value="1" {{ $choose->is_active == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $choose->is_active == 0 ? 'selected' : '' }}>InActive</option>
                        </select>
                    </div>
                </div> --}}
                <button type="submit" class="btn btn-primary">
                    {{ trans('admin::admin.buttons.save') }}
                </button>
            </div>
        </div>

    </form>
@endsection
