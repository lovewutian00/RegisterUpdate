@extends('layouts.layout1')
    
@section('content')
    
<div id="all">
    <div id="content">
        <div class="container">
                
            <div class="col-md-10 col-sm-push-1">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-3">
                             <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $company_detail->Cmp_Name ).'/'.$company_detail->Avatar)}}" style="width:180px;height:100px;" />
                        </div>
                        <div class="col-sm-6">
                            <label style='font-size:18px'>{{$job->Title}}</label>   <br />
                            <label style='font-size:14px'>{{ $company_detail->Cmp_Name }}</label>
                        </div>
                        <div class="col-sm-3">
                            @if($expected_salary != null)
                                @if($job->MaxAllowance != null)
                                    @if($job->MaxAllowance > $expected_salary->Expected_Salary)
                                        Above expected salary
                                    @elseif($job->MaxAllowance < $expected_salary->Expected_Salary)
                                        Below expected salary
                                    @elseif($job->MaxAllowance == $expected_salary->Expected_Salary)
                                        Around expected salary
                                    @endif
                                @elseif($job->MinAllowance != null)
                                    @if($job->MinAllowance > $expected_salary->Expected_Salary)
                                        Above expected salary
                                    @elseif($job->MinAllowance < $expected_salary->Expected_Salary)
                                        Below expected salary
                                    @elseif($job->MinAllowance == $expected_salary->Expected_Salary)
                                        Around expected salary
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                            
                <br />
                <div class="row">
                    <div class="col-sm-6" >
                        <div class='box'>
                            <div class="form-group">
                                <h4 style='font-weight: bold;'>JOB DESCRIPTION</h4>
                                <p style='font-weight: bold;'>{{$job->Title}}<br />
                                    @if($job->WorkingDays != null)
                                    Working Day: {{$job->WorkingDays}}<br />
                                    @endif
                                        
                                    @if($job->WorkingHours != null)
                                    Working Hours: {{$job->WorkingHours}}<br />
                                    @endif
                                        
                                    @if($job->MinAllowance != null || $job->MaxAllowance != null)
                                    @if($job->MinAllowance != null && $job->MaxAllowance != null)
                                    Allowance: RM {{$job->MinAllowance}} to RM {{$job->MaxAllowance}}<br />
                                    @elseif($job->MinAllowance != null)
                                    Allowance: RM {{$job->MinAllowance}}<br />
                                    @else
                                    Allowance: RM {{$job->MaxAllowance}}<br />
                                    @endif
                                    @endif
                                        
                                    Working Location: {{$job->Location}}<br />
                                </p>
                                        
                                <p style='font-size:13px'>{{$job->Descript}}</p>
                            </div>
                        </div>
                    </div>
                                
                                
                    <div class="row">
                    <div class="col-sm-6">
                        <div class='box'>
                            <div class="form-group">
                                <h4 style='font-weight: bold;'>RECRUITMENT FIRM SNAPSHOT</h4>
                                <p>
                                    @if($job->ProcessTime != null)
                                    <span style='font-weight: bold;'>Process Time:</span> {{$job->ProcessTime}}<br />
                                    @endif
                                        
                                    @if($job->Accomodation != null)
                                    @if($job->Accomodation == 1)
                                    <span style='font-weight: bold;'>Accomodation:</span> Yes<br />
                                    @else
                                    <span style='font-weight: bold;'>Accomodation:</span> No<br />
                                    @endif
                                    @endif
                                    
                                    @if($job->Benefits != null)
                                    <span style='font-weight: bold;'>Benefits:</span> {{$job->Benefits}}<br />
                                    @endif
                                    
                                    @if($job->DressCode != null)
                                    <span style='font-weight: bold;'>Dress Code:</span> {{$job->DressCode}}<br />
                                    @endif
                                    
                                </p>
                                
                                <hr>
                                <p>
                                    <span style='font-weight: bold;'>Contact No:</span> {{$company_detail->ContactNo}}<br />
                                    <span style='font-weight: bold;'>Address:</span> {{$company_detail->Address}}<br />
                                    <span style='font-weight: bold;'>Town:</span> {{$company_detail->Town}}<br />
                                    <span style='font-weight: bold;'>State:</span> {{$company_detail->State}}<br />
                                    <span style='font-weight: bold;'>Country:</span> {{$company_detail->Country}}<br />
                                </p>
                            </div>
                        </div>
                    </div>
                            
                            
                <div class="row">
                    <div class="col-sm-12 text-center">
                        @if(!count($chk_apply))
                        <form method='POST' action='/student/jobDetails' onsubmit="return apply_confirmation()">
                            {{csrf_field()}}
                            <input type='hidden' name=Job_Id value='{{$job->Job_Id}}'>
                            <input type='submit' class="btn  btn-default" value='Apply'><a href="{{ route('stud_Index') }}" class="btn  btn-default">Back</a> 
                        </form>
                        @else
                        <form method='POST' action='/student/jobDetails' onsubmit="return delete_confirmation()">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <input type='hidden' name=Job_Id value='{{$job->Job_Id}}'>
                            <input type='submit' class="btn  btn-default" value='Delete Application'><a href="{{ route('stud_Index') }}" class="btn  btn-default">Back</a> 
                        </form>
                        @endif
                    </div>
                </div>
                            
            </div>
        </div>
    </div>
</div>
    
@endsection
    
@section('footer')
<script>
    function apply_confirmation(){
        return confirm("Are you sure you want to apply this job?");
    } 
    function delete_confirmation(){
        return confirm('Are you sure you want to delete this application?');
    }
</script>
@endsection