@extends('admin::layout')

@component('admin::components.page.header')
    @slot('title', trans('Why Choose Us'))

    <li class="active">{{ trans('Why Choose Us') }}</li>
    @php
        $chooses = Modules\Menu\Entities\WhyChooseUs::get();
    @endphp
@endcomponent

@component('admin::components.page.index_table')
    @if($chooses->count() < 3)
        @slot('buttons', ['create'])
    @endif
    @slot('resource', 'why-choose-us')
    @slot('name', trans('Why Choose Us'))

    @slot('thead')
        <tr>
            <th>{{ trans('#') }}</th>
            <th>{{ trans('Icon') }}</th>
            <th>{{ trans('Title') }}</th>
            <th>{{ trans('Description') }}</th>
            {{-- <th>{{ trans('admin::admin.table.status') }}</th> --}}
            <th>{{ trans('Action') }} </th>
        </tr>

        @foreach ($chooses as $choose)
            <tr>
                <th>{{ $choose->id }}</th>
                <th>
                    <img src="{{ asset('public/' . $choose->icon) }}" alt="" width="80px">
                </th>
                <th>{{ $choose->title }}</th>
                <th>{{ \Illuminate\Support\Str::limit($choose->description, 100, '...') }}</th>
                {{-- <th>
                    @if($choose->is_active == 1)
                        <span style="padding: 6px; font-size: 12px;border-radius: 0px;background-color: #029602;color: #fff;">Active</span>
                    @else
                        <span style="padding: 6px; font-size: 12px;border-radius: 0px;background-color: #eabb40;color: #fff;">Inactive</span>
                    @endif
                </th> --}}
                <th>
                    <div class="d-flex justify-content-start">
                        <a href="{{ route('admin.why-choose-us.edit', $choose->id) }}" class="btn btn-primary btn-sm me-2">Edit</a>

                        {{-- <form action="{{ route('admin.why-choose-us.destroy', $choose->id) }}" method="POST" class="mb-0">
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
