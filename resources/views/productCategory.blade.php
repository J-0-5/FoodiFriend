@extends('layouts.app')

@section('content')
    <h1>@lang('Product Category')</h1>

    <ul>
        <a href="{{route('productCategory.create')}}">@lang('Create Categories')</a>
        {{--
        <a href="{{route('productCategory.edit')}}">@lang('Update Categories')</a>
        <a href="{{route('productCategory.delete')}}">@lang('Delete Categories')</a>
        --}}
    </ul>

    <ul>
        @isset($productCategory)
            @foreach ($productCategory as $category)
                <li> <b> Id :</b> {{ $category->id }}<br><b>Name:</b> {{ $category->name }}<br><b>Commerce_id:</b> {{ $category->commerce_id }}<br></li>
            @endforeach
        @else
            <li>@lang('There are no categories to display')</li>
        @endisset
    </ul>


@endsection
