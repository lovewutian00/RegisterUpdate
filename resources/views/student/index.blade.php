@extends ('layouts.layout1')
    
@section('header')
<style>
    #detail{
        margin-left:100px;
    }
    .program{
        font-family:Arial, Helvetica, sans-serif;
        font-size: 14px;
    }
    .center{
        text-align: center;
    }
</style>
@endsection
    
@section('content')
<div class="all">
    <div class="content">
        <div class='container'>
            <div class="search-form">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                            <b>{{ session()->get('message') }}</b>
                            </div>
                        @endif
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
                    </div>
            <br />
            <br />
            @include('student._student_home_sidebar')
            <div class="col-md-9">
                <div class="box">
                    <div class="pull-left" style="margin-right:10px">
                        @if($studDetail->Avatar=='default.jpg')
                            @if($studDetail->Gender=='Male')
                                <img src="{{ asset('storage/default-male.png')}}" style="width:150px;height:150px;" />
                            @elseif($studDetail->Gender=='Female')
                                <img src="{{ asset('storage/default-female.png')}}" style="width:150px;height:150px;" />
                            @else
                                <img src="{{ asset('storage/default.png')}}" style="width:150px;height:150px;" />
                            @endif
                        @else
                            <img src="{{ asset('storage/Avatars/Students/'.$studDetail->Avatar)}}" style="width:180px;height:150px;" />
                        @endif
                    </div>
                    
                    <div class='pull-right'>
                        @if(count($chk_company))
                            <a href="{{route('cmpProfile')}}" class="btn  btn-default">My Company</a>
                        @endif
                        @if(count($chk_supervisor))
                            <a href="{{route('spvProfile')}}" class="btn  btn-default">My Supervisor</a>
                        @endif
                    </div>
                    
                    <div id="detail" class='container'>
                        <p style="font-size: 24px;">{{ $studDetail->LastName }} {{ $studDetail->FirstName }}</p>
                        <p class='program'>{{$programDetail->ProgramName}} ({{ $programDetail->Program_Code }})</p>
                        <p class='program'>{{$facultyDetail->FacultyName}} ({{$facultyDetail->Faculty_Code}})</p>
                    </div>
                    
                </div>
            </div>
            <div class="cold-md-3"></div>
                
            <div class='col-md-9'>
                <div class="box">
                    <h3>Recommendations</h3>
                    @if(count($priority1))
                    @foreach($priority1 as $result)
                        
                    <div class="box">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $result->Company->Cmp_Name ).'/'.$result->Company->Avatar)}}" style="width:200px;height:150px;" />
                        </div>
                        <p style="font-size: 25px;">{{ $result->Title }}</p>
                        <p style="font-size: 18px;">{{ $result->Company->Cmp_Name }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-usd"></i> {{ $result->MaxAllowance }}| <i class="fa fa-map-marker"></i> {{ $result->Location }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($result->PostDT)->diffForHumans() }}</p>
                        <a href="{{ route('jobDetails',['id'=>$result->Job_Id]) }}" class="btn  btn-default">View</a>
                    </div>
                    @endforeach
                    @endif
                        
                    @if(count($priority2))
                    @foreach($priority2 as $result)
                        
                    <div class="box">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $result->Company->Cmp_Name ).'/'.$result->Company->Avatar)}}" style="width:200px;height:150px;" />
                        </div>
                        <p style="font-size: 25px;">{{ $result->Title }}</p>
                        <p style="font-size: 18px;">{{ $result->Company->Cmp_Name }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-usd"></i> {{ $result->MaxAllowance }}| <i class="fa fa-map-marker"></i> {{ $result->Location }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($result->PostDT)->diffForHumans() }}</p>
                        <a href="{{ route('jobDetails',['id'=>$result->Job_Id]) }}" class="btn  btn-default">View</a>
                    </div>
                        
                    @endforeach
                    @endif
                        
                    @if(count($priority3))
                    @foreach($priority3 as $result)
                        
                    <div class="box">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $result->Company->Cmp_Name ).'/'.$result->Company->Avatar)}}" style="width:200px;height:150px;" />
                        </div>
                        <p style="font-size: 25px;">{{ $result->Title }}</p>
                        <p style="font-size: 18px;">{{ $result->Company->Cmp_Name }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-usd"></i> {{ $result->MaxAllowance }}| <i class="fa fa-map-marker"></i> {{ $result->Location }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($result->PostDT)->diffForHumans() }}</p>
                        <a href="{{ route('jobDetails',['id'=>$result->Job_Id]) }}" class="btn  btn-default">View</a>
                    </div>
                    @endforeach
                    @endif
                        
                    @if(count($priority4))
                    @foreach($priority4 as $result)
                        
                    <div class="box">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $result->Company->Cmp_Name ).'/'.$result->Company->Avatar)}}" style="width:200px;height:150px;" />
                        </div>
                        <p style="font-size: 25px;">{{ $result->Title }}</p>
                        <p style="font-size: 18px;">{{ $result->Company->Cmp_Name }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-usd"></i> {{ $result->Allowance }}| <i class="fa fa-map-marker"></i> {{ $result->Location }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($result->PostDT)->diffForHumans() }}</p>
                        <a href="{{ route('jobDetails',['id'=>$result->Job_Id]) }}" class="btn  btn-default">View</a>
                    </div>
                    @endforeach
                    @endif
                        
                    @if(count($priority5))
                    @foreach($priority5 as $result)
                        
                    <div class="box">
                        <div class="pull-right">
                            <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $result->Company->Cmp_Name ).'/'.$result->Company->Avatar)}}" style="width:200px;height:150px;" />
                        </div>
                        <p style="font-size: 25px;">{{ $result->Title }}</p>
                        <p style="font-size: 18px;">{{ $result->Company->Cmp_Name }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-usd"></i> {{ $result->MaxAllowance }}| <i class="fa fa-map-marker"></i> {{ $result->Location }}</p>
                        <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($result->PostDT)->diffForHumans() }}</p>
                        <a href="{{ route('jobDetails',['id'=>$result->Job_Id]) }}" class="btn  btn-default">View</a>
                    </div>
                    @endforeach
                    @endif
                    @if(!count($priority1) && !count($priority2)&& !count($priority3) && !count($priority4) && !count($priority5))
                    <div class="box center">
                        <h4>No recommendation yet?</h4>
                        <p>Update your preferences will help you discover relevant opportunities</p>
                        <a href="{{ route('preference') }}" class="btn  btn-default">Update Preference</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection