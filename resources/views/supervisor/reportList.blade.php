@extends('layouts.layout1')

@section ('content')    
<div id="all">
    <div id="content">
        <div class="container">

            <br>        

            <div class="col-md-1">
            </div>

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
                
                <div class="col-md-12">                                      
                <div class="box">
                
                    <hr>
                    
                    <p style="font-size: 20px;">Report(s) of {{$student->LastName}} {{$student->FirstName}} : {{$reports->count()}}/6</p>     
                    @if($check != null)
                    <p style="font-size: 20px;">Evaluation Score : {{$check->Total}}/40</p>
                    @endif
                    
                    @if($reports->count() != 0)
                    @foreach($reports as $data)
                    <div class="box">
                        Report ID : {{$data->Report_Id}} 
                    <div class="pull-right">  
                        <a href="/supervisor/viewReport/{{$student->Stud_Id}}/{{$data->Report_Id}}" class="btn btn-info">View</a>                
                    </div>
                    <div><i class="fa fa-clock-o"> {{Carbon\Carbon::parse($data->created_at)->diffForHumans()}}, created on {{Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}</i></div> 
                    @if($data->updated_at != null)
                    <div><i class="fa fa-pencil-square-o"> last modified {{Carbon\Carbon::parse($data->updated_at)->diffForHumans()}}</i></div> 
                    @endif
                    </div>
                    @endforeach
                    @else
                    <center><h4>This student did not submit any report yet.</h4></center>
                    @endif
                    
                    @if($check == null)
                    @if($reports->count() >= 4)
                    <div><center> <a href="/supervisor/evaluation/{{$student->Stud_Id}}" class="btn btn-success">Evaluate</a> </center></div>
                    @else
                    <div><center> <button type="button" class="btn" disabled="true">Evaluate</button> </center></div>
                    @endif
                    @else
                     <div><center> <a href="/supervisor/evaluation/{{$student->Stud_Id}}" class="btn btn-info">View Evaluation</a> </center></div>
                    @endif
                </div>
            </div>
                
        </div>
    </div>
</div>
</div>
 
@endsection