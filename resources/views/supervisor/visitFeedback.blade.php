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
                    <p style="font-size: 20px;">Company Visit Feedback</p>       
                    <hr>
                    <div>
                        <span style="font-weight: bold;">{{$cmp->Cmp_Name}}   </span>            
                        <span class="pull-right">
                            <i class="fa fa-clock-o"></i> {{Carbon\Carbon::parse($visit->VisitDT)->diffForHumans()}} &emsp;&emsp; 
                            <i class="fa fa-calendar"></i> {{Carbon\Carbon::parse($visit->VisitDT)->format('d/m/Y, h:i a')}}
                        </span>  
                        <br>
                        <span>Address &emsp; : {{$cmp->Address}}</span>
                        <br>
                        <span>&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{$cmp->Town}}</span>
                        <br>
                        <span>&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{$cmp->State}}</span>
                    </div>
                    <br><br>
                    <div>
                           <span>Title &emsp;&emsp;&emsp;: {{$visit->Title}}</span>
                           <br>
                           <span>Description : {{$visit->Desc}}</span>                          
                    </div>
                    <hr>
                    <form method="POST" action="{{route('visitFeedback.submitFB')}}">
                        {{ csrf_field() }}
                        
                    <span>Feedback &nbsp;&nbsp;: </span>
                    @if($feedback == null)
                    <textarea id="feedback" name="feedback" class="form-control" style="resize: none; height: 200px;"></textarea> 
                    <br><br>
                    <div>
                        <center>
                            <a href="/supervisor/companyVisit" class="btn btn-info">Back</a> &nbsp;
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </center>
                    </div>
                    @else
                    <textarea id="feedback" name="feedback" class="form-control" style="resize: none; height: 200px;">{{$feedback->Feedback}}</textarea> 
                    <br><br>
                    <div>
                        <center>
                            <a href="/supervisor/companyVisit" class="btn btn-info">Back</a> &nbsp;
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </center>
                    </div>
                    @endif
                    <br><br>
                    <input type="hidden" value="{{$visit->Visit_Id}}" id="Visit_Id" name="Visit_Id">
                    </form>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection