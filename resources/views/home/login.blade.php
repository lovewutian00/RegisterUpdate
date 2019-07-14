@extends('layouts.layout1')

@section ('content')
<div class="container"  style="min-height:500px;">
    <div class="box">
    <div class="row justify-content-center">
        <hr>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <hr>
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
                <div class="card-body col-md-12 col-sm-push-2">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <a href="student/login" class="btn btn-primary form-control">Student Login</a>
                            </div>
                        </div>
                    <div class="form-group row">
                            <div class="col-md-6">
                            <a href="company/login" class="btn btn-primary form-control">Company Login</a>
                            </div>
                        </div>
                    <div class="form-group row">
                            <div class="col-md-6">
                            <a href="supervisor/login" class="btn btn-primary form-control">Staff Login</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
