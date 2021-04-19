<div class="modal fade" id="cart">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">{{__('Cart')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            @if (count(Cart::getContent()))
            <div class="modal-body">
                    @foreach (Cart::getContent() as $item)
                        <div class="row border-bottom mt-2">
                            <div class="col-md-2 col-3 my-auto">
                                <div class="avatar text-center" style="height: 50px !important;">
                                   <img class="media-object img-raised" src="{{asset('storage/' . $item->attributes[0]['product_img'])}}" alt="Imagen" style="height: 90% !important;">
                                </div>
                             </div>
                            {{$item->name}} || {{$item->quantity}}
                            <form action="{{route('cart.remove')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$item->id}}">
                                <button class="btn" type="submit"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    @endforeach
                <p>Total: {{number_format(Cart::getSubTotal())}}</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    <span>{{__('Buy')}}</span>
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span>{{__('Close')}}</span>
                </button>
            </div>
            @else
            <h3 class="text-center m-3">{{__('Empty cart')}}</h3>
            @endif
        </div>
    </div>
</div>
