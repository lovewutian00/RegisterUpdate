@extends('layouts.layout1')

@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    #leave th tr td:nth-child(1){
        width:10px;
    }
</style>
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
            @include('student._student_home_sidebar')
            <div class="col-md-9">
                <div class="box">
                    <form method="POST" action='/student/report'>
                        <input type='hidden' name='schid' value='{{$id->Sch_Id}}'>
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
                                    <input type="text" class="form-control" name='Trainee_Name' value="{{old('Trainee_Name')}}"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Name of Company:</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>{{$company_detail->Cmp_Name}}</label>  
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Month / Year:</label>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>{{$id->Sch_Date->format('m / Y')}}</label>
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
                                                    <td><input type="text" class="form-control" name='Activity_1' value="{{old('Activity_1')}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><input type="text" class="form-control" name='Activity_2' value="{{old('Activity_2')}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><input type="text" class="form-control" name='Activity_3' value="{{old('Activity_3')}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><input type="text" class="form-control" name='Activity_4' value="{{old('Activity_4')}}"/></td>
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
                                <textarea class="form-control" style="resize: none; height: 100px;" name='Additional_Info'>{{old('Additional_Info')}}</textarea>
                            </div>
                        </div>
                        
                        <div class="row">
                            
                            <div class="col-md-12">
                                <hr />
                                @if($leaves_count < 6)
                                <h4>Leave Application/Leave Taken</h4>
                                <label>1. Details of the leave taken for the reporting month:</label>
                                <div class="table-responsive" >
                                    <table class="table table-hover" id="leave">
                                        <thead>
                                            <tr>
                                                <th>Date (DD/MM/YYYY)</th>
                                                <th>Full day / half day</th>
                                                <th>Reason for taking leave</th>
                                                <th>Approved by company? (Y/N)</th>
                                                <th>Informed to your UC supervisor? (Y?N)</th>
                                            </tr>
                                        </thead>
                                        <tbody>      
                                            @for($i = 0; $i < (6-$leaves_count) ;$i++)
                                            <tr>
                                                <td><input type="date" class="form-control" name="Leave_Date[]" class="leave" value='{{ old('Leave_Date',date('d-m-Y'))[$i]}}'/></td>
                                                <td>
                                                    <select class="form-control" name="Leave_Day[]">
                                                        <option disabled="" selected="selected" value="">---</option>
                                                        <option>Half Day</option>
                                                        <option>Full Day</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" name="Leave_Reason[]" class="leave" value='{{old('Leave_Reason')[$i]}}'/></td>
                                                <td>
                                                    <select class="form-control" name="Cmp_Approve[]">
                                                        <option disabled="" selected="selected" value="">-Select-</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="Spv_Approve[]">
                                                        <option disabled="" selected="selected" value="">-Select-</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            @endfor
                                            
                                        </tbody>
                                    </table>  
                                </div>
                                @endif
                                <i>* Please leave it empty if no leave is taken during the month</i>
                                <hr />
                                <label>2. Total number of days taken since the internship commencement date: </label>
                                <b>{{$leaves_count}}</b>
                                <br />
                                <label>(<strong>Important</strong>: Please be reminded that the total number of allowable leave taken shall not exceed 6 days for the whole internship period.)</label>
                                <br />
                                <input type='checkbox' name='Sign' >
                                <label><strong>I hereby declare that the information given above is correct.</strong></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <br />
                                <div class="col-md-4">
                                    <h4>Date:  <?php echo now()->format('d-m-Y')?> </h4>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class="col-md-12">
                                <div class='col-md-5'></div>
                                <div class='col-md-7'><button type='submit'>Send</button></div>
                            </div>
                        </div>
                    </form>       
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
