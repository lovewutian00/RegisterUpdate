@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            <div class="col-md-1">             
            </div>
            
            <div class="col-md-10">
                <div class="box">
                    <form method="POST" action="{{route('evaluation.submit')}}">
                        {{ csrf_field() }}
                        
                        <h3><i class="fa fa-check-square-o"></i> Evaluation: {{$stud->LastName}} {{$stud->FirstName}}</h3>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <div style="font-weight: bold;">A.&nbsp;&nbsp;Progressive Reports</div>
                                        <div style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of receipt of progress reports</div>
                                        <div style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1st : {{Carbon\Carbon::parse($repDate[0])->format('d/m/Y')}} &nbsp;&nbsp;&nbsp; 
                                            2nd : {{Carbon\Carbon::parse($repDate[1])->format('d/m/Y')}} &nbsp;&nbsp;&nbsp; 3rd : {{Carbon\Carbon::parse($repDate[2])->format('d/m/Y')}} 
                                            &nbsp;&nbsp;&nbsp; 4th : {{Carbon\Carbon::parse($repDate[3])->format('d/m/Y')}}</div>
                                          
                                        <br>
                                        <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Criteria</th>
                                                <th><center>Poor</center></th>
                                                <th><center>Average</center></th>
                                                <th><center>Good</center></th>
                                                <th><center>Excellent</center></th>
                                                <th rowspan="2"><center>Score</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" style="vertical-align : middle;">Submission of progressive reports</td>
                                                <th><center>0</center></th>
                                                <th><center>1 - 2</center></th>
                                                <th><center>3 - 4</center></th>
                                                <th><center>5</center></th>
                                                @if($eva == null)
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input onblur="findTotal()" type="text" name="score[]" id="score1" class="form-control" maxlength="1" /></td>
                                                @else
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input type="text" disabled class="form-control" value="{{$eva->A1}}" /></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><center>Always late</center></td>
                                                <td><center>Once or twice on time</center></td>
                                                <td><center>Three or four times on time</center></td>
                                                <td><center>Always on time</center></td>
                                                
                                            </tr>
                                            <tr>
                                                <td rowspan="2" style="vertical-align : middle;">Content of progressive reports</td>
                                                <th><center>1 - 2</center></th>
                                                <th><center>3 - 4</center></th>
                                                <th><center>5 - 6</center></th>
                                                <th><center>7</center></th>
                                                @if($eva == null)
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input onblur="findTotal()" type="text" name="score[]" id="score2" class="form-control" maxlength="1" /></td>
                                                @else
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input type="text" disabled class="form-control" value="{{$eva->A2}}" /></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><center>Description of work done is too brief/insufficient</center></td>
                                                <td><center>Description of work done is average</center></td>
                                                <td><center>Description of work done is adequate</center></td>
                                                <td><center>Description of work done is excellent</center></td>                                       
                                            </tr>
                                             <tr>
                                                <td rowspan="2" style="vertical-align : middle;">Written presentation of progressive reports</td>
                                                <th><center>1 - 2</center></th>
                                                <th><center>3 - 4</center></th>
                                                <th><center>5 - 6</center></th>
                                                <th><center>7</center></th>
                                                @if($eva == null)
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input onblur="findTotal()" type="text" name="score[]" id="score3" class="form-control" maxlength="1" /></td>
                                                @else
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input type="text" disabled class="form-control" value="{{$eva->A3}}" /></td>
                                                @endif
                                            </tr>
                                            <tr>                                               
                                                <td><center>Poorly structured, difficult to read and many grammatical and spelling mistakes</center></td>
                                                <td><center>Averagely structured, fairly easy to read with some grammatical and spelling mistakes</center></td>
                                                <td><center>Good structure, easy to read with minor grammatical and spelling mistakes</center></td>
                                                <td><center>Excellent structure, easy to read and excellent grammar and spelling</center></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr />
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <div style="font-weight: bold;">B.&nbsp;&nbsp;Final Report</div>
                                        <div style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date of receipt of final report : 12/12/2018</div>
                                    
                                        <br>
                                    <thead>
                                            <tr>
                                                <th rowspan="2" style="vertical-align : middle;text-align:center;">Criteria</th>
                                                <th><center>Poor</center></th>
                                                <th><center>Average</center></th>
                                                <th><center>Good</center></th>
                                                <th><center>Excellent</center></th>
                                                <th rowspan="2"><center>Score</center></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td rowspan="2" style="vertical-align : middle;">Submission of final report</td>
                                                <th><center>0</center></th>
                                                <th><center>1</center></th>
                                                <th><center>2</center></th>
                                                <th><center>3</center></th>
                                                @if($eva == null)
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input onblur="findTotal()" type="text" name="score[]" id="score4" class="form-control" maxlength="1" /></td>
                                                @else
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input type="text" disabled class="form-control" value="{{$eva->B1}}" /></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><center>Late for more than 3 days</center></td>
                                                <td><center>Late for 2 days</center></td>
                                                <td><center>Late for 1 day</center></td>
                                                <td><center>On time</center></td>           
                                            </tr>
                                            <tr>
                                                <td rowspan="2" style="vertical-align : middle;">Content of final report</td>
                                                <th><center>1 - 3</center></th>
                                                <th><center>4 - 7</center></th>
                                                <th><center>8 - 10</center></th>
                                                <th><center>11 - 12</center></th>
                                                @if($eva == null)
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input onblur="findTotal()" type="text" name="score[]" id="score5" class="form-control" maxlength="2" /></td>
                                                @else
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input type="text" disabled class="form-control" value="{{$eva->B2}}" /></td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td><center>Final report is too brief, poorly written and/or lack of explanation</center></td>
                                                <td><center>Final report is averagely written with some explanation</center></td>
                                                <td><center>Final report length is adequate and overall content is good with adequate explanation</center></td>
                                                <td><center>Final report length is reasonable and overall content is well written and explained</center></td>                                       
                                            </tr>
                                             <tr>
                                                <td rowspan="2" style="vertical-align : middle;">Written presentation of final reports</td>
                                                <th><center>1</center></th>
                                                <th><center>2 - 3</center></th>
                                                <th><center>4 - 5</center></th>
                                                <th><center>6</center></th>
                                                @if($eva == null)
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input onblur="findTotal()" type="text" name="score[]" id="score6" class="form-control" maxlength="1" /></td>
                                                @else
                                                <td rowspan="2" style="vertical-align : middle;text-align:center;"><input type="text" disabled class="form-control" value="{{$eva->B3}}" /></td>
                                                @endif
                                            </tr>
                                            <tr>                                               
                                                <td><center>Poorly structured, difficult to read and many grammatical and spelling mistakes</center></td>
                                                <td><center>Averagely structured, fairly easy to read with some grammatical and spelling mistakes</center></td>
                                                <td><center>Good structure, easy to read with minor grammatical and spelling mistakes</center></td>
                                                <td><center>Excellent structure, easy to read and excellent grammar and spelling</center></td>
                                            </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <hr />
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <div style="font-weight: bold;">C.&nbsp;&nbsp;Total Score</div>
                                   
                                        <tr>
                                            <td style="font-weight: bold;">By University College Supervisor (40 marks)</td>            
                                            @if($eva == null)
                                            <td class="col-md-1"><input type="text" name="total" id="total" class="form-control" disabled maxlength="2" /></td>
                                            @else
                                             <td class="col-md-1"><input type="text" class="form-control" disabled value="{{$eva->Total}}" /></td>
                                            @endif
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <h4> Comments (if any)</h4>
                                @if($eva == null)
                                <textarea id="comment" name="comment" class="form-control" style="resize: none; height: 100px;"></textarea>
                                @else
                                <textarea class="form-control" disabled style="resize: none; height: 100px;">{{$eva->Comment}}</textarea>
                                @endif
                            </div>
                        </div>
                        <hr />                      
                        <br />
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-sm-8">
                                    <label class="control-label col-sm-4">UC Supervisor Name : </label>
                                    {{$spv->Spv_Name}}
                                    </div>
                                    <div class="col-sm-4">
                                    <label class="control-label col-sm-4">Date : </label>
                                    {{Carbon\Carbon::now()->format('d/m/Y')}}   
                                    </div>
                            </div>
                            </div>
                            <br />
                            
                        </div>                   
                    </div>
                        <input type="hidden" value="{{$spv->Spv_Id}}" id="Spv_Id" name="Spv_Id">
                        <input type="hidden" value="{{$studid}}" id="Stud_Id" name="Stud_Id">
                        
                        <div>
                        <center>
                            @if($eva == null)
                            <a href="/supervisor/reportList/{{$studid}}" class="btn btn-info">Back</a> &nbsp;
                            <button type="submit" class="btn btn-primary">Submit</button>
                            @else
                            <a href="/supervisor/reportList/{{$studid}}" class="btn btn-info">Back</a> &nbsp;
                            @endif
                        </center>
                        </div>
                        
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
    
    <script type="text/javascript">
    function findTotal(){
    var arr = document.getElementsByName('score[]');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
    }

    //max value
    setInputFilter(document.getElementById("score1"), function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 5); });
    setInputFilter(document.getElementById("score2"), function(value) {
    return /^\d*$/.test(value) && (value === "" || (parseInt(value) >= 1 && parseInt(value) <= 7)); });
    setInputFilter(document.getElementById("score3"), function(value) {
    return /^\d*$/.test(value) && (value === "" || (parseInt(value) >= 1 && parseInt(value) <= 7)); });
    setInputFilter(document.getElementById("score4"), function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 3); });
    setInputFilter(document.getElementById("score5"), function(value) {
    return /^\d*$/.test(value) && (value === "" || (parseInt(value) >= 1 && parseInt(value) <= 12)); });
    setInputFilter(document.getElementById("score6"), function(value) {
    return /^\d*$/.test(value) && (value === "" || (parseInt(value) >= 1 && parseInt(value) <= 6)); });

    //only int
    for (var i = 1; i < 6; i++) {
    var sc = "score" + i;
    setInputFilter(document.getElementById(sc), function(value) {
    return /^-?\d*$/.test(value); });
    }
     
    function setInputFilter(textbox, inputFilter) {
      ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
          if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
          } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
          }
        });
      });
    }

    </script>
@endsection