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
                    <form method="POST" action="/student/resume/language">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" value="language" name="attrb">
                        <h3>Languages</h3>
                        <p style="font-size: 12px;">Proficiency Level: 1 - Poor, 5 - Excellent</p>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12" id="skill_form">
                                <div class="form-group">
                                    <table>
                                        @if($lg_count != 0)
                                        <thead>
                                        <tr>
                                            <th style='width: 150px;'>Languages</th>
                                            <th style='width: 150px;'>Spoken</th>
                                            <th style='width: 150px;'>Written</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="skill_form">
                                            @foreach($lgDetail as $lg)
                                            <input type='hidden' name='Language_Id[]' value='{{$lg->Language_Id}}'>
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="Languages[]">
                                                        <option {{ $lg->Language == "Arabic" ? "selected" : ""}}>Arabic</option>
                                                        <option {{ $lg->Language == "Bahasa Indonesia" ? "selected" : ""}}>Bahasa Indonesia</option>
                                                        <option {{ $lg->Language == "Bahasa Malaysia" ? "selected" : ""}}>Bahasa Malaysia</option>
                                                        <option {{ $lg->Language == "English" ? "selected" : ""}}>English</option>
                                                        <option {{ $lg->Language == "Filipino" ? "selected" : ""}}>Filipino</option>
                                                        <option {{ $lg->Language == "French" ? "selected" : ""}}>French</option>
                                                        <option {{ $lg->Language == "German" ? "selected" : ""}}>German</option>
                                                        <option {{ $lg->Language == "Hindi" ? "selected" : ""}}>Hindi</option>
                                                        <option {{ $lg->Language == "Japanese" ? "selected" : ""}}>Japanese</option>
                                                        <option {{ $lg->Language == "Korean" ? "selected" : ""}}>Korean</option>
                                                        <option {{ $lg->Language == "Mandarin" ? "selected" : ""}}>Mandarin</option>
                                                        <option {{ $lg->Language == "Spanish" ? "selected" : ""}}>Spanish</option>
                                                        <option {{ $lg->Language == "Tamil" ? "selected" : ""}}>Tamil</option>
                                                        <option {{ $lg->Language == "Thai" ? "selected" : ""}}>Thai</option>
                                                        <option {{ $lg->Language == "Vietnamese" ? "selected" : ""}}>Vietnamese</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="Spoken[]">
                                                        <option {{ $lg->Spoken == "1" ? "selected" : ""}}>1</option>
                                                        <option {{ $lg->Spoken == "2" ? "selected" : ""}}>2</option>
                                                        <option {{ $lg->Spoken == "3" ? "selected" : ""}}>3</option>
                                                        <option {{ $lg->Spoken == "4" ? "selected" : ""}}>4</option>
                                                        <option {{ $lg->Spoken == "5" ? "selected" : ""}}>5</option>
                                                    </select>
                                                </td>
                                                <td><select class="form-control" name="Written[]">\n\
                                                        <option {{ $lg->Written == "1" ? "selected" : ""}}>1</option>
                                                        <option {{ $lg->Written == "2" ? "selected" : ""}}>2</option>
                                                        <option {{ $lg->Written == "3" ? "selected" : ""}}>3</option>
                                                        <option {{ $lg->Written == "4" ? "selected" : ""}}>4</option>
                                                        <option {{ $lg->Written == "5" ? "selected" : ""}}>5</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @else
                                        <tr><td>No records.</td></tr>
                                        @endif
                                        <tbody id="skill_form">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </br></br>
                            <div class="col-sm-12"> 
                                <button type="submit" id="submit">Save</button>
                                <button type="button" id="cancel" onclick="window.location='{{ url("student/resume/language") }}'">Cancel</button>
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
