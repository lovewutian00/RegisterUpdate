@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">

                    <div class="panel-heading">
                        <h3 class="panel-title">Dashboard</h3>
                    </div>

                    <div class="panel-body">

                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="#"><i class="fa fa-bell"></i> Notification</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-mortar-board"></i> Institute Profile</a>
                            </li>
                            <li class="active">
                                <a href="#"><i class="fa fa-user"></i> Education</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-list"></i> Skill</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bell"></i> Language</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-heart"></i> Additional Info</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-briefcase"></i> Setting</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box">
                    <div class="pull-right">
                        @if($student->Avatar=='default.jpg')
                            @if($student->Gender=='Male')
                                <img src="{{ asset('storage/default-male.png')}}" style="width:150px;height:150px;" />
                            @elseif($student->Gender=='Female')
                                <img src="{{ asset('storage/default-female.png')}}" style="width:150px;height:150px;" />
                            @else
                                <img src="{{ asset('storage/default.png')}}" style="width:150px;height:150px;" />
                            @endif
                        @else
                            <img src="{{ asset('storage/Avatars/Students/'.$student->Avatar)}}" style="width:180px;height:150px;" />
                        @endif
                    </div>
                    <h1>My Account</h1>
                        <h3>Personal Details</h3>
                        <hr />
                    <form method="POST" action="{{ route('student_profile.submit') }}" aria-label="{{ __('student_profile.submit') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="FirstName">First Name</label>
                                    <input type="text" class="form-control{{ $errors->has('FirstName') ? ' is-invalid' : '' }}" 
                                           id="FirstName" name="FirstName" value="{{ old('FirstName')?old('FirstName'):$student->FirstName }}" maxlength="30" required autofocus />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="LastName">Last Name</label>
                                    <input type="text" class="form-control{{ $errors->has('LastName') ? ' is-invalid' : '' }}" 
                                           id="LastName" name="LastName" value="{{ old('LastName')?old('LastName'):$student->LastName }}" maxlength="30" required />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Avatar"> Profile Image[ Update ]</label>
                                    <input type="file" name="Image" id="Image"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="IcNo">Identity Card / Passport</label>
                                    <div class="well well-sm">{{ $student->IcNo }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="DOB">Date of Birth</label>
                                    <input type="date" class="form-control{{ $errors->has('DOB') ? ' is-invalid' : '' }}" 
                                           id="DOB" name="DOB" value="{{ old('DOB')?old('DOB'):$student->DOB }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="well well-sm">{{ $student->Gender }}</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="Race">Race</label>
                                    <select class="form-control m-bot15" id="Race" name="Race" title="Race" required>
                                        <option value="Chinese"> Chinese</option>
                                        <option value="Malay"> Malay</option>
                                        <option value="India"> Indian</option>
                                        <option value="Other"> Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ContactNo">Contact Number</label>
                                    <input type="text" class="form-control{{ $errors->has('ContactNo') ? ' is-invalid' : '' }}" 
                                           id="ContactNo" name="ContactNo" value="{{ old('ContactNo')?old('ContactNo'):$student->ContactNo }}" maxlength="15" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Email">Collage Email</label>
                                    <input type="text" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" maxlength="100" 
                                           id="Email" name="Email" value="{{ old('Email')?old('Email'):$student->Email }}" placeholder="user@example.com" required />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Email">Collage Email</label>
                                    <input type="text" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" maxlength="100" 
                                           id="Email" name="Email" value="{{ old('Email')?old('Email'):$student->Email }}" placeholder="user@example.com" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Address_1">Address 1</label>
                                    <input type="text" class="form-control{{ $errors->has('Address_1') ? ' is-invalid' : '' }}" 
                                           id="Address_1" name="Address_1" value="{{ old('Address_1')?old('Address_1'):$student->Address_1 }}" maxlength="50"  />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="Address_2">Address 2</label>
                                    <input type="text" class="form-control{{ $errors->has('Address_2') ? ' is-invalid' : '' }}" 
                                           id="Address_1" name="Address_2" value="{{ old('Address_2')?old('Address_2'):$student->Address_2 }}" maxlength="50"  />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control{{ $errors->has('City') ? ' is-invalid' : '' }}" 
                                           id="City" name="City" value="{{ old('City')?old('City'):$student->City }}" maxlength="20"  />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="Postcode">Postcode</label>
                                    <input type="text" class="form-control{{ $errors->has('Postcode') ? ' is-invalid' : '' }}" 
                                           id="Postcode" name="Postcode" value="{{ old('Postcode')?old('Postcode'):$student->Postcode }}" maxlength="10" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control{{ $errors->has('State') ? ' is-invalid' : '' }}" 
                                           id="State" name="State" value="{{ old('State')?old('State'):$student->State }}" maxlength="30" />
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control{{ $errors->has('Country') ? ' is-invalid' : '' }}" 
                                           id="Country" name="Country" value="{{ old('Country')?old('Country'):$student->Country }}" maxlength="30" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Save</button>
                                        <a href="/student/profile" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Return</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection