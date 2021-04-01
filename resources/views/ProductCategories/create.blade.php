{{--
@extends('index')

@section('modalCreate')

    @if(session('status'))
        {{session('status')}}
    @endif
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createCategories">
        @lang('Create Categories')
    </button>

    <div class="modal fade" id="createCategories">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">@lang('Create Categories')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('productCategory.store') }}" method="POST" class="was-validated">    
            @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <select class="form-control" name="name" required>
                            <option value="">@lang('Select')</option>
                            <option value="Panaderia y dulces">Panaderia y dulces</option>
                            <option value="Carnes y embutidos">Carnes y embutidos</option>
                            <option value="Frutas y verduras">Frutas y verduras</option>
                            <option value="Huevos, Lacteos y café">Huevos, Lacteos y café</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>@lang('State')</label>
                        <select class="form-control" name="state" required>
                            <option value="">@lang('Select')</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span>Enviar</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span>Cerrar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>

@stop
-}}

