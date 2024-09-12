<section class="navigation-wrap">
    <div class="container">
        <div class="navigation-inner">
            @include('storefront::public.layout.navigation.category_menu')
            @include('storefront::public.layout.navigation.primary_menu')

            <span class="navigation-text">
                {{ setting('storefront_navbar_text') }}
            </span>
        </div>
        <div class="top-text">
            <h5 style="word-spacing: 5px; letter-spacing: 1px; text-align: center; margin-top: 5px;">Same-Day Order
                Fulfillment &nbsp; | &nbsp; Free Standard Shipping &nbsp; | &nbsp Free Fast Shipping on Orders $100+
                &nbsp; | &nbsp; 30-Days Money Back Guarantee &nbsp; | &nbsp; Fast & Easy Returns</h5>
        </div>
    </div>
</section>

@include('storefront::public.layout.navigation.bottom_navigation_menu')
