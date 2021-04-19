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
                <th scope="col">{{__('Actions')}}</th>
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
                            <span
                                class="badge badge-{{Config::get('const.status')[$order->status]['color']}}">{{Config::get('const.status')[$order->status]['name']}}
                            </span>
                        </td>

                        <td>
                            {{-- <a type="button" class="btn btn-sm btn-warning" href="{{route('product.edit',[$product->id])}}">
                                <i class="fas fa-edit"></i> {{__('Edit')}}
                            </a>

                            <button class="btn btn-sm btn-danger btnDeleteProduct">
                                <i class="fas fa-trash-alt"></i> {{__('Delete')}}
                            </button> --}}
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