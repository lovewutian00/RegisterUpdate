@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">

            <br />
            <div class="col-md-1"></div>
             @foreach($students as $data)
            <div class="col-md-10">
                 <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            <strong>What would you like to do?</strong>
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                    <div class="col-md-10 col-sm-10">
                                        <div class="products-number">                                     
                                            <a href="/supervisor/companyVisit" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Company Visit List</a>
                                            <a href="/supervisor/studentList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Student List</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div> 
                
                <div class="box">
                    <div class="pull-right">
                        @if($data->Avatar=='default.jpg')
                            @if($data->Gender=='Male')
                                <img src="{{ asset('storage/default-male.png')}}" style="width:150px;height:150px;" />
                            @elseif($data->Gender=='Female')
                                <img src="{{ asset('storage/default-female.png')}}" style="width:150px;height:150px;" />
                            @else
                                <img src="{{ asset('storage/default.png')}}" style="width:150px;height:150px;" />
                            @endif
                        @else
                            <img src="{{ asset('storage/Avatars/Students/'.$data->Avatar)}}" style="width:150px;height:150px;" />
                        @endif
                        <br>
                        <center><a href="/supervisor/reportList/{{$data->Stud_Id}}" class="btn btn-success">View Report</a></center>
                        <div><center>Report(s) : {{$reports}}/6</center></div>
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
                        
                        <div>
                            <br><br><br>
                        <center>
                            <a href="/supervisor/studentList" class="btn btn-info">Back</a> &nbsp;
                        </center>
                        </div>
                </div>
            </div>                            
             @endforeach
        </div>
    </div>
</div>

@endsection