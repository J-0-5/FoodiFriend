<div class="modal fade editModal" id="EditType">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">{{__('Edit').' '.__('Commerce Type')}}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" >
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label>@lang('Name')</label>
                        <input type="text" name="name" id="edit_name" class="form-control"/>
                    </div>

                    <div class="form-group">
                        <label>@lang('State')</label>
                        <select class="form-control" id="edit_state" name="state">

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
