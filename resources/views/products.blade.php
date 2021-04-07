@extends('layouts.app')

@section('content')

<div class="container-fluid px-3 mb-3">

    {{--  @yield('modalCreate') --}}

    <button type="button" class="btn btn-primary ml-5 mb-3" data-toggle="modal" data-target="#createCategories">
        @lang('Create Categories')
    </button>

    @include('ProductCategories.edit')


    <div class="row px-3">
        <div class="col-11 h2">@lang('Product Category')</div>
        <div class="col-1">
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
    <div class="card-header border-0 collapse" id="demo">

        <form action="{{--}}{{route('products.commerce.show', $commerce->id)}}{{--}}" method="get">
            <div class="row align-items-center">
                <div class="col">
                    <div class="form-group mb-3">
                        <label class="form-control-label">Nombre</label>
                        <input type="text" placeholder="Nombre del producto" value="{{request()->name}}" name="name"
                            class="form-control name">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label class="form-control-label">Categoria</label>
                        <select name="category" class="selecttwo form-control">
                            <option value="" {{ request()->category == "" ? 'selected' : ''}}>Todos</option>
                            {{--}} @foreach($categories as $category)
                            <option value="{{$category->id}}" {{request()->category == $category->id ? 'selected': ''}}>
                                {{$category->name}}</option>
                            @endforeach{{--}}
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label class="form-control-label">Estado</label>
                        <select name="state" class="selecttwo form-control">
                            <option value="" {{ request()->state == "" ? 'selected' : ''}}>Todos</option>
                            @foreach(Config::get('const.states') as $state => $value)
                            <option value="{{$state}}" {{request()->state === $state ? 'selected' : ''}}>
                                {{$value['name']}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-filter"></i>
                                    Filtrar</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <a href="{{ route('productCategory.index') }}" class="btn btn-primary btn-block"><i
                                        class="fas fa-backspace"></i> Borrar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <div class="table-responsive">
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">@lang('Name')</th>
                    <th scope="col">@lang('Commerce')</th>
                    <th scope="col">Estado</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if($productCategory->count())
                @foreach ($productCategory as $category)
                <tr id="{{$category->id}}">
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        {{$category->getCommerce->name}}
                    </td>
                    <td>
                        <span
                            class="badge badge-{{Config::get('const.states')[$category->state]['color']}}">{{Config::get('const.states')[$category->state]['name']}}
                        </span>
                    </td>
                    <td>
                        <a class="btn btn-sm btn-warning" {{--}}href="{{route('restaurant.edit', [$product->id])}}"
                            {{--}}>
                            <i class="fas fa-edit"></i>Editar
                        </a>
                        <button class="btn btn-sm btn-danger btnEraseRestaurant"><i class="fas fa-trash-alt"></i>
                            Eliminar</button>
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

@endsection