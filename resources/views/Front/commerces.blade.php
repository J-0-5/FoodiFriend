@extends('Front.layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Tipo de Comercios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Comercios</li>
  </ol>
</nav>
<br>
<div class="container">
    <div class="col text-center">
        <h3 class="mb-3">{{__('Commerce').'s'}}</h3>
    </div>
    <div class="d-flex flex-wrap d-flex justify-content-center">
        @foreach ($commerces as $commerce)
        @if($commerce->state != 0)
        <a href="{{route('home.products',$commerce->id)}}" class="col-lg-4 col-md-6 col-12 text-decoration-none">
            <div class="card p-2 m-2 rounded">
                @if (Storage::disk('public')->exists($commerce->img))
                <img class="card-img-top img-fluid rounded" src="{{ asset('storage/' . $commerce->img) }}"
                    alt="Card image cap">
                @else
                <img class="card-img-top img-fluid rounded" src="{{asset('img/product-placeholder.jpg')}}" alt="Card image cap">
                @endif

                <div class="card-body text-center">
                    <h4 class="card-title text-dark">{{$commerce->name}}</h4>
                </div>
            </div>
        </a>
        @endif
        @endforeach
    </div>
</div>
@endsection
