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
                @if(Auth::user()->id == 1)
                <th scope="col">{{__('Commerce')}}</th>
                @endif
                <th scope="col">{{__('Client')}}</th>
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

                        @if(Auth::user()->id == 1)
                            <td>{{$order->getCommerce->name}}</td>
                        @endif

                        <td> {{$order->getUser->name}}  </td>

                        <td> {{$order->getUser->address}} </td>

                        <td> {{$order->created_at}} </td>

                        <td> {{ number_format($order->total, 2)}} </td>

                        <td>
                            <select class="custom-select w-50" name="status" id="status">
                                @foreach(Config::get('const.status') as $status => $value)
                                <option value="{{$status}}" {{$order->status == $status ? 'selected' : ''}}>
                                    {{$value['name']}}
                                </option>
                                @endforeach
                            </select>
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
