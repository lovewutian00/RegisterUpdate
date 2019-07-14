@extends('layouts.layout1')

@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section('content')

<div id="all">
    <div id="content">
        <div class="container">
            @if($errors->any())               
            <div class="alert alert-danger"  id="{{ ($errors->any())? "error": "noerror" }}">  
                @foreach($errors->all() as $error)
                <ul>
                    <li>{{$error}}</li>
                </ul>
                @endforeach          
            </div>
            @endif
            <br />
            <br />
           @include('company._companySidebar')
            <div class="col-md-9">
                <div class="box">
                    <form method="POST" action="/company/updateViewReport/{{$report->Report_Id}}">
                        <input type='hidden' name='schid' value='{{$report->Sch_Id}}'>
                        {{csrf_field()}}
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
                                    <input readonly type="text" class="form-control" name='Trainee_Name' value="{{$report->Trainee_Name}}"/>
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
                                    <label>{{Carbon\Carbon::parse($report->Sch_Date)->format('m/Y')}}</label>
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
                                                    <td><input readonly type="text" class="form-control" name='Activity_1' value="{{$report->Activity_1}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><input readonly type="text" class="form-control" name='Activity_2' value="{{$report->Activity_2}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><input readonly type="text" class="form-control" name='Activity_3' value="{{$report->Activity_3}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><input readonly type="text" class="form-control" name='Activity_4' value="{{$report->Activity_4}}"/></td>
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
                                <textarea readonly class="form-control" style="resize: none; height: 100px;" name='Additional_Info' >{{$report->Additional_Info}}</textarea>
                            </div>
                        </div>
                        
                        @if($leave->count()!=0)
                        <div class="row">
                            <div class="col-md-12">
                                <hr />
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
                                            @foreach($leave as $data)
                                            <tr>
                                                <td><div class="form-control">{{ Carbon\Carbon::parse($data->Leave_Date)->format('d/m/Y')}}</div></td>
                                                <td>
                                                   <div class="form-control">{{ ($data->Leave_Day)}}</div>
                                                </td>
                                                <td><div class="form-control">{{ ($data->Leave_Reason)}}</div></td>
                                                <td>
                                                    <div class="form-control">{{ ($data->Cmp_Approve)}}</div>
                                                </td>
                                                <td>
                                                    <div class="form-control">{{ ($data->Spv_Approve)}}</div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>  
                                </div>
                                
                                <i>* Please leave it empty if no leave is taken during the month</i>
                                <hr />
                                <label>2. Total number of days taken since the internship commencement date: </label>
                                <b> {{App\Leave::where('Report_Id',$report->Report_Id)->count()}}</b>
                                <br />
                                <label>(<strong>Important</strong>: Please be reminded that the total number of allowable leave taken shall not exceed 6 days for the whole internship period.)</label>
                                <br />
                                <input type='checkbox' name='Sign'>
                                <label><strong>I hereby declare that the information given above is correct.</strong></label>
                            </div>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                            <hr />
                            <i>* Please leave it empty if no leave is taken during the month</i>
                            <hr />
                            <label>2. Total number of days taken since the internship commencement date: </label>
                            <b> 0</b>
                            <br />
                            <label>(<strong>Important</strong>: Please be reminded that the total number of allowable leave taken shall not exceed 6 days for the whole internship period.)</label>
                            <br />
                            <input checked disabled type='checkbox' name='Sign'>
                            <label><strong>I hereby declare that the information given above is correct.</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <div class="col-md-4">
                                    <h4>Date:  <?php echo $report->created_at?> </h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <hr />
                                <div class="col-sm-12">
                                    <label class="label-control">Endorsement by the Company’s Supervisor:</label>
                                    <br />
                                    <label class="label-control">The above is a true record of activities taken by the trainee in the captioned week.</label>
                                    <br /><br />

                                </div>
                                <div class='row'>
                                <div class="col-md-12">
                                    <div class='col-md-5'></div>
                                    @if($report->Cmp_Status == "Uncheck")
                                        <div class='col-md-7'><button type='submit' class="btn btn-info">Approve</button></div>
                                    @else
                                    <div class='col-md-7'><button type="button"onclick="window.location.href='/company/viewReportList/{{$report->Stud_Id}}'" name="action" class="btn btn-info">Back</button></div>
                                    @endif
                                </div>
                            </div>
                            </div>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
