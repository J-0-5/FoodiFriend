@extends('Front.layouts.app')
@section('content')
<div class="container">
    <div class="col text-center">
        <h3 class="mb-3">{{__('Product').'s'}}</h3>
    </div>
    @if(session('status'))
    <div class="alert alert-success" role="alert">
        {{session('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span>
        </button>
    </div>
    @endif
    <div class="d-flex flex-wrap d-flex justify-content-center">
        @foreach ($products as $product)

        <div class="row col-lg-4 col-md-4 col-sm-12 p-2 m-2 bg-white shadow rounded" id="btn">

            <div class="mt-1 col-lg-4 col-md-4 col-sm-4">
                @if (Storage::disk('public')->exists($product->product_img))
                <img class="img-fluid rounded" src="{{ asset('storage/' . $product->product_img) }}">
                @else
                <img class="img-fluid rounded" src="{{asset('img/product-placeholder.jpg')}}">
                @endif
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8">

                <p class="font-weight-bold text-dark">{{$product->name}}</p>
                <div class="row d-flex justify-content-between pr-2">
                    <p class="text-dark" style="width: 220px;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    overflow: hidden;">{{$product->description}}</p>

                    <p class="text-dark">${{number_format($product->price)}}</p>

                    <form action="{{route('cart.add')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$product->id}}">

                        <button class="btn" type="submit"><i class="fas fa-cart-plus"></i></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
