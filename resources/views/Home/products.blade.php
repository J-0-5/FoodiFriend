@extends('layouts.commerce.app')
@section('content')
<div class="container">
    <div class="col text-center">
        <h3 class="mb-3">{{__('Product').'s'}}</h3>
    </div>
    <div class="d-flex flex-wrap d-flex justify-content-center">
        @foreach ($products as $product)

        <a class="row col-lg-4 col-md-4 col-sm-12 m-2 bg-white shadow rounded" id="btn">

            <div class="mt-1 col-lg-4 col-md-4 col-sm-4">
                @if (Storage::disk('public')->exists($product->product_img))
                <img class="img-fluid rounded" src="{{ asset('storage/' . $product->product_img) }}">
                @else
                <img class="img-fluid rounded" src="{{asset('img/product-placeholder.jpg')}}">
                @endif
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">

                <p class="font-weight-bold text-dark">{{$product->name}}</p>

                <p class="text-dark" style="width: 220px;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    overflow: hidden;">{{$product->description}}</p>

                <p class="text-dark">${{number_format($product->price)}}</p>

            </div>

        </a>

        @endforeach
    </div>
</div>
@endsection
