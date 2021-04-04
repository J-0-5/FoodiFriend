@extends('layouts.app')

@section('content')

<div class="container-fluid px-3 mb-3">

    @include('ProductCategories.create')

    <div class="row px-3">
        <div class="col-11 h2">@lang('Product Category')</div>
        
        <div class="col-1">
            <button class="btn" data-toggle="collapse" data-target="#demo"><i class="fas fa-filter"></i></button>
        </div>
    </div>

@if($productCategory->count())
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
    
    @include('ProductCategories.filter')

    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Commerce')</th>
                    <th scope="col">@lang('Description')</th>
                    <th scope="col">@lang('State')</th>
                    <th colspan="1"></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($productCategory as $productCategory)
                <tr id="{{$productCategory->id}}">
                    <td>
                        {{$productCategory->name}}
                    </td>
                    <td>
                        {{$productCategory->getCommerce->name}}
                    </td>
                    <td>
                        {{$productCategory->description}}
                    </td>
                    <td>
                        <span
                            class="badge badge-{{Config::get('const.states')[$productCategory->state]['color']}}">{{Config::get('const.states')[$productCategory->state]['name']}}
                        </span>
                    </td>
                    <td colspan="5">
                        <a class="btn btn-sm btn-warning" href=" {{ route('productCategory.edit', $productCategory) }} ">
                            <i class="fas fa-edit"></i>Editar
                        </a>
                        <button class="btn btn-sm btn-danger btnDeleteProductCategory"><i
                            class="fas fa-trash-alt"></i>Eliminar
                        </button>
                        {{-- <form method="POST" action="{{ route('productCategory.destroy', $productCategory) }}">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger btnEraseRestaurant">
                                <i class="fas fa-trash-alt"></i>Eliminar
                            </button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else       
    <h1 class="text-center">
        {{__('There are no categories to display')}}
    </h1>            
@endif
</div>

@endsection
