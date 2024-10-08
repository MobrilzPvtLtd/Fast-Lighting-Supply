<section class="top-nav-wrap">
    <div class="container">
        <div class="top-nav">
            <div class="row justify-content-center ">
                <div class="top-nav-left d-none d-lg-block">
                    {{-- <span>{{ setting('storefront_welcome_text') }}</span> --}}
                </div>

                @php
                    $headers = Modules\Admin\Entities\HeaderSection::get();
                @endphp
                <div class="top-nav-right">
                    <ul class="list-inline top-nav-right-list">
                        @foreach ($headers as $header)
                            <li>
                                <a>
                                    {{-- <i class="las la-envelope"></i> --}}
                                    {{ $header->title }}
                                    {{-- {{ trans('storefront::layout.contact') }} --}}
                                </a>
                            </li>
                        @endforeach

                        @if (is_multilingual())
                            <li>
                                <i class="las la-language"></i>

                                <select class="custom-select-option arrow-black" onchange="location = this.value">
                                    @foreach (supported_locales() as $locale => $language)
                                        <option value="{{ localized_url($locale) }}"
                                            {{ locale() === $locale ? 'selected' : '' }}>
                                            {{ $language['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </li>
                        @endif

                        @if (is_multi_currency())
                            <li class="top-nav-currency">
                                <i class="las la-money-bill"></i>
                                <select class="custom-select-option arrow-black" onchange="location = this.value">
                                    @foreach (setting('supported_currencies') as $currency)
                                        <option value="{{ route('current_currency.store', ['code' => $currency]) }}"
                                            {{ currency() === $currency ? 'selected' : '' }}>
                                            {{ $currency }}
                                        </option>
                                    @endforeach
                                </select>
                            </li>
                        @endif

                        {{-- @auth
                            <li>
                                <a>
                                    {{ $header1->title }}
                                    <i class="las la-user"></i>
                                    {{ trans('storefront::layout.account') }}
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('account.dashboard.index') }}">
                                    <i class="las la-user"></i>
                                    {{ trans('storefront::layout.account') }}
                                </a>
                            </li>
                        @else
                            <li>
                                <a>Free Fast Shipping on Orders $100+
                                    <i class="las la-sign-in-alt"></i>
                                    {{ trans('storefront::layout.login') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}">
                                    <i class="las la-sign-in-alt"></i>
                                    {{ trans('storefront::layout.login') }}
                                </a>
                            </li>
                        @endauth --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
