<div class="modal fade" id="createType">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">{{__('Create').' '.__('Commerce Type')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post" enctype="multipart/form-data" action="{{route('commerceType.store')}}">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label>{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>{{__('Image')}} <span class="small text-muted">(tamaño recomendado de 600px*600px)</span></label>
                        <input type="file" name="typeImg" class="form-control-file" />
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span>{{__('Create')}}</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span>{{__('Close')}}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
