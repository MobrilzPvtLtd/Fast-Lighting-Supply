<nav class="navbar navbar-static-top clearfix">
    <ul class="nav navbar-nav clearfix">
        <li class="visit-store hidden-sm hidden-xs">
            <a href="{{ route('home') }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 0 512 512">
                    <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" x1="448" y1="448" x2="448" y2="240"/>
                    <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" x1="64" y1="240" x2="64" y2="448"/>
                    <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M382.47,48H129.53C107.74,48,88.06,60,79.6,78.46L36.3,173c-14.58,31.81,9.63,67.85,47.19,69q1,0,2,0c31.4,0,56.85-25.18,56.85-52.23,0,27,25.46,52.23,56.86,52.23S256,218.62,256,189.77c0,27,25.45,52.23,56.85,52.23s56.86-23.38,56.86-52.23c0,28.85,25.45,52.23,56.85,52.23q1,0,1.95,0c37.56-1.17,61.77-37.21,47.19-69L432.4,78.46C423.94,60,404.26,48,382.47,48Z"/>
                    <line fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" x1="32" y1="464" x2="480" y2="464"/>
                    <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M136,288h80a24,24,0,0,1,24,24v88a0,0,0,0,1,0,0H112a0,0,0,0,1,0,0V312A24,24,0,0,1,136,288Z"/>
                    <path fill="none" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M288,464V312a24,24,0,0,1,24-24h64a24,24,0,0,1,24,24V464"/>
                </svg>

                {{ trans('admin::admin.storefront') }}
            </a>
        </li>

        <li class="user dropdown top-nav-menu pull-right"> 
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span>{{ substr($currentUser->first_name, 0, 1) }}</span>

                <div class="dropdown-arrow-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="9" viewBox="0 0 18 9" fill="none">
                        <path d="M16.9201 0.949951L10.4001 7.46995C9.63008 8.23995 8.37008 8.23995 7.60008 7.46995L1.08008 0.949951" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </a>

            <ul class="dropdown-menu">
                <li class="profile-details">
                    <span class="profile-first-letter">{{ substr($currentUser->first_name, 0, 1) }}</span>

                    <div class="profile-info">
                        <h4>
                            <span>{{ $currentUser->first_name }} {{ $currentUser->last_name }}</span>

                            <span>{{ $currentUser->roles->first()->name }}</span>
                        </h4>
                        
                        <span class="profile-email">{{ $currentUser->email }}</span>
                    </div>
                </li>

                <li>
                    <a href="{{ route('admin.profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        {{ trans('user::users.profile') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.logout') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M17.4399 14.62L19.9999 12.06L17.4399 9.5" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M9.76001 12.0601H19.93" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.76 20C7.34001 20 3.76001 17 3.76001 12C3.76001 7 7.34001 4 11.76 4" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        
                        {{ trans('user::auth.logout') }}
                    </a>
                </li>
            </ul>
        </li>

        @if (count(supported_locales()) > 1)
            <li class="language dropdown top-nav-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7.99998 3H8.99998C7.04998 8.84 7.04998 15.16 8.99998 21H7.99998" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15 3C16.95 8.84 16.95 15.16 15 21" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 16V15C8.84 16.95 15.16 16.95 21 15V16" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3 8.99998C8.84 7.04998 15.16 7.04998 21 8.99998" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    
                    <span>{{ strtoupper(locale()) }}</span>

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M19.9201 8.94995L13.4001 15.47C12.6301 16.24 11.3701 16.24 10.6001 15.47L4.08008 8.94995" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>

                <ul class="dropdown-menu">
                    @foreach (supported_locales() as $locale => $language)
                        <li class="{{ $locale === locale() ? 'active' : '' }}">
                            <a href="{{ localized_url($locale) }}">{{ $language['name'] }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    </ul>
</nav>
