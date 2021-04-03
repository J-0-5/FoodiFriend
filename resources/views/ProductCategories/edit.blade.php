@extends('layouts.app')

@section('content')

@if(session('status'))
{{session('status')}}
@endif

    <div class="container col-5 ml-5">
    <h4 class="modal-title">@lang('Update Category')</h4>

    <form method="POST" action=" {{ route('productCategory.update', $productCategory) }} ">    
         
        @csrf @method('PATCH')
            <div class="form-group">
                <label>@lang('Name')</label>
                <input type="text" value="{{ $productCategory->name }}" name="name" class="form-control"/>
            </div>
            <div class="form-group">
                <label>@lang('Description')</label>
                <textarea type="text" name="description" class="form-control">{{ $productCategory->description }}</textarea>
            </div>
            <div class="form-group">
                <label>@lang('State')</label>
                <select class="form-control" name="state">
                    @if($productCategory->state == 1)
                    <option value="{{ $productCategory->state }}">Activo</option>
                    <option value="2">Inactivo</option>
                    @else
                    <option value="{{ $productCategory->state }}">Inactivo</option>
                    <option value="1">Activo</option>
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">
                <span>Actualizar</span>
            </button>
            
    </form>
    

@endsection