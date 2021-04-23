@if(isset($categories))
<aside class="col-12 col-md-2 ml-3 p-0 bg-light">
    <nav class="navbar navbar-expand navbar-dark bg-light flex-md-column flex-row align-items-start">
        <div class="align-items-center m-3">
            {{-- <div class="card-body"> --}}
                @if (Storage::disk('public')->exists($commerce->img))
                <img class="card-img-top" src="{{ asset('storage/' . $commerce->img) }}"
                    alt="User profile picture">
                @else
                <img class="card-img-top" src="{{asset('img/product-placeholder.jpg')}}"
                    alt="User profile picture">
                @endif
            {{-- </div> --}}
        </div>
        <div class="collapse navbar-collapse">
            <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
                @foreach($categories as $category)
                <li class="nav-item p-2">
                    <form action="{{route('home.products',$commerce->id)}}" method="GET">
                    @csrf
                    <input type="hidden" name="category_id" value="{{$category->id}}">
                    <input class="nav-link text-dark btn btn-link" type="submit" value="{{$category->name}}">
                    </form>
                    {{-- <a class="nav-link text-dark" href="·">{{$category->name}}</a> --}}
                </li>
                @endforeach
            </ul>
        </div>
    </nav>
</aside>
@endif
