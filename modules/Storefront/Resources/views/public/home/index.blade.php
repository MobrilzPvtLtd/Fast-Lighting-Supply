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
    <section class="choose_fls">
        <div class="container">
            <h2>Why Choose Fast Lighting Supply?</h2>
            <h6>Loreum dummit iosum loreum dummt iosum loren dummt iosum
            </h6>
            <div class="d-flex choose_fls001">
                <div class="choose-fls-sec001">
                    <img src="build/assets/images/Quick-Checkout-96.png" alt="">
                    <h4>Quick Checkout</h4>
                    <p>At Fast Lighting Supply, we’ve streamlined the checkout process to ensure it’s fast and
                        hassle-free. With our easy-to-navigate interface and secure payment options, you can complete
                        your purchase in just a few clicks, saving you time and effort.</p>
                </div>
                <div class="choose-fls-sec002">
                    <img src="build/assets/images/Fast-Delivery-96.png" alt="">
                    <h4>Fast Delivery</h4>
                    <p>We understand that time is critical when it comes to lighting projects. That’s why we prioritize
                        speed in our deliveries, working with reliable carriers to get your order to you as quickly as
                        possible, so you can stay on track.</p>
                </div>
                <div class="choose-fls-sec003">
                    <img src="build/assets/images/Easy-Returns-96.png" alt="">
                    <h4>Easy Returns</h4>
                    <p>We believe in providing flexibility with every purchase. Our hassle-free returns policy allows you
                        to return eligible items with ease, giving you peace of mind and full control over your orders.</p>
                </div>
            </div>
        </div>

    </section>
@endsection
