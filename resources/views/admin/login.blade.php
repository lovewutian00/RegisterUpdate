@extends('layouts.layout1')

@section('content')
<div class="container" style="min-height:500px;">
    <div class="box">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.submit') }}" aria-label="{{ __('Login') }}">
                        @csrf
                        <div class="form-group row">
                        @if($message = Session::get('Success'))
                        <div class='alert alert-success'>
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        @if($message = Session::get('Warning'))
                        <div class='alert alert-warning'>
                            <p>{{ $message }}</p>
                        </div>
                        @endif
                        </div>
                        <div class="form-group row">
                            <label for="staff_id" class="col-sm-4 col-form-label text-md-right">{{ __('Staff Id') }}</label>

                            <div class="col-md-6">
                                <input id="staff_id" type="" class="form-control{{ $errors->has('staff_id') ? ' is-invalid' : '' }}" name="staff_id" value="{{ old('staff_id') }}" required autofocus>

                                @if ($errors->has('staff_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                <a href="..\login_menu" class="btn btn-primary">Return</a>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
</div>
@endsection
