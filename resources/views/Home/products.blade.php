@extends('layouts.commerce.app')
@section('content')
<div class="container">
    <div class="col text-center">
        <h3 class="mb-3">{{__('Product').'s'}}</h3>
    </div>
    <div class="d-flex flex-wrap d-flex justify-content-center">
        @foreach ($products as $product)
        <a href="{{route('home.products',$product->id)}}" class="col-lg-4 col-md-6 col-12 text-decoration-none">
            <div class="card p-2 m-2 rounded">
                @if (Storage::disk('public')->exists($product->product_img))
                <img class="card-img-top img-fluid rounded" src="{{ asset('storage/' . $product->product_img) }}"
                    alt="Card image cap">
                @else
                <img class="card-img-top img-fluid rounded" src="{{asset('img/product-placeholder.jpg')}}" alt="Card image cap">
                @endif

                <div class="card-body text-center">
                    <h4 class="card-title text-dark">{{$product->name}}</h4>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection
