<div class="modal fade" id="cart">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">{{__('Cart')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            @if (count(Cart::getContent()))
            <div class="modal-body overflow-auto">
                @foreach (Cart::getContent() as $item)
                <div class="row border-bottom mt-2 p-2 px-4 d-flex align-items-center justify-content-between">
                    <div class="col-md-2 col-3 my-auto">
                        <div class="img-fluid rounded" style="height: 50px !important;">
                            @if($item->attributes[0]['product_img'] != null)
                            <img class="rounded-circle"
                                src="{{asset('storage/' . $item->attributes[0]['product_img'])}}" alt="Imagen"
                                style="height: 90% !important;">
                            @else
                            <img class="rounded-circle" src="{{asset('img/product-placeholder.jpg')}}"
                                style="height: 50px !important;">
                            @endif
                        </div>
                    </div>
                    <div class="col text-break">
                        {{$item->name}}
                    </div>
                    <div class="col text-center">
                        <div class="row text-center">
                            {{number_format($item->price * $item->quantity)}}
                        </div>
                        <div class="row text-center">
                            und. {{$item->quantity}}
                        </div>
                    </div>
                    <form action="{{route('cart.remove')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button class="btn" type="submit"><i class="fas fa-trash-alt fa-sm"
                                style="color: rgb(163, 20, 20)"></i></button>
                    </form>
                </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    <p class="text-center bg-info p-1 rounded mt-3">Total: {{number_format(Cart::getSubTotal())}}</p>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <form action="{{route('cart.checkout')}}">
                    <button type="submit" class="btn btn-primary">
                        <span>{{__('Go pay!')}}</span>
                    </button>
                </form>
                <form action="{{route('cart.clear')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <span>{{__('Clear cart')}}</span>
                    </button>
                </form>
            </div>
            @else
            <h3 class="text-center m-3">{{__('Empty cart')}}</h3>
            @endif
        </div>
    </div>
</div>
