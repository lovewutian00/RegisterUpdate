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
                    <p style="font-size: 20px;">Languages 
                        <a href="{{route('editLanguage')}}" class="btn  btn-default">Edit</a>
                        <a href="{{route('deleteLanguagePage')}}" class="btn  btn-default">Delete</a>
                    </p>                  
                    <p style="font-size: 12px;"> <i>Maximum 5 languages*</i> </p>
                    <p style="font-size: 12px;">Proficiency Level: 1 - Poor, 5 - Excellent</p>
                    <div class="box">
                        @if(count($lgDetail))
                         <div class='box'>
                            <table>
                                @foreach($lgDetail as $lg)
                                @if($loop->first)
                                <tr>
                                    <td style='width:100px;'>Languages: </td>
                                    <td><b>{{$lg->Language}} :</b> Spoken: {{$lg->Spoken}} , Written: {{$lg->Written}}</td>
                                </tr>
                                @else
                                <tr>
                                    <td></td>
                                    <td><b>{{$lg->Language}} :</b> Spoken: {{$lg->Spoken}} , Written: {{$lg->Written}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </table>
                         </div>
                        @endif
                        <form method="POST" action="/student/resume/language">
                            {{csrf_field()}}
                            <input type="hidden" value="language" name="attrb">
                            <hr />
                            <div class="row">
                                <div class="col-sm-12" >
                                    <div class="form-group">
                                        <table>
                                            @if($lg_count < 5)
                                            <thead>
                                            <tr>
                                                <th style='width: 150px;'>Languages</th>
                                                <th style='width: 150px;'>Spoken</th>
                                                <th style='width: 150px;'>Written</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            @endif
                                            <tbody id="skill_form">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @if($lg_count < 5)
                                <div class="col-sm-12"><button class="form-group" id="Add">Add</button></div>
                                @endif
                                </br></br>
                                <div class="col-sm-12"> 
                                    <button type="submit" id='submit'>Save</button>
                                    <button type="button" id='cancel' onclick="window.location='{{ url("student/resume/language") }}'">Cancel</button>
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
        var exist = {!! json_encode($lg_count,JSON_HEX_TAG) !!};

        $('#Add').click (function(e){
            e.preventDefault();
            if(max < (5-exist)){
                addForm();
            }
        });
        
        if(exist == 0){
            addForm();
        }    
    
        function addForm(){   
            var fieldWrapper = $('<tr class="fieldwrapper" id="field' + count + '"/>');
            fieldWrapper.data("idx", count);
        
            var input_language = $('<td><select class="form-control" name="Languages[]" required>\n\
<option disabled="disabled" value="" selected="selected">-Select-</option>\n\
<option>Arabic</option>\n\
<option>Bahasa Indonesia</option>\n\
<option>Bahasa Malaysia</option>\n\
<option>English</option>\n\
<option>Filipino</option>\n\
<option>French</option>\n\
<option>German</option>\n\
<option>Hindi</option>\n\
<option>Japanese</option>\n\
<option>Korean</option>\n\
<option>Mandarin</option>\n\
<option>Spanish</option>\n\
<option>Tamil</option>\n\
<option>Thai</option>\n\
<option>Vietnamese</option>\n\
</select></td>');
            var input_spoken = $('<td><select class="form-control" name="Spoken[]" required>\n\
        <option disabled="disabled" value="" selected="selected">-Select-</option>\n\
<option>1</option>\n\
<option>2</option>\n\
<option>3</option>\n\
<option>4</option>\n\
<option>5</option></select></td>'
            );
     var input_written = $('<td><select class="form-control" name="Written[]" required>\n\
        <option disabled="disabled" value="" selected="selected">-Select-</option>\n\
<option>1</option>\n\
<option>2</option>\n\
<option>3</option>\n\
<option>4</option>\n\
<option>5</option></select></td>'
            );
    
        
                var removeButton = $('<td><input type="button" class="remove" value="X"/></td></tr>');
                removeButton.click(function() {
                    $(this).parent().remove();
                    --max;
                });
                fieldWrapper.append(input_language);  
                fieldWrapper.append(input_spoken); 
                fieldWrapper.append(input_written);
                fieldWrapper.append(removeButton);
                $("#skill_form").append(fieldWrapper);
                ++max;
            }
        }
</script>
@endsection
