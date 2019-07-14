@extends('layouts.layout1')

@section('content')
<div class="container">
    <div class="box">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <hr>
                <div class="card-body">
                    <form method="POST" action="{{ route('student_login.submit') }}" aria-label="{{ __('Login') }}">
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
                        <div class="row">
                            @if ($errors->any())
                            <div class="col-md-12 form-group">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            <hr>
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            <label for="Stud_Id" class="col-sm-4 col-form-label text-md-right">{{ __('Student Id') }}</label>
                            <div class="col-md-6">
                                <input id="Stud_Id" type="text" class="form-control{{ $errors->has('Stud_Id') ? ' is-invalid' : '' }}" size="10" placeholder="12XXX12345" name="Stud_Id" value="{{ old('Stud_Id') }}" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
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
