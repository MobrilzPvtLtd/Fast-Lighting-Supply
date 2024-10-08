<header class="header-wrap">
    <div class="header-wrap-inner">
        <div class="container">
            <div class="row flex-nowrap justify-content-between position-relative">
                <div class="header-column-left align-items-center">
                    <div class="sidebar-menu-icon-wrap">
                        <div class="sidebar-menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="150px" height="150px">
                                <path d="M 3 9 A 1.0001 1.0001 0 1 0 3 11 L 47 11 A 1.0001 1.0001 0 1 0 47 9 L 3 9 z M 3 24 A 1.0001 1.0001 0 1 0 3 26 L 47 26 A 1.0001 1.0001 0 1 0 47 24 L 3 24 z M 3 39 A 1.0001 1.0001 0 1 0 3 41 L 47 41 A 1.0001 1.0001 0 1 0 47 39 L 3 39 z"></path>
                            </svg>
                        </div>
                    </div>

                    <a href="{{ route('home') }}" class="header-logo">
                        @if (is_null($logo))
                            <h3>{{ setting('store_name') }}</h3>
                        @else
                            <img src="{{ $logo }}" alt="Logo">
                        @endif
                    </a>
                </div>

                <header-search
                    :categories="{{ $categories }}"
                    :most-searched-keywords="{{ $mostSearchedKeywords }}"
                    is-most-searched-keywords-enabled="{{ setting('storefront_most_searched_keywords_enabled') }}"
                    initial-query="{{ request('query') }}"
                    initial-category="{{ request('category') }}"
                >
                </header-search>

                <div class="header-column-right d-flex">
                    <div class="header-column-right-item header-localization">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#292D32" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M7.99998 3H8.99998C7.04998 8.84 7.04998 15.16 8.99998 21H7.99998" stroke="#292D32" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M15 3C16.95 8.84 16.95 15.16 15 21" stroke="#292D32" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M3 16V15C8.84 16.95 15.16 16.95 21 15V16" stroke="#292D32" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M3 8.99998C8.84 7.04998 15.16 7.04998 21 8.99998" stroke="#292D32" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>

                        </div>
                    </div>

                    {{-- <a href="{{ route('compare.index') }}" class="header-column-right-item header-compare">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M3.58008 5.15991H17.4201C19.0801 5.15991 20.4201 6.49991 20.4201 8.15991V11.4799" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M6.74008 2L3.58008 5.15997L6.74008 8.32001" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M20.4201 18.84H6.58008C4.92008 18.84 3.58008 17.5 3.58008 15.84V12.52" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M17.26 21.9999L20.42 18.84L17.26 15.6799" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <div class="count" v-text="compareCount"></div>
                        </div>
                    </a> --}}

                    <a href="{{ route('account.wishlist.index') }}" class="header-column-right-item header-wishlist">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M12 17.3l-4.618 2.43 1.217-5.28-4.107-3.79 5.375-.462L12 5.25l2.133 4.948 5.375.462-4.107 3.79 1.217 5.28L12 17.3z" stroke="#292D32" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>

                            <div class="count" v-text="wishlistCount"></div>
                        </div>
                    </a>

                    <div class="header-column-right-item header-cart">
                        <div class="icon-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2">
                                <path d="M5 5H20L18 13H8L5 5Z" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <line x1="7" y1="5" x2="5" y2="5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="9" cy="17" r="2" fill="none" stroke="black" stroke-width="2"/>
                                <circle cx="17" cy="17" r="2" fill="none" stroke="black" stroke-width="2"/>
                                <line x1="17" y1="5" x2="21" y2="5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <line x1="7" y1="5" x2="5" y2="5" stroke="black" stroke-width="2" stroke-linecap="round"/>
                                <line x1="8" y1="5" x2="8" y2="3" stroke="black" stroke-width="2" stroke-linecap="round"/>
                              </svg>

                            <div class="count" v-text="cart.quantity">{{ $cart->toArray()['quantity'] }}</div>
                        </div>

                        {{-- <span v-html="cart.subTotal.inCurrentCurrency.formatted"></span> --}}
                    </div>
                    @if(auth()->check())
                        <a href="{{ route('account.dashboard.index') }}" class="header-column-right-item" style="color: #000">
                            {{ auth()->user()->full_name }}
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="header-column-right-item" style="color: #000">
                            Login
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
</header>
