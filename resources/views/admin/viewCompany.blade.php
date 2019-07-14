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
                        <h3 class="panel-title">User: Company</h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li>
                                <a href="~/Company/Profile"><i class="fa fa-briefcase"></i> Company Profile</a>
                            </li>
                            <li>
                                <a href="~/Company/InternList"><i class="fa fa-user-plus"></i> Internship Incharge </a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bell"> Guildeliness</i> </a>
                            </li>
                            <li>
                                <a href="#"><span class="fa fa-unlock-alt"></span> Privacy Setting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="form-group">
                    @if ($Cmp->is_activated == 1)
                        <div class="alert alert-danger">
                            <label>Your company are not fit to requirement for our student. Please update the documentation.</label>
                        </div>
                    @endif
                </div>
                <div class="box">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $Cmp->Cmp_Name).'/'.$Cmp->Avatar)}}" style="width:70px;height:50px;" />
                        </div>
                        <br />
                        <h3>Company Profile</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Company Name:</label>
                                    <div class="{{ $Cmp->Cmp_Name?'well well-sm':'well well-md' }}">{{ $Cmp->Cmp_Name }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Company Code</label>
                                    <div class="well well-md"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Contact Person</label>
                                    <div class="{{ $Cmp->PICName?'well well-sm':'well well-md' }}">{{ $Cmp->PICName }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Position</label>
                                    <div class="{{ $Cmp->PICPosition?'well well-sm':'well well-md' }}">{{ $Cmp->PICPosition }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Contact No</label>
                                    <div class="{{ $Cmp->ContactNo?'well well-sm':'well well-md' }}">{{ $Cmp->ContactNo }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="{{ $Cmp->Email?'well well-sm':'well well-md' }}">{{ $Cmp->Email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Document</label>
                                    <div><button class="btn btn-default"><a href="/admin/viewDocument/{{ $Cmp->Cmp_Id }}">View</a></button></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="btn btn-default form-control" style="color:{{ $Cmp->is_activated!=1?$Cmp->is_activated==2?'Blue':'Green':'Red' }}">{{ $Cmp->is_activated!=1?$Cmp->is_activated==2?'Pending':'Approve':'Reject' }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address</label>
                                    <div class="{{ $Cmp->Address?'well well-sm':'well well-md' }}">{{ $Cmp->Address }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Town</label>
                                    <div class="{{ $Cmp->Town?'well well-sm':'well well-md' }}">{{ $Cmp->Town }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <div class="well well-md"></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>State</label>
                                    <div class="{{ $Cmp->State?'well well-sm':'well well-md' }}">{{ $Cmp->State }}</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <div class="{{ $Cmp->Country?'well well-sm':'well well-md' }}">{{ $Cmp->Country }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <hr>
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
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button class="btn btn-success form-control"><a style="color:white" href="/admin/approve/{{ $Cmp->Cmp_Id  }}">Approve</a></button>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('reject', $Cmp->Cmp_Id ) }}" aria-label="{{ __('reject') }}">
                            @csrf
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger form-control">Reject</button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea id="remark" name="remark" placeholder="Reject Reason" class="form-control "></textarea>
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