@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('Header Section'))

    <li class="active">{{ trans('Header Section') }}</li>
@endcomponent

@component('admin::components.page.index_table')
    @if($headers->count() < 3)
        @slot('buttons', ['create'])
    @endif
    @slot('resource', 'header-section')
    @slot('name', trans('Header Section'))

    @slot('thead')
        <tr>
            <th>{{ trans('#') }}</th>
            <th>{{ trans('Title') }}</th>
            <th>{{ trans('admin::admin.table.status') }}</th>
            <th>{{ trans('Action') }} </th>
        </tr>

        @foreach ($headers as $header)
            <tr>
                <th>{{ $header->id }}</th>
                <th>{{ $header->title }}</th>
                <th>
                    @if($header->is_active == 1)
                        <span style="padding: 6px; font-size: 12px;border-radius: 0px;background-color: #029602;color: #fff;">Active</span>
                    @else
                        <span style="padding: 6px; font-size: 12px;border-radius: 0px;background-color: #eabb40;color: #fff;">Inactive</span>
                    @endif
                </th>
                <th>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('admin.header-section.edit', $header->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>

                        {{-- <form action="{{ route('admin.why-header-us.destroy', $header->id) }}" method="POST" class="mb-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" style="margin-left: 4px;">Delete</button>
                        </form> --}}
                    </div>
                </th>

            </tr>
        @endforeach
    @endslot
@endcomponent
