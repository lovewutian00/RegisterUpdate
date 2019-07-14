@extends('layouts.layout1')

@section ('content')    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="all">
    <div id="content">
        <div class="container">

            <br>                 

            <div class="col-md-12">
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
                
                <div class="col-md-2">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-th-list">&nbsp;</i><a data-toggle="collapse" data-target="#batch">Batch</a><span class="badge pull-right">{{$batchs->count()}}</span></h3>
                    </div>

                    <div class="panel-body"> 
                        <div id="batch" class="collapse in">
                        <ul class="nav nav-pills nav-stacked category-menu">  
                            <li><a href="/supervisor/studentList"> Default</a></li>
                            @foreach($batchs->sortByDesc('Batch_Id') as $batch)
                            <li><a href="/supervisor/studentList?bid={{$batch->Batch_Id}}">> {{$batch->Name}} </a></li>
                            @endforeach
                        </ul>
                        </div>
                    </div>                   
                </div>
             </div>
                
                <div class="col-md-10">                                      
                <div class="box">
                    
                    @if(Request::get('bid') == null || Request::get('bid') == "")
                    <p style="font-size: 20px;">Student List (Batch : All)</p>       
                    @elseif(Request::get('bid') != null)
                    @foreach($batchs as $batch)
                    @if($batch->Batch_Id == Request::get('bid'))
                    <p style="font-size: 20px;">Student List (Batch : {{$batch->Name}})</p>     
                    @endif
                    @endforeach
                    @endif
                     
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><center>Student ID</center></th>
                                    <td><center>Name</center></td>
                                    <td><center>Email</center></td>
                                    <td><center>Report(s)</center></td>
                                    <th colspan="2"><center>Action</center></th>                                  
                                </tr>
                            </thead>
                            @if($records->count() != 0)
                            @foreach($records as $data)
                            <tbody>
                                <tr>
                                    <th><center>{{$data[0]->Stud_Id}}</center></th>
                                    <td>{{$data[0]->LastName}} {{$data[0]->FirstName}}</td>
                                    <td>{{$data[0]->Email}}</td>
                                    <td><center>{{$data[1]}}/6</center></td>
                                    <td><center>
                                        <a href="/supervisor/studentDetails/{{$data[0]->Stud_Id}}" class="btn btn-info">Profile</a>
                                        <a href="/supervisor/reportList/{{$data[0]->Stud_Id}}" class="btn btn-success">Report</a>
                                    </center></td>
                                   
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
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
</div>
@endsection