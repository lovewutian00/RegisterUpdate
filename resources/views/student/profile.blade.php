@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
           @include('student.resume._resume_sidebar')

            <div class="col-md-9">
                <div class="form-group">
                @if($message = Session::get('Success'))
                <div class="form-group">
                    <div class='alert alert-success'>
                        <p>{{ $message }}</p>
                    </div>
                </div>
                @endif
                @if($message = Session::get('Warning'))
                <div class="form-group">
                    <div class='alert alert-warning'>
                        <p>{{ $message }}</p>
                    </div>
                </div>
                @endif
                <div class="box">
                    <div class="pull-right">
                        <div class="pull-right">
                        @if($studDetail->Avatar=='default.jpg')
                            @if($studDetail->Gender=='Male')
                                <img src="{{ asset('storage/default-male.png')}}" style="width:150px;height:150px;" />
                            @elseif($studDetail->Gender=='Female')
                                <img src="{{ asset('storage/default-female.png')}}" style="width:150px;height:150px;" />
                            @else
                                <img src="{{ asset('storage/default.png')}}" style="width:150px;height:150px;" />
                            @endif
                        @else
                            <img src="{{ asset('storage/Avatars/Students/'.$studDetail->Avatar)}}" style="width:180px;height:150px;" />
                        @endif
                    </div>
                    </div>
                    <h1>My Account</h1>
                        <h3>Personal Details</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <div class="{{ $studDetail->FirstName?'well well-sm':'well well-md' }}">{{ $studDetail->FirstName }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <div class="{{ $studDetail->LastName?'well well-sm':'well well-md' }}">{{ $studDetail->LastName }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>IC / Passport</label>
                                    <div class="{{ $studDetail->IcNo?'well well-sm':'well well-md' }}">{{ $studDetail->IcNo }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div class="{{ $studDetail->DOB?'well well-sm':'well well-md' }}">{{ $studDetail->DOB }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="{{ $studDetail->Gender?'well well-sm':'well well-md' }}">{{ $studDetail->Gender }}</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Race</label>
                                    <div class="{{ $studDetail->Race?'well well-sm':'well well-md' }}">{{ $studDetail->Race }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <div class="{{ $studDetail->ContactNo?'well well-sm':'well well-md' }}">{{ $studDetail->ContactNo }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>College Email</label>
                                    <div class="{{ $studDetail->Email?'well well-sm':'well well-md' }}">{{ $studDetail->Email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Personal Email</label>
                                    <div class="{{ $studDetail->Email?'well well-sm':'well well-md' }}">{{ $studDetail->Email }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <div class="{{ $studDetail->Address_1?'well well-sm':'well well-md' }}">{{ $studDetail->Address_1 }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <div class="{{ $studDetail->Address_2?'well well-sm':'well well-md' }}">{{ $studDetail->Address_2 }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <div class="{{ $studDetail->City?'well well-sm':'well well-md' }}">{{ $studDetail->City }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <div class="{{ $studDetail->Postcode?'well well-sm':'well well-md' }}">{{ $studDetail->Postcode }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="{{ $studDetail->State?'well well-sm':'well well-md' }}">{{ $studDetail->State }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="{{ $studDetail->Country?'well well-sm':'well well-md' }}">{{ $studDetail->Country }}</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="/student/update_profile" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Update</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection