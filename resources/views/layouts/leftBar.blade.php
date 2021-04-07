<nav class="col-md-2 bg-light sidebar" id="leftBarCollapse">
    @auth
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            {{-- exclusive modules for the administrator --}}
            @if (Auth::user()->id == 1)
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
            @endif
            {{-- exclusive modules for the customers --}}
            @if (Auth::user()->id != 1 && empty(Auth::user()->getCommerce))
            @endif
        </ul>
    </div>
    @endauth
</nav>
