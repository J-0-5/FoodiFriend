@extends('layouts.app')
@section('content')
<a href="{{route('order.index')}}" class="btn btn-primary mb-3">Volver</a>

@foreach ($order as $order)
<div class="container-fluid px-3 mb-3">
    <div class="row">
        <div class="col-12">
            <div class="card-deck">
                <div class="card col-8">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="card-title mb-4">{{__('Order').' #'.$id}} <i class="fas fa-shopping-cart"></i></h3>
                                    <h5 class="card-text text-info">{{__('Name')}}</h5>
                                    <p class="card-text">{{$order->getUser->name}}</p>
                                    <h5 class="card-text text-info">{{__('City')}}</h5>
                                    <p class="card-text">{{$order->getUser->getCity->name}}</p>
                                    <h5 class="card-text text-info">{{__('Commerce')}}</h5>
                                    <p class="card-text">{{$order->getCommerce->name}}</p>
                                </div>
                                <div class="col-6 mt-5">
                                    <h5 class="card-text text-info">{{__('Email')}}</h5>
                                    <p class="card-text">{{$order->getUser->email}}</p>
                                    <h5 class="card-text text-info">{{__('Address')}}</h5>
                                    <p class="card-text">{{$order->getUser->address}}</p>
                                    <h5 class="card-text text-info">{{__('Observations')}}</h5>
                                    @if($order->description != '' or $order->description != null)
                                    <p class="card-text">{{$order->description}}</p>
                                    @else
                                    <p class="card-text">{{__('No Observation Available')}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-4">
                    <div class="card-body">
                    <h3 class="card-title mt-4">{{__('Invoice Detail')}}</h3>
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-text text-info">{{__('Payment Type')}}</h5>
                                    <p class="card-text">{{__('Upon delivery')}}</p>
                                    <h5 class="card-text text-info">{{__('Shipping Cost')}}</h5>
                                    <p class="card-text">&#36;{{number_format(7000,2)}}</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="card-text text-info">{{__('SubTotal')}}</h5>
                                    <p class="card-text">&#36;{{number_format($order->total-7000,2)}}</p>
                                    <h5 class="card-text text-info">{{__('Total')}}</h5>
                                    <p class="card-text">&#36;{{number_format($order->total,2)}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @foreach($orderDetails as $orderDetail)
    <div class="row px-3 mt-3">
        <div class="col-12 mr-n1 d-flex">
            <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img class="card-img-top img-fluid rounded" src="{{asset('img/product-placeholder.jpg')}}" alt="Card image cap">
                            </div>
                            <div class="col-10 ">
                                <div class="row">
                                    <div class="col-9">
                                        <h5 class="card-title mt-4">{{$orderDetail->getProduct->name}}</h5>
                                        <p class="card-text">{{__('Quantity')}}: {{$orderDetail->quantity}}</p>
                                        {{-- <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Beatae modi dolor sed atque cum, et incidunt enim blanditiis nemo nesciunt esse ea. Nostrum labore repellat, corporis accusamus alias illo in!</p> --}}
                                    </div>
                                    <div class="col-3 mt-4">
                                        <p class="card-text">&#36;{{number_format($orderDetail->getProduct->price*$orderDetail->quantity,2)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div> 
    @endforeach
    <div class="row px-3 mt-3">
        <div class="card-deck">
            <div class="card col">
                <div class="card-body">
                    <h3 class="card-title mt-4">{{__('Estado del pedido')}}</h3>
                    <h5 class="card-text text-info">{{__('Status')}}</h5>
                    @foreach(Config::get('const.status') as $status => $value)
                        @if($order->status == $status)
                            <p class="card-text">{{$value['name']}}</p>
                            @break
                        @endif
                    @endforeach
                    <a href="#" class="btn btn-danger mb-3">{{__('Order Delete')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>  
@endforeach
@endsection