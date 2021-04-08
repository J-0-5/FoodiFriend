<div class="modal fade" id="EditCategory">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">@lang('Edit Category')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form method="POST" id="editForm" action="productCategory">
                @csrf @method('put')
                <div class="modal-body">

                    <div class="form-group">
                        <label>{{__('Name')}}</label>
                        <input type="text" id="edit_name" name="name" class="form-control" required/>
                    </div>

                    @if(Auth::user()->id == 1)
                        <div class="form-group">
                            <label>@lang('Commerce')</label>
                            <select class="form-control" name="commerce_id" id="edit_commerce_id">

                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        <label>@lang('Description')</label>
                        <textarea type="text" name="description" id="edit_description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>{{__('State')}}</label>
                        <select class="form-control" id="edit_state" name="state"></select>
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
