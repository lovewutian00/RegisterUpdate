@extends('layouts.layout1')

@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section('content')

<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box">
                    <h3><i class="fa fa-folder-open-o"></i> Report</h3>
                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <center>
                                <h4>
                                    <strong>
                                        Tunku Abdul Rahman University College
                                        <br />
                                        Faculty of Computing and Information Technology
                                        <br />
                                        Industrial Training Progress Report
                                        <br />
                                    </strong>
                                </h4>
                                <h4><strong>Activity Log</strong></h4>
                            </center>
                            <br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name of Trainee:</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" class="form-control" disabled value="{{$report->Trainee_Name}}" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Name of Company:</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>{{$cmp->Cmp_Name}}</label>  
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label> Month / Year:</label>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>{{$sch->Sch_Date->format('m / Y')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Week</th>
                                                <th>Projects / Activities</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><input type="text" class="form-control" disabled value="{{$report->Activity_1}}"/></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><input type="text" class="form-control" disabled value="{{$report->Activity_2}}"/></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><input type="text" class="form-control" disabled value="{{$report->Activity_3}}"/></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td><input type="text" class="form-control" disabled value="{{$report->Activity_4}}"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Suggestions / Comments / Additional information (if any): </label>
                            <textarea class="form-control" style="resize: none; height: 100px;" disabled>{{$report->Additional_Info}}</textarea>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <hr />
                            @if($leave->count() < 6)
                            <h4>Leave Application/Leave Taken</h4>
                            <label>1. Details of the leave taken for the reporting month:</label>
                            <div class="table-responsive" >
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Date (DD/MM/YYYY)</th>
                                            <th>Full day / half day</th>
                                            <th>Reason for taking leave</th>
                                            <th>Approved by company? (Y/N)</th>
                                            <th>Informed to your UC supervisor? (Y?N)</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($leave->count() > 0)
                                        @foreach($leave as $data)
                                        <tr>
                                            <td>{{$data->Leave_Date->format('d/m/Y')}}</td>
                                            <td>
                                                {{$data->Leave_Day}}
                                            </td>
                                            <td>{{$data->Leave_Reason}}</td>
                                            <td>
                                                {{$data->Cmp_Approve}}
                                            </td>
                                            <td>
                                                {{$data->Spv_Approve}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr><td>No leave taken</td></tr>
                                        @endif
                                    </tbody>
                                </table>  
                            </div>
                            @endif
                            <hr />
                            <label>2. Total number of days taken since the internship commencement date: </label>
                            <b>{{$leave->count()}}</b>
                            <br />
                            <label>(<strong>Important</strong>: Please be reminded that the total number of allowable leave taken shall not exceed 6 days for the whole internship period.)</label>
                            <br />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <br />
                            <div class="col-md-4">
                                <h4>Date:  {{Carbon\Carbon::parse($report->created_at)->format('d/m/Y')}} </h4>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <center>
                            <a href="/supervisor/reportList/{{$report->Stud_Id}}" class="btn btn-info">Back</a> &nbsp;
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
