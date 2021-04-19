<nav id="sidebar-wrapper">
    @auth
        <ul class="sidebar-nav">

            {{-- exclusive modules for the administrator --}}
            @if (Auth::user()->id == 1)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    {{-- <i class="color-session fas fa-store text-primary"></i> --}}
                    {{ __('Dashboard')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('commerceType.index') }}">
                    {{-- <i class="color-session fas fa-store text-primary"></i> --}}
                    {{ __('Commerce Type')}}
                </a>
            </li>
            @endif

            {{-- exclusive modules for the administrator and commerces --}}
            @if (Auth::user()->id == 1 || !empty(Auth::user()->getCommerce))
            <li class="nav-item">
                <a class="nav-link"
                    href="{{ Auth::user()->id == 1 ? route('commerce.index') : route('commerce.edit', [Auth::user()->getCommerce->id])}}">
                    {{-- <i class="color-session fas fa-store text-primary"></i> --}}
                    {{ __('Commerce').(Auth::user()->id == 1 ? 's' : '')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productCategory.index') }}">
                    {{-- <i class="color-session fas fa-store text-primary"></i> --}}
                    {{ __('Product Category') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('product.index') }}">
                    {{-- <i class="color-session fas fa-store text-primary"></i> --}}
                    {{ __('Product').'s' }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('order.index') }}">
                    {{__('Orders') }}
                </a>
            </li>
            @endif

        </ul>
    @endauth
</nav>

