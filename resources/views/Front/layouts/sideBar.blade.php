{{-- <div class="col-lg-2 col-md-2 d-none d-sm-none d-md-block d-lg-block" style="z-index: 10!important;">
    <div class="sidebars">
        <div class="card mt-3 cover">
            <div class="card-body" style="background-color:#ccc; background-image: url('{{ $commerce->img }}')"></div>
</div>
<div class="card mt-3 categories">
    <div class="card-header">
        <h4 class="card-title text-uppercase font-weight-bold text-primary">CATEGORIAS</h4>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush" style="z-index: 10!important;">
            @foreach($categories as $category)

            <a href="/categorias{{"?category=".$category->id}}">
                <li class="list-group-item text-dark px-2">
                    <img src="{{asset('storage/' . $product->product_img)}}" alt="Categorias" class="no-border-radius"
                        style="min-width: 25px; min-height: 25px; max-width: 25px; max-height: 25px">
                    <b class="my-auto"> {{$category->name}}</b>
                </li>
            </a>

            @endforeach
        </ul>
    </div>
</div>
</div>
</div> --}}
@if(isset($categories))
<aside class="col-12 col-md-2 p-0 bg-light">
    <nav class="navbar navbar-expand navbar-dark bg-light flex-md-column flex-row align-items-start">
        <div class="align-items-center m-3">
            {{-- <div class="card-body"> --}}
                @if (Storage::disk('public')->exists($commerce->img))
                <img class="card-img-top" src="{{ asset('storage/' . $commerce->img) }}"
                    alt="User profile picture">
                @else
                <img class="card-img-top" src="{{asset('img/product-placeholder.jpg')}}"
                    alt="User profile picture">
                @endif
            {{-- </div> --}}
        </div>
        <div class="collapse navbar-collapse">
            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                @foreach($categories as $category)
                <li class="nav-item p-2">
                    <a class="nav-link text-dark" href="#">{{$category->name}}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</aside>
@endif
