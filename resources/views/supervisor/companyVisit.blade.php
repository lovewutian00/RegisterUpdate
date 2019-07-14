@extends('layouts.layout1')

@section ('content')    
<div id="all">
    <div id="content">
        <div class="container">
        
            <br>

            <div class="col-md-1"></div>
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
                    <p style="font-size: 20px;">Company Visit List</p>
                    
                    @if($records->count() != 0)
                        @foreach($records as $data)
                            <div class="box">
                                <span style="font-weight: bold;">{{$data[0][0]->Cmp_Name}}   </span>
                                
                                @if($data[2]->count() == 0)
                                <div class="pull-right">  
                                <a href="/supervisor/visitFeedback/{{$data[1][0]->Visit_Id}}" class="btn btn-success">Feedback</a>                 
                                </div>
                                @else
                                <div class="pull-right">  
                                <a href="/supervisor/visitFeedback/{{$data[1][0]->Visit_Id}}" class="btn btn-info">View / Edit</a>                                          
                                </div>
                                @endif
                                
                                <br>Title &emsp;&emsp;&emsp;: {{$data[1][0]->Title}}
                                <br>
                                Description : {{$data[1][0]->Desc}}                              
                                <br> <br>
                            <div>
                                <span>
                                    <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($data[1][0]->VisitDT)->diffForHumans()}} &emsp;&emsp; 
                                    <i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($data[1][0]->VisitDT)->format('d/m/Y, h:i a')}}
                                </span>
                                @foreach($data[2] as $d)
                                <span style="vertical-align: bottom" class="pull-right">
                                    <i class="fa fa-calendar-check-o"></i> submitted : {{Carbon\Carbon::parse($d->created_at)->format('d/m/Y, h:i a')}}
                                    <br>
                                    @if($d->updated_at != null)
                                    <i class="fa fa-calendar-check-o"></i> updated &nbsp;&nbsp; : {{Carbon\Carbon::parse($d->updated_at)->format('d/m/Y, h:i a')}}
                                    @else                                   
                                    @endif
                                </span>
                                @endforeach
                            </div>   
                            </div>                          
                        @endforeach
                    @else
                        <center><h4>No result found.</h4></center>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
 
@endsection