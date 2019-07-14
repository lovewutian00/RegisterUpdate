@extends('layouts.layout1')

@section('content')

<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')

            <div class="col-md-9">
                <div class="box">
                        <h3>Job Detail</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h4><strong>Job Title</strong></h4>
                                    <label class="form-control">{{$job->Title}}</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h4><strong>Qualification</strong></h4>
                                    <label class="form-control">{{$job->Qualification}}</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <h4><strong>Salary (RM)</strong></h4>
									<div class="form-control">
                                        <label>{{$job->MinAllowance}}</label>
                                        <span> - </span>
                                        <label>{{$job->MaxAllowance}}</label>
									</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h4><strong>Job Description</strong></h4>
                                    <label class="jumbotron jumbotron-fluid">{{$job->Descript}}</label>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h4><strong>Job Detail</strong></h4>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><strong>Working Location</strong></label>
                                    </br>
                                    <label class="form-control">{{$job->Location}}</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><strong>Processing Time</strong></label>
                                    </br>
                                    <label class="form-control">{{$job->ProcessTime}}</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><strong>Dress Code</strong></label>
                                    </br>
                                    <label class="form-control">{{$job->DressCode}}</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><strong>Benefits</strong></label>
                                    </br>
                                    <label class="form-control">{{$job->Benefits}}</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><strong>Working Days</strong></label>
                                    </br>
                                    <label class="form-control">{{$job->WorkingDays}}</label>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><strong>Working Hours</strong></label>
                                    </br>
                                    <label class="form-control">{{$job->WorkingHours}}</label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <a href="{{url('company/editPost/'.$job->Job_Id)}}" name="action" class="btn btn-primary"><i class="fa fa-save"></i> Edit</a>
                                <a href='#' name="action" class="btn btn-danger"><i class="fa fa-refresh"></i> Delete</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop