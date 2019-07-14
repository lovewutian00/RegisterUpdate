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
                    <hr>
                    
                    <p style="font-size: 20px;">Company List</p>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><center>Avatar</center></th>
                                    <th><center>Name</center></th>
                                    <th><center>Email</center></th>
                                    <th><center>Contacter</center></th>
                                    <th><center>ContactNo</center></th>
                                    <th><center>Details</center></th>
                                    <!--<th colspan="2"><center>Action</center></th>-->                                  
                                </tr>
                            </thead>
                            @if($Cmps->count() != 0)
                            @foreach($Cmps as $Cmp)
                            <tbody>
                                <tr>
                                    <td><img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $Cmp->Cmp_Name).'/'.$Cmp->Avatar)}}" style="width:70px;height:50px;" /></td>
                                    <td>{{ $Cmp->Cmp_Name }}</td>
                                    <td>{{ $Cmp->Email }}</td>
                                    <td>{{ $Cmp->PICName }}</td>
                                    <td>{{ $Cmp->ContactNo }}</td>
                                    <td><button class="btn btn-default"><a href="/admin/viewCompany/{{ $Cmp->Cmp_Id }}">View</a></button></td>                    
                                </tr>
                            </tbody>
                            @endforeach
                            @else
                             <tbody>
                                <tr>
                                    <td colspan="5"><center><h4>No company approving.</h4></center></td>
                                </tr>
                            </tbody>
                            @endif
                            
                        </table>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
 
@endsection