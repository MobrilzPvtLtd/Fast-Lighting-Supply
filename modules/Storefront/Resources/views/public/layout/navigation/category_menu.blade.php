<div class="category-nav {{ request()->routeIs('home') ? 'show' : 'category-dropdown-menu' }}">
    <div class="category-nav-inner" >
        {{ trans('storefront::layout.all_categories_header') }}
        <i class="las la-bars" id="show-side-menu" onclick="alertFunc()" ></i>
    </div>

    @if ($categoryMenu->menus()->isNotEmpty())
        <div class="category-dropdown-wrap" id="hide-side-menu">
            <div class="category-dropdown">
                <ul class="list-inline mega-menu vertical-megamenu">
                    @foreach ($categoryMenu->menus() as $menu)
                        @include('storefront::public.layout.navigation.menu', ['type' => 'category_menu'])
                    @endforeach

                    <li class="more-categories">
                        <a href="{{ route('categories.index') }}" class="menu-item">
                            <span class="menu-item-icon">
                                <i class="las la-plus-square"></i>
                            </span>

                            {{ trans('storefront::layout.all_categories') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    @endif
</div>

@section('script')
    <script>
        const show01 = document.getElementById("show-side-menu")
const hide01 = document.getElementById("hide-side-menu")



const alertFunc = () => {
    const hide01 = document.getElementById('hide-side-menu');
    
    if (hide01.style.display === "none") {
        hide01.style.display = "block";
    } else {
        hide01.style.display = "none";
    }
};

    </script>
@endsection

