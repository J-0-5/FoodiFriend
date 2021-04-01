{{-- <h1>@lang('Create Categories')</h1> --}}

{{-- <ul> --}}
    {{-- <li><a href="{{route('productCategory.index')}}">@lang('Show Categories')</a></li> --}}
    {{--
    <li><a href="{{route('productCategory.edit')}}">@lang('Update Categories')</a></li>
    <li><a href="{{route('productCategory.delete')}}">@lang('Delete Categories')</a></li>
    --}}
{{-- </ul> --}}
<div class="modal fade" id="createCategories">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">@lang('Create Categories')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('productCategory.store') }}" method="POST" class="was-validated">
                @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" class="form-control" name="name" required />
                    </div>
                    <div class="form-group">
                        <label>@lang('State')</label>
                        <select class="form-control" name="state" required>
                            <option value="">@lang('Select')</option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span>Enviar</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span>Cerrar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
