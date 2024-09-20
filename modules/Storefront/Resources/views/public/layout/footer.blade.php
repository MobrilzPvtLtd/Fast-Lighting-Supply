<footer class="footer-wrap">
    <div class="container">
        <div class="footer">
            <div class="footer-top">
                <div class="row justify-content-center">


                    {{-- <div class="col-lg-3 col-md-5">
                        <div class="footer-links">
                            <h4 class="title">{{ trans('storefront::layout.my_account') }}</h4>

                            <ul class="list-inline">
                                <li>
                                    <a href="{{ route('account.dashboard.index') }}">
                                        {{ trans('storefront::account.pages.dashboard') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('account.orders.index') }}">
                                        {{ trans('storefront::account.pages.my_orders') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('account.reviews.index') }}">
                                        {{ trans('storefront::account.pages.my_reviews') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('account.profile.edit') }}">
                                        {{ trans('storefront::account.pages.my_profile') }}
                                    </a>
                                </li>

                                @auth
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            {{ trans('storefront::account.pages.logout') }}
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div> --}}

                    @if ($footerMenuOne->isNotEmpty())
                        <div class="col-lg-3 col-md-5">
                            <div class="footer-links">
                                <h4 class="title">{{ setting('storefront_footer_menu_one_title') }}</h4>

                                <ul class="list-inline">
                                    @foreach ($footerMenuOne as $menuItem)
                                        <li>
                                            <a href="{{ $menuItem->url() }}" target="{{ $menuItem->target }}">
                                                {{ $menuItem->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul>
                                    <li class="py-3">
                                        <a href="#" style="text-decoration: underline;">View all
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($footerMenuTwo->isNotEmpty())
                        <div class="col-lg-3 col-md-5">
                            <div class="footer-links">
                                <h4 class="title">{{ setting('storefront_footer_menu_two_title') }}</h4>

                                <ul class="list-inline">
                                    @foreach ($footerMenuTwo as $menuItem)
                                        <li>
                                            <a href="{{ $menuItem->url() }}" target="{{ $menuItem->target }}">
                                                {{ $menuItem->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <div class="col-lg-3 col-md-5 contact001">
                        <h4>Contact Us</h4>
                        <ul>
                            {{-- <li>
                                <i class="las la-map-marker"></i>
                                <a href="#" >Spring Hill, TN
                                </a>
                            </li> --}}
                            <li>
                                <i class="las la-envelope"></i>
                                <a href="#" >sales@fastlightingsupply.com
                                </a>
                            </li>
                            <li>
                                <i class="las la-phone"></i>
                                <a href="#" >888-372-1332
                                </a>
                            </li>
                            <li>
                                <i class="las la-history"></i>
                                <a href="#" >Mon-Fri: 8:00 a.m.-5:00 p.m. CST
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-5 contact001">
                        <h4>Social Media</h4>
                        <ul>
                            <li>
                                <i class="lab la-facebook-f"></i>
                                <a href="#" >Facebook
                                </a>
                            </li>
                            <li>
                                <i class="lab la-instagram"></i>
                                <a href="#" >Instagram
                                </a>
                            </li>
                            <p>At
                                Fast Lighting Supply, we take pride in offering an extensive range of lighting
                                solutions, from energy-efficient LED bulbs and fixtures to classic incandescent
                                options, ensuring we have the right product for every project.</p>
                        </ul>
                    </div>

                    @if ($footerTags->isNotEmpty())
                        <div class="col-lg-4 col-md-7">
                            <div class="footer-links footer-tags">
                                <h4 class="title">{{ trans('storefront::layout.tags') }}</h4>

                                <ul class="list-inline">
                                    @foreach ($footerTags as $footerTag)
                                        <li>
                                            <a href="{{ $footerTag->url() }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M4.16989 15.3L8.69989 19.83C10.5599 21.69 13.5799 21.69 15.4499 19.83L19.8399 15.44C21.6999 13.58 21.6999 10.56 19.8399 8.69005L15.2999 4.17005C14.3499 3.22005 13.0399 2.71005 11.6999 2.78005L6.69989 3.02005C4.69989 3.11005 3.10989 4.70005 3.00989 6.69005L2.76989 11.69C2.70989 13.04 3.21989 14.35 4.16989 15.3Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M9.5 12C10.8807 12 12 10.8807 12 9.5C12 8.11929 10.8807 7 9.5 7C8.11929 7 7 8.11929 7 9.5C7 10.8807 8.11929 12 9.5 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round"/>
                                                </svg>

                                                {{ $footerTag->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                </div>
            </div>

            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-9 col-sm-18">
                        <div class="footer-text">
                            {!! $copyrightText !!}
                        </div>
                    </div>

                    @if ($acceptedPaymentMethodsImage->exists)
                        <div class="col-md-9 col-sm-18">
                            <div class="footer-payment">
                                <img src="{{ $acceptedPaymentMethodsImage->path }}" alt="Accepted payment methods">
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>


@push('scripts')
    <script type="module">
        $('.store-phone').attr('href', `tel:{{ setting('store_phone') }}`);
        $('.store-email').attr('href', `mailto:{{ setting('store_email') }}`);
    </script>
@endpush
