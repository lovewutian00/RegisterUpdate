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
            <div class="col-md-9">
                <div class="box">
                    <p style="font-size: 20px;">Skills 
                        <a href="{{ route('editSkill') }}" class="btn  btn-default">Edit</a>
                        <a href="{{ route('deleteSkillPage') }}" class="btn  btn-default">Delete</a>
                    </p>                  
                    <p style="font-size: 12px;"> <i>Maximum 8 skills*</i>          
                    <div class="box">
                        <table>
                            @if(count($skillBeginner))
                            <tr>
                                <td style="width: 100px;">
                                    Beginner
                                </td>
                                <td>
                                    @foreach($skillBeginner as $skill)                                 
                                    @if($loop->last)
                                    {{$skill->Skill}}
                                    @else
                                    {{$skill->Skill}},
                                    @endif
                                    @endforeach 
                                </td>
                            </tr>
                            @endif
                            @if(count($skillIntermediate))
                            <tr>
                                <td style="width: 100px;">
                                    Intermediate
                                </td>
                                <td>
                                    @foreach($skillIntermediate as $skill)                                 
                                    @if($loop->last)
                                    {{$skill->Skill}}
                                    @else
                                    {{$skill->Skill}},
                                    @endif
                                    @endforeach 
                                </td>
                            </tr>
                            @endif
                            @if(count($skillAdvanced))
                            <tr>
                                <td style="width: 100px;">
                                    Advanced
                                </td>
                                <td>
                                    @foreach($skillAdvanced as $skill)                                 
                                    @if($loop->last)
                                    {{$skill->Skill}}
                                    @else
                                    {{$skill->Skill}},
                                    @endif
                                    @endforeach 
                                </td>
                            </tr>
                            @endif
                        </table>
                        <form method="POST" action="/student/resume/skill">
                            {{csrf_field()}}
                            <input type="hidden" value="skill" name="attrb">
                            <hr />
                            <div class="row">
                                <div class="col-sm-12" id="skill_form">
                                    <div class="form-group">                                   
                                    </div>
                                </div>
                                <div class="col-sm-12"><button class="form-group" id="Add">Add</button></div>
                                </br></br>
                                <div class="col-sm-12"> 
                                    <button type="submit" id='submit'>Save</button>
                                    <button type="button" id='cancel' onclick="window.location='{{ url("student/resume/skill") }}'">Cancel</button>
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
            
            <div class="col-md-3"></div>
            
        </div>
    </div>
</div>

@endsection

@section('footer')
<script>
    window.onload = function () {
        $("#Add").show();
        $("#cancel").show();
        $("#submit").show();
        var count =1;
        var max = 0;
        var exist = {!! json_encode($skill_count,JSON_HEX_TAG) !!};
 
        $('#Add').click (function(e){
            e.preventDefault();
            if(max < (8-exist)){
                addForm();
            }
        });
        
        if(exist == 0){
            addForm();
        }    
    
        function addForm(){
         
            var fieldWrapper = $("<div class=\"row fieldwrapper\" id=\"field" + count + "\"/>");
            fieldWrapper.data("idx", count);
        
            var label_skill = $('<div class="col-xs-1"><label>Skills</label></div>');
            var input_skill = $('<div class="col-xs-3"><input type="text" name="Skill[]" class="form-control" required></div>');
            var label_proficiency = $('<div class="col-xs-2"><label>Proficiency</label></div>');
            var ddl_proficiency = $('<div class="col-xs-3">\n\
    <select class="form-control" name="Proficiency[]" required>\n\
<option disabled="disabled" value="" selected="selected">-Select-</option>\n\
<option>Beginner</option><option>Intermediate</option>\n\
<option>Advanced</option></select></div>');
        
                var removeButton = $('<div class="col-xs-1"><input type="button" class="remove" value="X" /></div></div></br></br>');
                removeButton.click(function() {
                    $(this).parent().remove();
                    --max;
                });
                fieldWrapper.append(label_skill);
                fieldWrapper.append(input_skill);
                fieldWrapper.append(label_proficiency);
                fieldWrapper.append(ddl_proficiency);    
                fieldWrapper.append(removeButton);
                $("#skill_form").append(fieldWrapper);
                ++max;
            }
        }
</script>
@endsection
