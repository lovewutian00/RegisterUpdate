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
                      @if($message = Session::get('Warning'))
                    <div class='alert alert-warning'>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                <div class="box">

                    <form action="/admin/studentAssign/{{$studid->Stud_Id}}" method="GET">
                        {{ csrf_field() }}
                        <div class="active-4 mb-4">
                        <input class="form-control" type="text" placeholder="Search Supervisor Name" name="spvName">
                        </div>
                    </form>
                
                    <hr>
                    
                     <p style="font-size: 20px;">Supervisor List</p>                    
                     
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('studAssign.submit') }}">
                            {{ csrf_field() }}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><center>Supervisor ID</center></th>
                                    <td><center>Name</center></td>
                                    <td><center>Email</center></td>
                                    <td><center>Contact</center></td>
                                    <td><center>Student(s)</center></td>  
                                    <th><center>Action</center></th>                                  
                                </tr>
                            </thead>
                            @if($records->count() != 0)
                            @foreach($records as $data)
                            <tbody>
                                <tr>
                                    <th><center>{{$data[0]->Spv_Id}}</center></th>
                                    <td>{{$data[0]->Spv_Name}}</td>
                                    <td>{{$data[0]->Email}}</td>
                                    <td><center>{{$data[0]->ContactNo}}</center></td>
                                    <td><center>{{$data[1]}}/10</center></td>
                                    <td>
                                    <center>
                                    @if($data[1] < 10)
                                    <button type="submit" class="btn btn-success" value="{{$data[0]->Spv_Id}}" id="Spv_Id" name="Spv_Id">Assign</button> 
                                    @else
                                    <button type="button" class="btn" disabled="true">Full</button>
                                    @endif
                                    </center>
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
                            <input type="hidden" value="{{$studid->Stud_Id}}" id="Stud_Id" name="Stud_Id">
                    <form>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
 
@endsection