<div class="card-header border-0 collapse" id="demo">
    <form action="{{route('productCategory.index')}}" method="get">
        <div class="row align-items-center">
            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">@lang('Name')</label>
                    <input type="text" placeholder="@lang('Category Name')" value="{{request()->name}}" name="name"
                        class="form-control name">
                </div>
            </div>
            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">@lang('Commerce Name')</label>
                    <select name="CommerceId" class="selecttwo form-control">
                        <option value="" {{ request()->CommerceId == "" ? 'selected' : ''}}>@lang('All')</option>
                        @foreach($commerces as $commerce)
                        <option value="{{$commerce->id}}" {{request()->CommerceId == $commerce->id ? 'selected': ''}}>
                            {{$commerce->name}}</option>
                        @endforeach
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