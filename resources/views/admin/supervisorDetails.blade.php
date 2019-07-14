@extends('layouts.layout1')

@section ('content')    
<div id="all">
    <div id="content">
        <div class="container">

            <br>        

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
                
                <div class="col-md-12">        
                    @if($message = Session::get('Success'))
                    <div class='alert alert-success'>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                <div class="box">

                    <form action="/admin/supervisorDetails/{{$spvid->Spv_Id}}" method="GET">
                        {{ csrf_field() }}
                        <div class="active-4 mb-4">
                        <input class="form-control" type="text" placeholder="Search Student Name" name="studName">
                        </div>
                    </form>
                
                    <hr>
                    
                     <p style="font-size: 20px;">Student(s) of {{$spvid->Spv_Name}} ({{$spvid->Spv_Id}}) : {{$count->count()}}/10</p>                    
                     
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('remove.submit') }}">
                             {{ csrf_field() }}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><center>Student ID</center></th>
                                    <td><center>Name</center></td>
                                    <td><center>Email</center></td>
                                    <td><center>CGPA</center></td>
                                    <th><center>Action</center></th>                                  
                                </tr>
                            </thead>
                            @if($records->count() != 0)
                            @foreach($records as $data)
                            <tbody>
                                <tr>
                                    <th><center>{{$data[0]->Stud_Id}}</center></th>
                                    <td>{{$data[0]->LastName}} {{$data[0]->FirstName}}</td>
                                    <td>{{$data[0]->Email}}</td>
                                    <td><center>{{$data[0]->CGPA}}</center></td>
                                    <td>
                                       <a href="/admin/studentDetails/{{$data[0]->Stud_Id}}" class="btn btn-info">View</a> 
                                       <button type="submit" class="btn btn-danger" value="{{$data[0]->Stud_Id}}" id="Stud_Id" name="Stud_Id"
                                               onclick="return confirm('Are you sure you want to unassign {{$data[0]->LastName}} {{$data[0]->FirstName}}?')">Unassign</button> 
                                    </td>    
                                  
                                </tr>
                            </tbody>
                            @endforeach
                            @else
                             <tbody>
                                <tr>
                                    <td colspan="5"><center><h4>No result found.</h4></center></td>
                                </tr>
                            </tbody>
                            @endif
                        </table>
                        </form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection

