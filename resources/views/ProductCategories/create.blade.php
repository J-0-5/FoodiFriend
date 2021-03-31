@extends('layouts.app')

@section('content')
<h1>@lang('Create Categories')</h1>
<ul>
    <li><a href="{{route('productCategory.index')}}">@lang('Show Categories')</a></li>
    {{--
    <li><a href="{{route('productCategory.edit')}}">@lang('Update Categories')</a></li>
    <li><a href="{{route('productCategory.delete')}}">@lang('Delete Categories')</a></li>
    --}}
</ul>
@if (session('status'))
{{session('status')}}
@endif
<form method="POST" action="{{ route('productCategory.store') }}">
    @csrf
    <label> Nombre de la categoria de productos</label><br>
    <select name="name">
        <option value="Panaderia y dulces">Panaderia y dulces</option>
        <option value="Carnes y embutidos">Carnes y embutidos</option>
        <option value="Frutas y verduras">Frutas y verduras</option>
        <option value="Huevos, Lacteos y café">Huevos, Lacteos y café</option>
    </select><br>

    <button>Guardar</button>


</form>


@endsection
