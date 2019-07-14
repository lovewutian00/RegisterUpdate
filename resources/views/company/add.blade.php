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
                        <h3><i class="fa fa-check-square-o"></i> Internship Recruitment</h3>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <td width="30%">Applicant's Name</td>
                                                <td width="30%">Job</td>
                                                <td width="40%"></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($jobApplications as $jobApplication)
                                            <tr>
                                                <td>
                                                    <a href="{{url('company/studentResume/'.$jobApplication->Stud_Id)}}">{{$jobApplication->student->FirstName }} {{$jobApplication->student->LastName}}</a> 
                                                </td>
                                                <td>                                                    
                                                    <a href="{{url('company/jobPostDetail/'.$jobApplication->Job_Id)}}">{{$jobApplication->job_post->Title}} </a>                                                
                                                </td>
                                                <td>
                                                    <!--<a href="#" name="action" class="btn btn-info"><i class="fa fa-info"></i>Detail</a>-->
                                                    <a href="{{url('company/confirmStudentForm/'.$jobApplication->Stud_Id.'/'.$jobApplication->Job_Id)}}" name="action" class="btn btn-success" ><i class="fa fa-check"></i>Accept</a>
                                                    <a href="{{url('company/add/'.$jobApplication->Stud_Id.'/'.$jobApplication->Job_Id).'/reject'}}" name="action" class="btn btn-danger"><i class="fa fa-reply"></i>Reject</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr /> 
                    </form>
            </div>
        </div>
    </div>
</div>
</div>
@stop