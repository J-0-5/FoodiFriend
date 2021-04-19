@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">@lang('Products')</li>
  </ol>
</nav>
<br>
<div class="flex-column mtn">
    <div class="container-fluid px-3 mb-3">
        <div class="row">

            <div class="col-12 h1"> 
                <div class="contenedor">
                    <img width="100%" src="{{asset('img/product/banner.jpg')}}" alt="Banner Products"/>
                    <div class="centrado"><h1 class="titulo-grande">{{__('Product').'s'}}</h1></div>
                </div>
                
            </div>
            
        </div>
        <div class="row">
            <div class="col-2">
                <a type="button" class="btn btn-primary mb-3" href="{{route('product.create')}}">
                    <i class="fas fa-plus"></i>
                    {{__('Create product')}}
                </a>
            </div>
            <div class="col-2">
                <button class="btn btn-primary btn-block" data-toggle="collapse" data-target="#productFilter"><i class="fas fa-filter"></i> @lang('Filter Options')</button>
            </div>
        </div>  


        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    - {{$error}} <br>
                @endforeach
            </div>
        @endif

        @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
        @endif

        @include('product.filter')

        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light ">
                    <tr class="text-center">
                        <th scope="col">{{__('Image')}}</th>
                        <th scope="col">{{__('Name')}}</th>
                        {{-- <th scope="col">{{__('Description')}}</th> --}}
                        @if(Auth::user()->id == 1)
                            <th scope="col">{{__('Commerce')}}</th>
                        @endif
                        <th scope="col">{{__('Product Category')}}</th>
                        <th scope="col">{{__('State')}}</th>
                        <th scope="col">{{__('Actions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @if($products->count())
                        @foreach ($products as $product)
                            <tr class="text-center" id="{{$product->id}}">

                                <td>
                                    @if(Storage::disk('public')->exists($product->product_img))
                                        <img class="profile-user-img img-fluid mx-auto d-block" width="80"
                                            src="{{ asset('storage/'.$product->product_img) }}" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid mx-auto d-block" width="80"
                                            src="{{asset('img/product-placeholder.jpg')}}" alt="User profile picture">
                                    @endif
                                </td>

                                <td>{{$product->name}}</td>

                                {{-- <td>{{$product->description}}</td> --}}

                                @if(Auth::user()->id == 1)
                                    <td>{{$product->getCommerce->name}}</td>
                                @endif

                                <td>{{$product->getCategory->name}}</td>

                                <td>
                                    <span
                                        class="badge badge-{{Config::get('const.states')[$product->state]['color']}}">{{Config::get('const.states')[$product->state]['name']}}
                                    </span>
                                </td>

                                <td>
                                    <a type="button" class="btn btn-sm btn-warning" href="{{route('product.edit',[$product->id])}}">
                                        <i class="fas fa-edit"></i> {{__('Edit')}}
                                    </a>

                                    <button class="btn btn-sm btn-danger btnDeleteProduct">
                                        <i class="fas fa-trash-alt"></i> {{__('Delete')}}
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">
                                {{__('There are no categories to display')}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
