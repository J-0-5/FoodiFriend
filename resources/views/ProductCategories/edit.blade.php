<div class="modal fade" id="EditCategory">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">@lang('Edit Category')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" action=" {{ route('productCategory.update', $productCategory) }} ">                
                @csrf @method('PATCH')
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" value="{{ $productCategory->name }}" name="name" class="form-control"/>
                    </div>
                    @if(Auth::user()->id == 1)
                    <div class="form-group">
                        <label>@lang('Commerce')</label>
                        <select class="form-control" name="commerce_id">
                            <option value="">{{ $productCategory->getCommerce->name }}</option>
                            @foreach ($commerce as $commerce)
                                @if($productCategory->getCommerce->name != $commerce->name)
                                    <option value="{{$commerce->id}}">{{$commerce->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>@lang('Description')</label>
                        <textarea type="text" name="description" class="form-control">{{ $productCategory->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>@lang('State')</label>
                        <select class="form-control" name="state">
                            @if($productCategory->state == 1)
                            <option value="{{ $productCategory->state }}">Activo</option>
                            <option value="2">Inactivo</option>
                            @else
                            <option value="{{ $productCategory->state }}">Inactivo</option>
                            <option value="1">Activo</option>
                            @endif
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span>@lang('Update')</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span>@lang('Close')</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>