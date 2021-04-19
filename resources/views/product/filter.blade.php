<div class="card-header border-0 collapse mb-4" id="productFilter">
    <form action="{{route('product.index')}}" method="get">

        <div class="row align-items-center">

            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">{{__('Name')}}</label>
                    <input type="text" placeholder="{{__('Product name')}}" value="{{request('name')}}"
                    name="name" class="form-control name">
                </div>
            </div>

            @if(Auth::user()->id == 1)
                <div class="col">
                    <div class="form-group mb-3">
                        <label class="form-control-label">{{__('Commerce Name')}}</label>
                        <select name="commerce_id" id="commerce_id" class="form-control">
                            <option value="" {{ request('commerce_id') == "" ? 'selected' : ''}}>{{__('All')}}</option>
                            @foreach($commerces as $commerce)
                                <option value="{{$commerce->id}}" {{request('commerce_id') == $commerce->id ? 'selected': ''}}>
                                    {{$commerce->name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">{{__('Product Category')}}</label>
                    <select name="productCategory_id" id="productCategory" class="form-control">
                        <option value="" {{ request('productCategory_id') == "" ? 'selected' : ''}}>{{__('All')}}</option>
                        @if(Auth::user()->getCommerce)
                            @foreach($productCategories as $productCategory)
                                <option value="{{$productCategory->id}}" {{request('productCategory_id') == $productCategory->id ? 'selected': ''}}>
                                    {{$productCategory->name}}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="form-group mb-3">
                    <label class="form-control-label">Estado</label>
                    <select name="state" class="form-control">
                        <option value="" {{ request('state') == "" ? 'selected' : ''}}>Todos</option>
                        @foreach(Config::get('const.states') as $state => $value)
                            <option value="{{$state}}" {{request('state') == $state ? 'selected' : ''}}>
                                {{$value['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col">
                <div class="row justify-content-between">

                    <div class="col-6 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-filter"></i> @lang('Filter')
                            </button>
                        </div>
                    </div>

                    <div class="col-6 mt-4">
                        <div class="form-group">
                            <a href="{{ route('product.index') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-backspace"></i> @lang('Clear')
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
