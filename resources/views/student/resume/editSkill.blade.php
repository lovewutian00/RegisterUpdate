@extends('layouts.layout1')
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    #addForm{
        display:none;
    }
    #Add,#submit,#cancel{
        display:none;
    }
</style>
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
                    <form method="POST" action="/student/resume/skill">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" value="skill" name="attrb">
                        <h3>Skills</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12" id="skill_form">
                                <div class="form-group">
                                    @if(!count($skillDetail))
                                        <div class="col-xs-5"><label>No record.</label></div>
                                    @else
                                    @foreach($skillDetail as $skill)
                                    <div class="row">
                                        <input type='hidden' value='{{$skill->Skill_Id}}' name='Skill_Id[]'>
                                        <div class="col-xs-1"><label>Skills</label></div>
                                        <div class="col-xs-3"><input type="text" name="Skill[]" class="form-control" value="{{$skill->Skill}}" required></div>
                                        <div class="col-xs-2"><label>Proficiency</label></div>
                                        <div class="col-xs-3">
                                            <select class="form-control" name="Proficiency[]" required>
                                                <option {{ $skill->Proficiency == "Beginner" ? "selected" : ""}} >Beginner</option>
                                                <option {{ $skill->Proficiency == "Intermediate" ? "selected" : ""}} >Intermediate</option>
                                                <option {{ $skill->Proficiency == "Advanced" ? "selected" : ""}} >Advanced</option>
                                            </select>
                                        </div>
                                    </div>
                                    </br>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            </br></br>
                            <div class="col-sm-12"> 
                                <button type="submit" id="submit">Save</button>
                                <button type="button" id="cancel" onclick="window.location='{{ url("student/resume/skill") }}'">Cancel</button>
                            </div>
                        </div>
                    </form>
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
</script>
@endsection
