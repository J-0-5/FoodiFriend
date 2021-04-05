<div class="modal fade" id="createCategories">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-info text-white">
                <h4 class="modal-title">@lang('Create Categories')</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <form action="{{ route('productCategory.store') }}" method="POST">    
            @csrf
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">

                        @if($errors->any())
                        <ul>
                            @foreach($errors-all() as $error)
                            <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                        @endif

                        <label>@lang('Name')</label>
                        <input type="text" name="name" class="form-control" required/>
                    </div>
                    @if(Auth::user()->id == 1)
                    <div class="form-group">
                        <label>@lang('Commerce')</label>
                        <select class="form-control" name="commerce_id" required>
                            <option value="">@lang('Select')</option>
                            @foreach ($commerces as $commerce)
                                <option value="{{$commerce->id}}">{{$commerce->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div class="form-group">
                        <label>@lang('Description')</label>
                        <textarea type="text" name="description" class="form-control" required></textarea>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <span>@lang('Create')</span>
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span>@lang('Close')</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


