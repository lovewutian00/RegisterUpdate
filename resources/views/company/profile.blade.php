@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')

            <div class="col-md-9">
                <div class="form-group">
                    @if ($user->is_activated == 1)
                        <div class="alert alert-danger">
                            <label>Your company are not fit to requirement for our student. Please update the documentation.</label>
                            <hr>
                            <label>Remark: {{ $user->Remark?$user->Remark:None }}</label>
                        </div>
                    @endif
                </div>
                <div class="box">
                    <form method="post">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $user->Cmp_Name).'/'.$user->Avatar)}}" style="width:180px;height:150px;" />
                        </div>
                        <br />
                        <h3>Company Profile</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Company Name:</label>
                                    <div class="{{ $user->Cmp_Name?'well well-sm':'well well-md' }}">{{ $user->Cmp_Name }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <div class="{{ $user->PICName?'well well-sm':'well well-md' }}">{{ $user->PICName }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Position</label>
                                    <div class="{{ $user->PICPosition?'well well-sm':'well well-md' }}">{{ $user->PICPosition }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Contact No</label>
                                    <div class="{{ $user->ContactNo?'well well-sm':'well well-md' }}">{{ $user->ContactNo }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="{{ $user->Email?'well well-sm':'well well-md' }}">{{ $user->Email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Document</label>
                                    <div><a href="/company/viewDocument" class="form-control btn btn-info">View</a></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="btn btn-default form-control" style="color:{{ $user->is_activated!=1?$user->is_activated==2?'Blue':'Green':'Red' }}">{{ $user->is_activated!=1?$user->is_activated==2?'Pending':'Approve':'Reject' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="{{ $user->Address?'well well-sm':'well well-md' }}">{{ $user->Address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Town</label>
                                    <div class="{{ $user->Town?'well well-sm':'well well-md' }}">{{ $user->Town }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="{{ $user->State?'well well-sm':'well well-md' }}">{{ $user->State }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="{{ $user->Country?'well well-sm':'well well-md' }}">{{ $user->Country }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <a href="/company/update_profile" class="btn btn-success btn-sm"><i class="fa fa-save"></i>Update</a>
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