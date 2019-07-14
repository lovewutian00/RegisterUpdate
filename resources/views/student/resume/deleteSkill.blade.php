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
                    <h3>Skills</h3>
                    <hr />
                    <div class="row">
                        <div class="col-sm-12" id="skill_form">
                            @if(count($skillDetail) == 0)
                            <div class="row">
                                <div class="col-xs-3"><label>No record.</label></div>
                            </div>
                            @else
                            @foreach($skillDetail as $skill)
                            <div class="row">
                                <div class="col-xs-1"><label>Skills:</label></div>
                                <div class="col-xs-7">{{$skill->Skill}} ( {{$skill->Proficiency}} )</div>                   
                                <form method="POST" action="/student/resume/skill/{{$skill->Skill_Id}}" onsubmit="return confirmation()">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <input type="hidden" name="attrb" value="skill">
                                    <button type="submit" class="button">DELETE</button>
                                </form>
                            </div>      
                            @endforeach
                            @endif
                        </div>
                        </br></br>
                        <div class="col-sm-12"> 
                            <button type="button" id="cancel" onclick="window.location='{{ url("student/resume/skill") }}'">Back</button>
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

