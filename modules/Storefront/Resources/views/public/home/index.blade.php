@extends('storefront::public.layout')

@section('title', setting('store_tagline'))

@section('content')
    @includeUnless(is_null($slider), 'storefront::public.home.sections.slider')

    @if (setting('storefront_features_section_enabled'))
        <home-features :features="{{ json_encode($features) }}"></home-features>
    @endif

    @if (setting('storefront_featured_categories_section_enabled'))
        <featured-categories :data="{{ json_encode($featuredCategories) }}"></featured-categories>
    @endif

    @if (setting('storefront_three_column_full_width_banners_enabled'))
        <banner-three-column-full-width :data="{{ json_encode($threeColumnFullWidthBanners) }}">
        </banner-three-column-full-width>
    @endif

    @if (setting('storefront_product_tabs_1_section_enabled'))
        <product-tabs-one :data="{{ json_encode($productTabsOne) }}"></product-tabs-one>
    @endif

    @if (setting('storefront_top_brands_section_enabled') && $topBrands->isNotEmpty())
        <top-brands :top-brands="{{ json_encode($topBrands) }}"></top-brands>
    @endif

    @if (setting('storefront_flash_sale_and_vertical_products_section_enabled'))
        <flash-sale-and-vertical-products
            :data="{{ json_encode($flashSaleAndVerticalProducts) }}"
            :flash-sale-enabled="{{ setting('storefront_active_flash_sale_campaign') ? 'true' : 'false' }}"
        >
        </flash-sale-and-vertical-products>
    @endif

    @if (setting('storefront_two_column_banners_enabled'))
        <banner-two-column :data="{{ json_encode($twoColumnBanners) }}"></banner-two-column>
    @endif

    @if (setting('storefront_product_grid_section_enabled'))
        <product-grid :data="{{ json_encode($productGrid) }}"></product-grid>
    @endif

    @if (setting('storefront_three_column_banners_enabled'))
        <banner-three-column :data="{{ json_encode($threeColumnBanners) }}"></banner-three-column>
    @endif

    @if (setting('storefront_product_tabs_2_section_enabled'))
        <product-tabs-two :data="{{ json_encode($tabProductsTwo) }}"></product-tabs-two>
    @endif

    @if (setting('storefront_one_column_banner_enabled'))
        <banner-one-column :banner="{{ json_encode($oneColumnBanner) }}"></banner-one-column>
    @endif

    @if (setting('storefront_blogs_section_enabled'))
        <blog-posts :data="{{ json_encode($blogPosts) }}"></blog-posts>
    @endif

    {{-- <blog-posts :data="{{ json_encode($blogPosts) }}"></blog-posts> --}}

    @php
        $chooses = Modules\Menu\Entities\WhyChooseUs::whereIn('id', [1, 2, 3])->get();
    @endphp
    <section class="choose_fls">
        <div class="container">
            <h2>Why Choose Fast Lighting Supply?</h2>
            <div class="d-flex choose_fls001">
                @foreach($chooses as $choose)
                    <div class="choose-fls-sec{{ str_pad($loop->index + 1, 3, '0', STR_PAD_LEFT) }}">
                        <img src="{{ asset('public/storage/' . $choose->icon) }}" alt="">
                        <h4>{{ $choose->title }}</h4>
                        <p>{{ $choose->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
