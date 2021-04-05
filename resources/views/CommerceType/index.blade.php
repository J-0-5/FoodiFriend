@extends('layouts.app')
@section('content')
<div class="flex-column">
    <div class="container">
        @if(Auth::user()->id == 1)
        <div class="row px-3">
            <div class="col-11 h2">{{__('Commerce Type')}}</div>
            <div class="col-1">
                <button class="btn" data-toggle="collapse" data-target="#demo"><i class="fas fa-filter"></i></button>
            </div>
        </div>
        <div class="card-header border-0 collapse" id="demo">
            <form action="{{ route('commerce.index') }}" method="get">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="form-group mb-3">
                            <label class="form-control-label">{{__('Commerce Type')}}</label>
                            <input type="text" placeholder="{{__('Commerce Type')}}" value="{{request()->name}}"
                                name="name" class="form-control name">
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
                                    <button type="submit" class="btn btn-primary btn-block"><i
                                            class="fas fa-filter"></i>
                                        Filtrar
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <a href="{{ route('commerce.index') }}" class="btn btn-primary btn-block"><i
                                            class="fas fa-backspace"></i>
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
                        <th scope="col">@lang('Name')</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha de creación</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @if($commerceTypes->count())
                    @foreach ($commerceTypes as $commerceType)
                    <tr id="{{$commerceType->id}}">
                        <td>
                            {{$commerceType->name}}
                        </td>
                        <td>
                            <span
                                class="badge badge-{{Config::get('const.states')[$commerceType->state]['color']}}">{{Config::get('const.states')[$commerceType->state]['name']}}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning btnEditType" data-toggle="modal" data-target="#EditType">
                                <i class="fas fa-edit"></i>{{__('Edit')}}
                            </button>
                            <button class="btn btn-sm btn-danger btnDeletecommerceType"><i class="fas fa-trash-alt"></i>
                                {{__('Delete')}}
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-center">
                            {{__('There are no commerce types to display')}}
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
@include('CommerceType.edit')
@endsection
