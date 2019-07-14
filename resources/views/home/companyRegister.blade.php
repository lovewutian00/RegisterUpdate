@extends('layouts.layout1')

@section ('content')

<br /><br /><br />
<div id="all">
    <div id="content">
        <div class="container">

            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box">
                    <form method="POST" action="{{ route('_register.submit') }}" aria-label="{{ __('Register.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <h1>New account</h1>
                    <p class="lead">Company Registration</p>
                    <p class="text-muted">Student registration please click <a href="/register">here</a>.</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="PICName">Contact Person Name</label>
                                <input type="text" id="PICName" name="PICName" value="{{ old('PICName')}}" class="form-control" maxlength="30" />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="ContactNo">Contact Number</label>
                                <input type="text" id="ContactNo" name="ContactNo" value="{{ old('ContactNo')}}"  class="form-control" maxlength="12" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Cmp_Name">Company Name</label>
                                <input type="text" id="Cmp_Name" name="Cmp_Name" value="{{ old('Cmp_Name')}}" class="form-control" maxlength="30" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" id="Email" name="Email" class="form-control" value="{{ old('Email')}}" maxlength="30" placeholder="user@example.com" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="Password" class="form-control{{ $errors->has('Password') ? ' is-invalid' : '' }}" 
                                       id="Password" name="Password" maxlength="20" value="{{ old('Password')}}"  required />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="password-confirm">Retype Password</label>
                                <input type="password" id="Password_confirmation" class="form-control" name="Password_confirmation" maxlength="20" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-6 col-md-6">
                            <label for="Avatar">Company Logo</label>
                            <input type="file" name="Avatar" id="Avatar" required/>
                            </div>
                        <div class="col-sm-6 col-md-6">
                            <label for="Document">Document</label>
                            <input type="file" name="Document[]" id="Document[]" multiple required/>
                            </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
