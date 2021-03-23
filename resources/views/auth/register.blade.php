@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register')}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName"
                                class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text"
                                    class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                                    value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <select name="docType" class="col-md-3 col-form-label custom-select @error('docType')
                                is-invalid @enderror" required id="">
                                <option selected disabled value="0">{{ __('Document type') }}</option>
                                @foreach ($docType as $docType)
                                <option value="{{$docType->id}}">{{$docType->value}}</option>
                                @endforeach
                            </select>

                            <div class="col-md-6">
                                <input id="numDoc" type="number"
                                    class="form-control @error('numDoc') is-invalid @enderror" name="numDoc"
                                    value="{{ old('numDoc') }}" required autocomplete="numDoc"
                                    placeholder="{{__('Document number')}}" autofocus>

                                @error('docType')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                @error('numDoc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-1"></div>
                            <select name="department" class="col-md-3 col-form-label custom-select @error('department')
                                is-invalid @enderror" id="department">
                                <option selected disabled value="0">{{ __('Department') }}</option>
                                @foreach ($departments as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                            <div class="col-md-6">
                                <select name="city" class="col-form-label custom-select @error('city') is-invalid
                                    @enderror" id="city">
                                    <option selected disabled value="0">{{ __('City') }}</option>
                                </select>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address"
                                class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6"></div>
                            <div class="custom-control custom-checkbox col-md-6">
                                <input class="custom-control-input" type="checkbox" value="" id="checkCommerce"
                                    data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                <label class="custom-control-label" for="checkCommerce">
                                    {{ __('Commerce') }}
                                </label>
                            </div>
                        </div>

                        <div class="collapse" id="collapseExample">
                            <div class="form-group row">
                                <label for="nit" class="col-md-4 col-form-label text-md-right">{{ __('NIT') }}</label>

                                <div class="col-md-6">
                                    <input id="nit" type="text" class="form-control @error('nit') is-invalid @enderror"
                                        name="nit" value="{{ old('nit') }}" autocomplete="nit" autofocus>

                                    @error('nit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <select name="commerceType" class="col-md-3 col-form-label custom-select
                                    @error('commerceType') is-invalid @enderror" id="commerceType">
                                    <option selected disabled value="0">{{ __('Type commerce') }}</option>
                                    @foreach ($commerceType as $type)
                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>



                                <div class="col-md-6">
                                    <input id="commerceName" type="text" placeholder="{{ __('Commerce name') }}"
                                        class="form-control @error('commerceName') is-invalid @enderror"
                                        name="commerceName" value="{{ old('commerceName') }}"
                                        autocomplete="commerceName" autofocus>

                                    @error('commerceType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    @error('commerceName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror" rows="5"
                                        autocomplete="description" autofocus>{{ old('description') }}</textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6 offset-md-4 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
