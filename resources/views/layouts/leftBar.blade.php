<aside class="main-aside">
    @auth
        <section class="sidebar">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productCategory.index') }}">{{ __('Product Category') }}</a>
            </li>
        </section>
    @endauth
</aside>
