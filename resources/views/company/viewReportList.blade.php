@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')
            <div class="col-md-9">
                <div class="box">
                    <form method="post">
                        <br />
                        <div class="col-md-12">
                            <div class="search-form">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    <b>{{ session()->get('message') }}</b>
                                </div>
                            @endif
                            </div>
                        </div>      
                        <h3><i class="fa fa-users"></i> Report List</h3>
                        <hr />
                        
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="media">
                                <div class="media-right">
                                    </div>
                                
                                @foreach($rl as $data)
                                <div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="/company/info/{{$data->Stud_Id}}">{{$data->Trainee_Name}}</a></h4>
                                    @if($data->Cmp_Status != "Uncheck")
                                    <p>Status : Approved <br>{{$data->created_at}}</p>
                                   @else
                                   <p>Status : Not Approved <br> {{$data->created_at}}</p>
                                   @endif
                                   
                                    
                                </div>
                                <div class="media-right">
                                    <div class="btn-group-vertical">
                                        <button type="button" onclick="window.location.href='/company/viewReport/{{$data->Report_Id}}'" name="action" class="btn btn-info"><i class="fa fa-check-square-o"></i>View Report</button>
                                    </div>
                                    <div class="btn-group-horizontal">
                                        
                                    </div>
                                </div>
                                </div>
                                 @endforeach
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                               {{\App\Report::where('Stud_id','=',$sid)->count()}} Reports Found
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection