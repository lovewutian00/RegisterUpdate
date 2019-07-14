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
                    @if($message = Session::get('Warning'))
                    <div class='alert alert-warning'>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                <div class="box">
                    
                    <h3>Assigning to Supervisor : {{$spv->Spv_Name}} ({{$spv->Spv_Id}})</h3>
                
                    <hr>
                    
                     <p style="font-size: 20px;">Student List</p>                    
                     
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('spvAssign.submit') }}">
                            {{ csrf_field() }}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><center>Student ID</center></th>
                                    <td><center>Name</center></td>
                                    <td><center>Email</center></td>
                                    <th><center>Status</center></th>                                 
                                </tr>
                            </thead>
                            
                            @foreach($records as $data)
                            <tbody>
                                <tr>
                                    @if($data[1] == 'Unassign')
                                    <th><center><input class="form-check-input" type="checkbox" id="students[]" name="students[]" value="{{$data[0]->Stud_Id}}"></center></th>
                                    @else
                                    <th><center><input class="form-check-input" type="checkbox" disabled="true"></center></th>
                                    @endif
                                    <th><center>{{$data[0]->Stud_Id}}</center></th>
                                    <td>{{$data[0]->LastName}} {{$data[0]->FirstName}}</td>
                                    <td>{{$data[0]->Email}}</td>
                                    @if($data[1] == 'Unassign')
                                    <td class="alert alert-danger"><center>{{$data[1]}}</center></td>     
                                    @else
                                    <td class="alert alert-success"><center>{{$data[1]}}</center></td>     
                                    @endif
                                </tr>
                            </tbody>
                            @endforeach                            
                        </table>
                            <input type="hidden" value="{{$spv->Spv_Id}}" id="Spv_Id" name="Spv_Id">
                            <center><button type="submit" class="btn btn-primary">Assign</button>   </center>    
                        </form>        
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>

@endsection