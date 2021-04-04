<div class="card-header border-0 collapse" id="demo">
    <form action="{{--}}{{route('products.commerce.show', $commerce->id)}}{{--}}" method="get">
        <div class="row align-items-center">
            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">Nombre</label>
                    <input type="text" placeholder="Nombre del producto" value="{{request()->name}}" name="name"
                        class="form-control name">
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">Categoria</label>
                    <select name="category" class="selecttwo form-control">
                        <option value="" {{ request()->category == "" ? 'selected' : ''}}>Todos</option>
                        {{--}} @foreach($categories as $category)
                        <option value="{{$category->id}}" {{request()->category == $category->id ? 'selected': ''}}>
                            {{$category->name}}</option>
                        @endforeach{{--}}
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">Estado</label>
                    <select name="state" class="selecttwo form-control">
                        <option value="" {{ request()->state == "" ? 'selected' : ''}}>Todos</option>
                        @foreach(Config::get('const.states') as $state => $value)
                        <option value="{{$state}}" {{request()->state === $state ? 'selected' : ''}}>
                            {{$value['name']}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="row justify-content-between">
                    <div class="col-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-filter"></i>
                                Filtrar</button>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <a href="{{ route('productCategory.index') }}" class="btn btn-primary btn-block"><i
                                    class="fas fa-backspace"></i> Borrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>