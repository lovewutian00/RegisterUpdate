@extends ('layouts.layout1')
    
@section('header')
<style>
    .status-perfect {
        background-color: #33CC33;
        height: 30px;
        width: 100px;
        padding-top: 8px;;
        padding-bottom: 0.5em;
        color: white;
        border-radius: 4px;
        font-size: 12px;
        text-align: center;
    }
        
        
    .status-reduced {
        background-color: #33CCFF;
        height: 30px;
        width: 100px;
        padding-top: 8px;;
        padding-bottom: 0.5em;
        color: white;
        border-radius: 4px;
        font-size: 12px;
        text-align: center;
    }
        
    .status-critical {
        background-color: #FF0000;
        height: 30px;
        width: 100px;
        padding-top: 8px;;
        padding-bottom: 0.5em;
        color: white;
        border-radius: 4px;
        font-size: 12px;
        text-align: center;;
    }
</style>
@endsection
    
@section('content')
<div class="all">
    <div class="content">
        <div class='container'>
            <br />
            <br />
                
            @include('student._student_home_sidebar')
            <div class="col-md-9">
                <div class="box">
                    <p style="font-size: 20px;">Applied Job</p>
                    @if(count($applied_job_details))
                    @foreach($applied_job_details as $job)
                    <div class="box">
                        <span style="font-weight: bold;">{{$job->Title}}</span>
                            
                        <div class="pull-right">  
                            <a href="{{route('jobDetails',['id' => $job->Job_Id]) }}" class="btn btn-info">View</a>                                          
                        </div>
                            
                            
                        <div>
                            <div>
                                <p style="font-size: 14px;">{{ $job->Company->Cmp_Name }}</p>
                                <p style="font-size: 12px;">
                                    @if($job->Allowance != null)
                                    <i class="glyphicon glyphicon-usd"></i> {{ $job->Allowance }}| 
                                    @endif
                                    @if($job->Location != null)
                                    <i class="fa fa-map-marker"></i> {{ $job->Location }}
                                    @endif
                                    
                                    @foreach($applied_jobs as $status)
                                        @if($status->Job_Id == $job->Job_Id)
                                            @if($status->Status == 'Pending')
                                                <div class='pull-right status-reduced'>Pending</div>
                                            @elseif($status->Status == 'Accepted')
                                            <form method='POST' action='/student/appliedJob'>
                                                {{csrf_field()}}
                                                <input type='hidden' name='Cmp_Id' value='{{$job->Cmp_Id}}'>
                                                <input type='hidden' name='Job_Id' value='{{$job->Job_Id}}'>
                                                <div><input type='submit' class="pull-right status-perfect btn  btn-default" value='Accept Offer'>               
                                                </div>
                                            </form>
                                            @elseif($status->Status == 'Rejected')
                                                <div class='pull-right status-critical'>Rejected</div>
                                             @endif
                                        @endif
                                    @endforeach 
                                    
                                </p>
                            </div>   
                            <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($job->PostDT)->diffForHumans() }}</p>
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