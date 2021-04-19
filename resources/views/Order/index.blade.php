@extends('layouts.app')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">@lang('Orders')</li>
  </ol>
</nav>
<br>

<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light ">
            <tr class="text-center">
                <th scope="col">{{__('#')}}</th>
                @if(Auth::user()->id == 1)
                <th scope="col">{{__('Commerce')}}</th>
                @endif
                <th scope="col">{{__('Name')}}</th>
                <th scope="col">{{__('E-Mail Address')}}</th>
                <th scope="col">{{__('Address')}}</th>
                <th scope="col">{{__('Date')}}</th>
                <th scope="col">{{__('Total')}}</th>
                <th scope="col">{{__('State')}}</th>
            </tr>
        </thead>
        <tbody>
            @if(count($orders))
                @foreach ($orders as $order)
                    <tr class="text-center" id="{{$order->id}}">

                        <td>{{ $number += 1 }}</td>

                        @if(Auth::user()->id == 1)
                            <td>{{$order->getCommerce->name}}</td>
                        @endif

                        @foreach($users as $user)
                        @if($user->id == $order->customer_id)
                        <td> {{$user->name}}  </td>

                        <td> {{$user->email}} </td>

                        <td> {{$user->address}} </td>
                        @break 
                        @endif 
                        @endforeach

                        <td> {{$order->created_at}} </td>

                        <td> {{ number_format($order->total, 2)}} </td>

                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-{{Config::get('const.status')[$order->status]['color']}} dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{Config::get('const.status')[$order->status]['name']}}
                                </button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#">Solicitado</a>
                                  <a class="dropdown-item" href="#">Aprobado</a>
                                  <a class="dropdown-item" href="#">Rechazado</a>
                                  <a class="dropdown-item" href="#">En Camino</a>
                                  <a class="dropdown-item" href="#">Entregado</a>
                                </div>
                              </div>
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
  
@endsection