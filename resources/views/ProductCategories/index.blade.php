@extends('layouts.app')
@section('content')
<div class="flex-column ">
    <div class="container-fluid px-3 mb-3 mr-5">
        <div class="row">
            <div class="col h2">@lang('Product Category')</div>
            <div class="col">
                <button type="button" class="btn btn-primary mb-3 mr-5" data-toggle="modal" data-target="#createCategories">
                    @lang('Create Categories')
                </button>
            </div>
            @include('ProductCategories.create')
            <div class="col">
                <button class="btn btn-primary" data-toggle="collapse" data-target="#demo"><i class="fas fa-filter"></i>Filtrar</button>
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
                <thead class="thead-light ">
                    <tr>
                        <th scope="col">@lang('Name')</th>
                        <th scope="col">@lang('Commerce')</th>
                        <th scope="col">@lang('Description')</th>
                        <th scope="col">@lang('State')</th>
                        <th scope="col"></th>
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
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditCategory">
                                <i class="fas fa-edit"></i>
                                @lang('Edit')
                            </button>
                            @include('ProductCategories.edit')
                            <button class="btn btn-sm btn-danger btnDeleteProductCategory"><i
                                class="fas fa-trash-alt"></i>@lang('Delete')
                            </button>
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
</div>
@endsection
