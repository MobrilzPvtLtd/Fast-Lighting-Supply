@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('admin::resource.create', ['resource' => trans('Why Choose Us')]))

    <li><a href="{{ route('admin.why-choose-us.index') }}">{{ trans('Why Choose Us') }}</a></li>
    <li class="active">{{ trans('admin::resource.create', ['resource' => trans('Why Choose Us')]) }}</li>
@endcomponent

@section('content')
    <form method="POST" action="{{ route('admin.why-choose-us.store') }}" class="blog-post-form form" id="menu-create-form" novalidate enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="row">
            <div class="form-left-column col-md-12">
                @include('menu::admin.why-choose-us.form.fields')
            </div>
        </div>

    </form>
@endsection
