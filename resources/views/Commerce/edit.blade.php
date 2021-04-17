@extends('layouts.app')
@section('content')
<div class="flex-column container">
    @if(session('status'))
        <div class="alert alert-success" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">x</span>
            </button>
        </div>
    @endif
    <div class="card shadow">
        <form method="post" action="{{route('commerce.update',[$commerce->id])}}">

            @csrf
            @method('put')

            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">{{__('Commerce Update')}}</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">

                <h5 class="heading-small text-muted mb-4">{{__('Businessman details')}}</h5>

                <div class="row">

                    <div class="form-group col-lg-6 col-12">
                        <label class="form-control-label">{{__('Name')}} *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{$commerce->getUser->name}}" placeholder="{{__('Name')}}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6 col-12">
                        <label class="form-control-label">{{__('Last name')}}s *</label>
                        <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror"
                            value="{{$commerce->getUser->lastName}}" placeholder="{{__('Last name')}}s" required>
                        @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-lg-4 col-12">
                        <label class="form-control-label">{{__('E-Mail Address')}} *</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{$commerce->getUser->email}}" placeholder="{{__('E-Mail Address')}}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-12">
                        <label class="form-control-label">{{__('Document type')}} *</label>
                        <select name="docType" class="form-control @error('docType') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione un tipo de comercio</option>
                            @foreach($docType as $type)
                            <option value=" {{$type->id}}"
                                {{$commerce->getUser->docType == $type->id ? 'selected' : ''}}>
                                {{$type->value}}
                            </option>
                            @endforeach
                        </select>
                        @error('docType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-12">
                        <label class="form-control-label">{{__('Document number')}} *</label>
                        <input type="number" name="docNum" class="form-control @error('docNum') is-invalid @enderror"
                            value="{{$commerce->getUser->docNum}}" placeholder="{{__('Document number')}}" required>
                        @error('docNum')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col-lg-4 col-12">
                        <label class="form-control-label">{{__('Department')}} *</label>
                        <select name="department" id="department"
                            class="form-control @error('department') is-invalid @enderror" required>
                            <option value="" selected disabled>{{ __('Select a'). " " .__('Department') }}</option>
                            @foreach($departments as $department)
                            <option value="{{$department->id}}"
                                {{$commerce->getUser->getCity->department_id == $department->id ? 'selected' : ''}}>
                                {{$department->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('department')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-12">
                        <label class="form-control-label">{{__('City')}} *</label>
                        <select name="city" id="city" class="form-control @error('city') is-invalid @enderror" required>
                            <option value="" selected disabled>{{ __('Select a'). "a " .__('City')}}</option>
                            @foreach ($commerce->getUser->getCity->getDepartment->getCities as $city)
                            <option value="{{$city->id}}"
                                {{$commerce->getUser->getCity->id == $city->id ? 'selected' : ''}}>{{$city->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-4 col-12">
                        <label class="form-control-label">{{__('Address')}} *</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            value="{{$commerce->getUser->address}}" placeholder="{{__('Address')}}" required>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="row align-items-center">

                    <div class="form-group col">
                        <label class="form-control-label">{{__('Password')}}</label>
                        <input type="text" name="password" {{Auth::user()->id == $commerce->user_id ? '' : 'disabled'}}
                            class="form-control  @error('password') is-invalid @enderror"
                            placeholder="{{__('Password')}}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label class="form-control-label">{{__('Confirm Password')}}</label>
                        <input type="text" name="password_confirmation"
                            {{Auth::user()->id == $commerce->user_id ? '' : 'disabled'}} class="form-control"
                            placeholder="{{__('Confirm Password')}}">
                    </div>

                </div>

                <h5 class="heading-small text-muted my-4">{{__('Commerce details')}}</h5>

                <div class="row">

                    <div class="form-group col">
                        <label class="form-control-label" for="commerceName">{{__('Commerce name')}}*</label>
                        <input type="text" name="commerceName" value="{{$commerce->name}}"
                            class="form-control @error('commerceName') is-invalid @enderror"
                            placeholder="{{__('Commerce name')}}">
                        @error('commerceName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label class="form-control-label" for="nit">NIT *</label>
                        <input type="number" name="nit" value="{{$commerce->nit}}"
                            class="form-control @error('nit') is-invalid @enderror" placeholder="NIT" required>
                        @error('nit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>

                <div class="row">

                    <div class="form-group col">
                        <label class="form-control-label" for="commerceType">Tipo de comercio *</label>
                        <select name="commerceType" class="form-control @error('commerceType') is-invalid @enderror"
                            required disabled>
                            <option value="" selected disabled>Seleccione un tipo de comercio</option>
                            @foreach($commerceType as $type)
                            <option value="{{$type->id}}" {{$commerce->type == $type->id ? 'selected' : ''}}>
                                {{$type->name}}
                            </option>
                            @endforeach
                        </select>
                        @error('commerceType')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group col">
                        <label class="form-control-label">{{__('State')}}</label>
                        <select name="state" class="form-control">
                            @foreach(Config::get('const.states') as $state => $value)
                            <option value="{{$state}}" {{$commerce->state == $state ? 'selected' : ''}}>
                                {{$value['name']}}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="row align-items-center">
                    <div class="form-group col">
                        <label class="form-control-label" for="description">{{__('Description')}}</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            rows="4" placeholder="{{__('Description')}}">{{$commerce->description}}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">{{__('Commerce Update')}}</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
