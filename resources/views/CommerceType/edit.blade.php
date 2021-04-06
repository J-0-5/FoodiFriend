<div class="modal fade" id="EditType">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">{{__('Edit').' '.__('Commerce Type')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="post" id="editForm" action="commerceType">
                @csrf
                @method('put')
                <div class="modal-body">

                    <div class="form-group">
                        <label>{{__('Name')}}</label>
                        <input type="text" name="name" id="edit_name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label>{{__('State')}}</label>
                        <select class="form-control" id="edit_state" name="state">
                        </select>
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span>{{__('Update')}}</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span>{{__('Close')}}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
