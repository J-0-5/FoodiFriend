@extends('layouts.app')
@section('content')
<div class="flex-column ">
    <div class="container-fluid px-3 mb-3 mr-5">
        <div class="row">

            <div class="col h2">{{__('Product Category')}}</div>

            <div class="col">
                <button type="button" class="btn btn-primary mb-3 mr-5" data-toggle="modal"
                    data-target="#createCategories">
                    {{__('Create Categories')}}
                </button>
            </div>

            <div class="col">
                <button class="btn" data-toggle="collapse" data-target="#demo"><i class="fas fa-filter"></i></button>
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

        @include('ProductCategories.filter')

        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light ">
                    <tr>
                        <th scope="col">{{__('Name')}}</th>
                        @if(Auth::user()->id == 1)
                            <th scope="col">@lang('Commerce')</th>
                        @endif
                        <th scope="col">@lang('Description')</th>
                        <th scope="col">{{__('State')}}</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @if($productCategory->count())
                        @foreach ($productCategory as $productCategory)
                            <tr id="{{$productCategory->id}}">

                                <td>{{$productCategory->name}}</td>

                                @if(Auth::user()->id == 1)
                                    <td>{{$productCategory->getCommerce->name}}</td>
                                @endif

                                <td>{{$productCategory->description}}</td>

                                <td>
                                    <span
                                        class="badge badge-{{Config::get('const.states')[$productCategory->state]['color']}}">{{Config::get('const.states')[$productCategory->state]['name']}}
                                    </span>
                                </td>

                                <td>
                                    <button type="button" class="btn btn-sm btn-warning btnEditProductCategory"
                                        data-toggle="modal" data-target="#EditCategory">
                                        <i class="fas fa-edit"></i>{{__('Edit')}}
                                    </button>

                                    <button class="btn btn-sm btn-danger btnDeleteProductCategory">
                                        <i class="fas fa-trash-alt"></i>{{__('Delete')}}
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
@include('ProductCategories.create')
@include('ProductCategories.edit')
@endsection
