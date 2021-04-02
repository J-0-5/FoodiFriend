<nav class="col-md-2 bg-light sidebar" id="leftBarCollapse">
    @auth
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ Auth::user()->id == 1 ? route('commerce.index') : route('commerce.edit', [Auth::user()->getCommerce->id])}}">
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
        </ul>
    </div>
    @endauth
</nav>
