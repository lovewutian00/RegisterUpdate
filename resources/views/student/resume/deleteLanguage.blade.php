@extends('layouts.layout1')
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@endsection

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            
            @include('student.resume._resume_sidebar')   
            
            <div class="col-md-9" id="">
                <div class="box">     
                    <h3>Languages</h3>
                    <hr />
                    <div class="row">
                        <div class="col-sm-12" id="skill_form">
                            @if(count($lgDetail) == 0)
                            <div class="row">
                                <div class="col-xs-3"><label>No record.</label></div>
                            </div>
                            @else
                            
                            <div class="box">
                                <table>
                                    @foreach($lgDetail as $lg)
                                    <tr>
                                        <td style='width:100px;'>Languages: </td>
                                        <td style='width:300px;'><b>{{$lg->Language}} :</b> Spoken: {{$lg->Spoken}} , Written: {{$lg->Written}}</td>
                                        <td>
                                            <form method="POST" action="/student/resume/language/{{$lg->Language_Id}}" onsubmit="return confirmation()">
                                                {{method_field('DELETE')}}
                                                {{csrf_field()}}
                                                <input type="hidden" name="attrb" value="language">
                                                <button type="submit" class="button">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>   
                                    @endforeach                                    
                                </table>                               
                            </div>      
                            
                            @endif
                        </div>
                        </br></br>
                        <div class="col-sm-12"> 
                            <button type="button" id="cancel" onclick="window.location='{{ url("student/resume/language") }}'">Back</button>
                        </div>
                    </div>
                </div>
                @if($errors->any())               
                <div class="alert alert-danger"  id="{{ ($errors->any())? "error": "noerror" }}">  
                    @foreach($errors->all() as $error)
                    <ul>
                        <li>{{$error}}</li>
                    </ul>
                    @endforeach          
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    window.onload = function () {
        $("#cancel").show();
        $("#submit").show();
    }
    function confirmation(){
        return confirm("Do you want to delete this item?");
    } 
</script>
@endsection

