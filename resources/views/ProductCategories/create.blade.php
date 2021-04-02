    <button type="button" class="btn btn-primary ml-5 mb-3" data-toggle="modal" data-target="#createCategories">
        @lang('Create Categories')
    </button>

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
                        <input type="text" name="name" class="form-control" required/>
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


