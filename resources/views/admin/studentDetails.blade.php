@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">

            <br />
            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-calendar-check-o"></i> Upcoming invite(s) <span class="badge pull-right">5</span></h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li><a href="#">Invite 1</a></li>
                            <li><a href="#">Invite 2</a></li>
                            <li><a href="#">Invite 3</a></li>
                            <li><a href="#">Invite 4</a></li>
                            <li><a href="#">Invite 5</a></li>
                        </ul>
                    </div>

                </div>
            </div>

             @foreach($students as $data)
            <div class="col-md-9">
                 <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            <strong>What would you like to do?</strong>
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                    <div class="col-md-10 col-sm-10">
                                        <div class="products-number">                                     
                                            <a href="/admin/supervisorList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Supervisor List</a>
                                            <a href="/admin/studentList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Student List</a>
                                            <a href="/admin/companyVisitList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Company List</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="box">
                    <div class="pull-right">
                        <img src="{{asset('img/face.png')}}" style="width:150px; height:150px" />
                        <br>
                        @if($check == 0)
                        <center><a href="/admin/studentAssign/{{$data->Stud_Id}}" class="btn btn-success">Assign Supervisor</a></center>
                        @else
                        <center><button class="btn" disabled>Supervisor Assigned</button></center>
                        @endif

                    </div>
                    
                        <h3>Personal Details</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <label class="form-control">{{$data->FirstName}}</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <label class="form-control">{{$data->LastName}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>IC / Passport</label>
                                    <label class="form-control">{{$data->IcNo}}</label>                                   
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                     <label class="form-control">{{$data->ContactNo}}</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Personal Email</label>
                                     <label class="form-control">{{$data->Email}}</label>
                                </div>
                            </div>
                        </div>


                        <h3>Educations</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Programme</label>
                                     <label class="form-control">{{$data->Program_Code}}</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label>Group</label>
                                     <label class="form-control">{{$data->Group}}</label>
                                </div>
                            </div>
                             <div class="col-sm-3">
                                <div class="form-group">
                                    <label>CGPA</label>
                                     <label class="form-control">{{$data->CGPA}}</label>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
</div>

@endsection