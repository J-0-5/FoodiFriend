@extends('layouts.app')
@section('content')
<div class="flex-column">
    <div class="container">
        @if(Auth::user()->id == 1)
            <div class="row px-3">
                <div class="col-11 h2">{{__('Commerce')}}s</div>
                <div class="col-1">
                    <button class="btn" data-toggle="collapse" data-target="#demo"><i class="fas fa-filter"></i></button>
                </div>
            </div>
            <div class="card-header border-0 collapse" id="demo">
                <form action="{{ route('commerce.index') }}" method="get">
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
                                <label class="form-control-label">Tipo</label>
                                <select name="type" class="selecttwo form-control">
                                    <option value="" {{ request()->type == "" ? 'selected' : ''}}>Todos</option>
                                    @foreach($commerceTypes as $type)
                                        <option value="{{$type->id}}" {{request()->type == $type->id ? 'selected': ''}}>
                                            {{$type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-3">
                                <label class="form-control-label">Estado</label>
                                <select name="state" class="selecttwo form-control">
                                    <option value="" {{ request()->state == "" ? 'selected' : ''}}>Todos</option>
                                    @foreach(Config::get('const.states') as $state => $value)
                                    <option value="{{$state}}" {{request()->state == $state ? 'selected' : ''}}>
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
                                            Filtrar
                                        </button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <a href="{{ route('commerce.index') }}" class="btn btn-primary btn-block"><i class="fas fa-backspace"></i>
                                            Borrar
                                        </a>
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
                            <th scope="col">@lang('Commerce')</th>
                            <th scope="col">@lang('NIT')</th>
                            <th scope="col">@lang('Type')</th>
                            <th scope="col">@lang('Description')</th>
                            <th scope="col">Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($commerces->count())
                            @foreach ($commerces as $commerce)
                                <tr id="{{$commerce->id}}">
                                    <td>
                                        {{$commerce->name}}
                                    </td>
                                    <td>
                                        {{$commerce->nit}}
                                    </td>
                                    <td>
                                        {{$commerce->type}}
                                    </td>
                                    <td>
                                        {{$commerce->description}}
                                    </td>
                                    <td>
                                        <span
                                            class="badge badge-{{Config::get('const.states')[$commerce->state]['color']}}">{{Config::get('const.states')[$commerce->state]['name']}}
                                        </span>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" {{--}}href="{{route('restaurant.edit', [$product->id])}}"{{--}}>
                                            <i class="fas fa-edit"></i>Editar
                                        </a>
                                        <button class="btn btn-sm btn-danger btnEraseRestaurant"><i class="fas fa-trash-alt"></i>
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center">
                                    {{__('There are no commerces to display')}}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        @else
            <form>
                <div class="form-group">
                    <label for="nit" class="col-md-4 col-form-label text-md-right">{{ __('NIT') }}</label>
                    <label for="formGroupExampleInput">Example label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Another label</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input">
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
