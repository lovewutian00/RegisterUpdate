@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            
            <br />
            <br />
            @include('company._companySidebar')
            TODO

            <div class="col-md-9">
                <div class="box">
                    <form method="post" action="{{route('evaluation.submitEva')}}"  >
                         {{csrf_field()}}
                            {{ method_field('patch') }}
                        <div class="pull-right">
                            <img hidden src="~/img/face.png" class="img-circle" style="width:100px">
                        </div>
                        <br />
                        <br />
                         @if ($errors->any())
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <hr>
                            </div>
                        </div>
                    </div>
                    @endif
                        <h3><i class="fa fa-check-square-o"></i> Evalution: {{$student->LastName}} {{$student->FirstName}}</h3>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Criteria</th>
                                                <th>Poor</th>
                                                <th>Average</th>
                                                <th>Good</th>
                                                <th>Excellent</th>
                                                <th rowspan="2">Score</th>
                                            </tr>
                                            <tr>
                                                <th>0 or 1</th>
                                                <th>2 or 3</th>
                                                <th>4 or 5</th>
                                                <th> 6 </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1. Technical knowledge</td>
                                                <td>Has little/no technical knowledge</td>
                                                <td>Has sufficient technical knowledge</td>
                                                <td>Has good technical knowledge</td>
                                                <td>Has excellent technical knowledge</td>
                                                <td><div class="form-control">{{ ($ce->Q1)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>2.Dependability</td>
                                                <td>Needs close supervision and always unreliable in completing job</td>
                                                <td>Needs a lot of supervision and sometimes unreliable in completing job</td>
                                                <td>Needs some supervision and  reliable in completing job</td>
                                                <td>No need supervision and always reliable in completing job</td>
                                                <td><div class="form-control">{{ ($ce->Q2)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>3. Initiative</td>
                                                <td>Not willing and proactive in learning and working</td>
                                                <td>Acceptable willing and proactive in learning and working</td>
                                                <td>Usually willing and proactive in learning and working</td>
                                                <td>Always willing and proactive in learning and working</td>
                                                <td><div class="form-control">{{ ($ce->Q3)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>4. Commitment</td>
                                                <td>Not committed in work assigned</td>
                                                <td>Acceptable commitment in work assigned</td>
                                                <td>Committed in work assigned</td>
                                                <td>Very committed in work assigned</td>
                                                <td><div class="form-control">{{ ($ce->Q4)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>5. Quality of Work</td>
                                                <td>Performance does not meet the minimum requirement</td>
                                                <td>Performance generally meets the minimum requirement</td>
                                                <td>Performance consistently exceeds the minimum req.</td>
                                                <td>Performance far exceeds the minimum requirement</td>
                                                <td><div class="form-control">{{ ($ce->Q5)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>6. Working relationship with staffs</td>
                                                <td>Rarely tactful, poor teamwork and not cooperative</td>
                                                <td>Occasionally tactful, fair teamwork and cooperative</td>
                                                <td>Usually tactful, good teamwork and cooperative</td>
                                                <td>Always tactful, excellent teamwork and cooperative</td>
                                                <td><div class="form-control">{{ ($ce->Q6)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>7. Discipline</td>
                                                <td>Rarely follow company rules and procedures</td>
                                                <td>Sometimes do not follow company rules and proc.</td>
                                                <td>Usually follow company rules and procedures</td>
                                                <td>Always follow company rules and procedures</td>
                                                <td><div class="form-control">{{ ($ce->Q7)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>8.Communication Skills</td>
                                                <td>Poor oral and written skills</td>
                                                <td>Fair oral and written skills</td>
                                                <td>Good oral and written skills</td>
                                                <td>Excellent oral and written skills</td>
                                                <td><div class="form-control">{{ ($ce->Q8)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>9. Punctuality</td>
                                                <td>Frequently late for work or meeting</td>
                                                <td>Occasionally late for work or meeting</td>
                                                <td>Usually come on time for work or meeting</td>
                                                <td>Always come on time for work or meeting</td>
                                                <td><div class<="form-control">{{ ($ce->Q9)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td>10.Attendance</td>
                                                <td>Poor attendance at work or meeting</td>
                                                <td>Fair attendance at work or meeting</td>
                                                <td>Good attendance at work or meeting</td>
                                                <td>Excellent attendance at work or meeting</td>
                                                <td><div class="form-control">{{ ($ce->Q10)}}</div></td>
                                            </tr>
                                            <tr>
                                                <td style="border:0px"></td>
                                                <td style="border:0px"></td>
                                                <td style="border:0px"></td>
                                                <td style="border:0px"></td>
                                                <td>Total Score:(Max 60 Marks)</td>
                                                <td><div class="form-control">{{ ($student->Cmp_Eva)}}</div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <h4>11. Student's Attendance</h4>
                                <p>Number of days absent <strong> with</strong> permission <input readonly="" name="withPermission" type="text" maxlength="3" value="{{$ce->WithPermission}}" />. (Please put ‘0’ if no leave taken.)</p>
                                <p>Number of days absent <strong> without</strong> permission <input readonly="" name="withoutPermission" type="text" maxlength="3" value="{{$ce->WithoutPermission}}"/>. (Please put ‘0’ if no leave taken.)</p>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <h4>12. If you were to give an overall grade for this student trainee, what grade would you give?</h4>
                                <h5>(Choose one)</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td colspan="2">Excellent</td>
                                                <td colspan="3">Good</td>
                                                <td colspan="2">Average</td>
                                                <td>Poor</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input name="grade" type="radio" value="A" <?php if($ce->Grade=="A"){?> checked="true" <?php } ?> /> A</td>
                                                <td><input name="grade" type="radio" value="A-" <?php if($ce->Grade=="A-"){?> checked="true" <?php } ?>/> A-</td>
                                                <td><input name="grade" type="radio" value="B+" <?php if($ce->Grade=="B+"){?> checked="true" <?php } ?>/> B+</td>
                                                <td><input name="grade"type="radio" value="B" <?php if($ce->Grade=="B"){?> checked="true" <?php } ?>/> B</td>
                                                <td><input name="grade"type="radio" value="B-" <?php if($ce->Grade=="B-"){?> checked="true" <?php } ?>/> B-</td>
                                                <td><input name="grade"type="radio" value="C+" <?php if($ce->Grade=="C+"){?> checked="true" <?php } ?> /> C+</td>
                                                <td><input name="grade" type="radio" value="C" <?php if($ce->Grade=="C"){?> checked="true" <?php } ?>/> C</td>
                                                <td><input name="grade" type="radio" value="F" <?php if($ce->Grade=="F"){?> checked="true" <?php } ?>/> F</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <h4>13. Other comments about this student trainee :</h4>
                                <h5>(E.g. strengths, weaknesses, performance, attitude, attendance, etc)</h5>
                                <b><div class<="form-control">{{ ($ce->Comment)}}</div></b>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <h4>14. Programme of Training:</h4>
                                <span>Nature of work, Department, Period.</span>
                                <b><div class<="form-control">{{ ($ce->ProgOfTraining)}}</div></b>
                            </div>
                        </div>
                        <hr />
                        <br />
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Name</label>
                                    <div class="col-sm-10">
                                        <div class="form-control">{{ ($ce->SupervisorName)}}</div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Date</label>
                                    <div class="col-sm-10">
                                        <div class="form-control">{{ ($ce->Date)}}</div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Designation</label>
                                    <div class="col-sm-10">
                                        <div class="form-control">{{ ($ce->Designation)}}</div>
                                    </div>
                                </div>
                            </div>
                            <br />   
                            
                        </div>
                        <hr />
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    Thank you for taking your time to complete this evaluation form.
                                    The University College (UC) wishes to record its earnest appreciation to your organization
                                    for participating in this training programme. We hope that your organisation will
                                    continue such collaboration in our next training programme. We would
                                    like to thank you in advance.
                                </p>
                                <strong>
                                    Please scan a softcopy and email it to the respective UC Supervisor first before
                                    returning the completed evaluation form (hardcopy) in a sealed envelope to the following address:
                                </strong>
                                <hr />
                                <span>Ms. Lim Yee Mei</span>
                                <br /><span>Associate Dean</span>
                                <br /><span>Department of Information and Communication Technology</span>
                                <br /><span>Faculty of Computing and Information Technology</span>
                                <br /><span>Tunku Abdul Rahman University College</span>
                                <br /><span>Jalan Genting Klang</span>
                                <br /><span>53300 Kuala Lumpur.</span>
                            </div>
                        </div>
                        <button type="submit" name="action" value="Submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                        <hr />
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
<script>
    function findTotal(){
    var arr = document.getElementsByName('score[]');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
    }
    
</script>