@extends('layouts.layout1')

@section ('content')

<br />
<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="box">
                    <form method="POST" action="{{ route('register.submit') }}" aria-label="{{ __('Register.submit') }}">
                    @csrf
                    <h1>New account</h1>
                    <p class="lead">Student Registration</p>
                    <p class="text-muted">Company registration please click <a href="/_register">here</a>.</p>
                    <hr>
                    @if ($errors->any())
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h4><strong>Personal Details</strong></h4>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="FirstName">First Name</label>
                                <input type="text" class="form-control{{ $errors->has('FirstName') ? ' is-invalid' : '' }}" 
                                       id="FirstName" name="FirstName" value="{{ old('FirstName') }}" maxlength="30" required autofocus />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="LastName">Last Name</label>
                                <input type="text" class="form-control{{ $errors->has('LastName') ? ' is-invalid' : '' }}" 
                                       id="LastName" name="LastName" value="{{ old('LastName') }}" maxlength="30" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="Stud_Id">Student ID</label>
                                <input type="text" class="form-control{{ $errors->has('Stud_Id') ? ' is-invalid' : '' }}" 
                                       id="Stud_Id" name="Stud_Id" maxlength="10" value="{{ old('Stud_Id') }}" placeholder="17XXX03456" required/>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="ContactNo">Contact</label>
                                <input type="text" class="form-control{{ $errors->has('ContactNo') ? ' is-invalid' : '' }}" 
                                       id="ContactNo" name="ContactNo" value="{{ old('ContactNo') }}" maxlength="12" placeholder="011-1234567" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="IcNo">Identity Number </label>
                                <input type="text" class="form-control{{ $errors->has('IcNo') ? ' is-invalid' : '' }}" size="14"
                                       id="IcNo" name="IcNo" placeholder="980101-00-1234" required />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="Gender">Gender</label>
                                <select class="form-control m-bot15" id="Gender" name="Gender" title="Gender" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="text" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" maxlength="30" 
                                       id="Email" name="Email" placeholder="user@example.com" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="Password" class="form-control{{ $errors->has('Password') ? ' is-invalid' : '' }}" 
                                       id="Password" name="Password" maxlength="20" required />
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="password-confirm">Retype Password</label>
                                <input type="password" id="Password_confirmation" class="form-control" name="Password_confirmation" maxlength="20" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr>
                                <h4><strong>Academic Details</strong></h4>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                            <label for="Program_Code">Program</label>
                            <select class="form-control m-bot15" id="Program_Code" name="Program_Code" title="Program" required>
                                @if($codes->count() > 0)
                                    @foreach($codes as $code)
                                       <option value="{{$code->Program_Code}}"> {{ $code->Program_Code }} - {{ $code->ProgramName }}</option>
                                    @endForeach
                                @else
                                   <option value=""> No Record Found</option>
                              @endif
                            </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="Group">Group</label>
                                <input type="number" class="form-control{{ $errors->has('Group') ? ' is-invalid' : '' }}"
                                       id="Group" name="Group" value="1" min="1" max="20" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="Month">Month - Year</label>
                                    <select class="form-control" id="Month" name="Month" title="Month Intake" required>
                                    <option value="1">January</option>
                                    <option value="3">March</option>
                                    <option value="5">May</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="Year"> </label>
                                    <select class="form-control" id="Year" name="Year" title="Year Intake" required>
                                    @if($years->count() > 0)
                                        @foreach($years as $year)
                                           <option value="{{$year}}"> {{ $year }} </option>
                                        @endForeach
                                    @else
                                       <option value=""> Error</option>
                                    @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Email">Year Intake</label>
                                <div class="form-group{{ $errors->has('Batch') ? ' is-invalid' : '' }}">
                                    <div class="col-sm-4"><input type="radio" id="Year_Intake" name="Year_Intake" value="1" checked> &nbsp; Year 1 </div>
                                    <div class="col-sm-4"><input type="radio" id="Year_Intake" name="Year_Intake" value="2"> &nbsp; Year 2 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr>
                        <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
