@extends('layouts.app')
@section('content')
<div class="flex-column container">

    @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
    @endif

    <div class="card shadow">
        <form method="POST" enctype="multipart/form-data" action="{{route('product.store')}}">

            @csrf

            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">{{__('Create product')}}</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">

                            <img class="card-img-top" id="imgUpdate" src="{{asset('img/product-placeholder.jpg')}}"
                                alt="User profile picture">

                            <div class="card-bottom text-center">
                                <label class="text-muted">{{__('Product image')}} </label>

                                <div class="flex-column">
                                    <input type="file" name="productImg" id="inputImg" class="form-control-file @error('productImg') is-invalid @enderror">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">

                        <div class="form-group col-12">
                            <label class="form-control-label">{{__('Name')}} <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{old('name')}}" placeholder="{{__('Name')}}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label class="form-control-label" for="description">{{__('Description')}}<span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                rows="7" placeholder="{{__('Description')}}">{{old('description')}}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="col">

                        <div class="form-group col-12">
                            <label class="form-control-label">{{__('Price')}} <span class="text-danger">*</span></label>
                            <input type="number" min="0" name="price" class="form-control @error('price') is-invalid @enderror"
                                value="{{old('price')}}" placeholder="{{__('Price')}}" required>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label class="form-control-label">{{__('Quantity available')}} <span class="text-danger">*</span></label>
                            <input type="number" min="0" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                                value="{{old('quantity')}}" placeholder="{{__('Quantity available')}}" required>
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        @if(Auth::user()->id == 1)
                            <div class="form-group col">
                                <label class="form-control-label">{{__('Commerce')}} <span class="text-danger">*</span></label>
                                <select name="commerce_id" id="commerce_id" class="form-control @error('commerce_id') is-invalid @enderror" required>
                                    <option value="" {{ request('commerce_id') == "" ? 'selected' : ''}}>{{__('Select')}}</option>
                                    @foreach($commerces as $commerce)
                                        <option value="{{$commerce->id}}" {{request('commerce_id') == $commerce->id ? 'selected' : ''}}>
                                            {{$commerce->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('commerce_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        @else
                            <input type="hidden" name="commerce_id" value="{{Auth::user()->getCommerce->id}}">
                        @endif

                        <div class="form-group col">
                            <label class="form-control-label @error('productCategory') is-invalid @enderror">{{__('Product Category')}} <span class="text-danger">*</span></label>
                            <select name="category" id="productCategory" class="form-control" required>
                                @if(Auth::user()->getCommerce)
                                    @foreach($productCategories as $productCategory)
                                        <option value="{{$productCategory->id}}" {{request('category') == $productCategory->id ? 'selected': ''}}>
                                            {{$productCategory->name}}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                </div>

            </div>

            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">{{__('Create product')}}</button>
            </div>

        </form>
    </div>
</div>
@endsection
