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
                            <img class="media-object img-raised"
                                src="{{asset('storage/' . $item->attributes[0]['product_img'])}}" alt="Imagen"
                                style="height: 90% !important;">
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
                <p class="text-center">Total: {{number_format(Cart::getSubTotal())}}</p>
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
