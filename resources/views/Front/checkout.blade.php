@extends('Front.layouts.app')
@section('content')
<form action="{{route('cart.order')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-5">
            <div class="card shadow-sm border">
                <div class="card-header bg-primary">
                    <h4 class="text-white mb-3 text-uppercase"><strong>Pago</strong></h4>
                </div>
                <div class="card-body">
                    <div class="row bg-light py-2 mb-1">
                        <div class="col-auto">
                            <div class="text-left tit-info-finish-car text-muted font-weight-bold">
                                Total productos</div>
                        </div>
                        <div class="col my-auto">
                            <h4 class="text-dark text-right mb-0 totalpage">
                                ${{number_format(Cart::getSubTotal(),2,',','.')}}</h4>
                        </div>
                    </div>
                    <div class="row bg-light py-2 mb-1">
                        <div class="col-auto">
                            <div class="text-left tit-info-finish-car text-muted font-weight-bold">
                                Valor domicilio</div>
                        </div>
                        <div class="col my-auto">
                            <h4 class="text-dark text-right mb-0 totalpage" >$7.000,00
                            </h4>
                        </div>
                    </div>

                    <div class="row bg-light py-2 mb-1">
                        <div class="col-auto">
                            <div class="text-left tit-info-finish-car text-muted font-weight-bold">
                                Valor total</div>
                        </div>
                        <div class="col my-auto">
                            <h4 class="text-dark text-right mb-0 totalpage" id="idTotalOrder">
                                ${{number_format(Cart::getSubTotal()+7000,2,',','.')}}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex flex-column col-7">
            <div class="col-12 m-1">
                <div class="card shadow-sm border">
                    <div class="card-header bg-primary">
                        <h4 class="text-white mb-3 text-uppercase"><strong>Observaciones</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check row">
                            <div class="col-12">
                                <textarea class="form-control" name="observation"
                                    placeholder="Escriba sus observaciones" rows="3"
                                    style="border-radius: 5px"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 m-1">
                <div class="card shadow-sm border">
                    <div class="card-header bg-primary">
                        <h4 class="text-white mb-3 text-uppercase"><strong>Tipo de pago</strong></h4>
                    </div>
                    <div class="card-body">
                        <div class="form-check row">
                            <div class="col-6">
                                <label class="form-check-label">
                                    <input type="radio" name="paymentType" value="4" checked width="30%">
                                    <img src="{{ asset('img/cash.png') }}" width="70%">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <input type="submit" class="btn btn-primary text-white float-right mt-3 mr-3" value="{{__('Finalize')}}">
</form>
@endsection
