@extends('layouts.layout1')
@section('header')
<style>
    #addForm{
        display:none;
    }
    .desc_css{
        table-layout: fixed;
        width: 100%;
    }
    .desc_css tr td{
        word-wrap:break-word;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
                    <p style="font-size: 20px;">Educations</p>
                    <p style="font-size: 12px;"> <i>Please add your two highest education qualifications*</i>              
                        @if($edu_count < 2)
                        <span style="font-size: 14px"><button type="button" id="formButton" class="btn btn-default pull-right">Add</button></span>
                    </p>
                    @endif
                    @if($edu_count == 0)
                    <p style="font-size: 14px;">No education record.</p>
                    @endif
                        
                        
                    @foreach($eduDetail as $edu)
                    <div class="box">                                    
                        <span class="pull-right">
                            <form method="POST" action="/student/resume/education/{{$edu->Edu_Id}}" onsubmit="return confirmation()">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <input type="hidden" name="attrb" value="education">
                                <button type="submit" class="btn  btn-default">DELETE</button>
                            </form>
                            <a href="{{ route('editEducation',['id'=>$edu->Edu_Id]) }}" class="btn  btn-default">EDIT</a>
                        </span>
                            
                        <b>{{$edu->University}} - </b>                      
                        <b>{{$edu->Grad_Date->format('M Y')}}</b>     
                        <div>
                            <p>{{$edu->Qualification}} in {{$edu->Field_Of_Study}} | {{$edu->Uni_Location}}</p>
                            <table class='desc_css'>
                                <tr>
                                    <td style='width:200px'>Major</td>
                                    <td>{{$edu->Major}}</td>
                                </tr>
                                @if($edu->Grade == "CGPA")
                                <tr>
                                    <td>CGPA</td>
                                    <td>{{$edu->CGPA}} / 4.0000</td>
                                </tr>
                                @else
                                <tr>
                                    <td>Grade</td>
                                    <td>{{$edu->Grade}}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="2">{{$edu->Additional_Info}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @endforeach 
                </div>        
            </div>
            
            <div class="col-md-3"></div>
                
            <div class="col-md-9" id="addForm">
                <div class="box">  
                    @if($edu_count < 2)
                    <form method="POST" action="/student/resume/education" >
                        {{csrf_field()}}
                        <input type="hidden" value="education" name="attrb">
                        <h3>Education</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-xs-3">
                                    <label>Institute</label>
                                </div>
                                <div class="col-xs-9">
                                    <input required maxlength="60" minlength="3"type="text" class="form-control" value="{{old('University')}}"
                                           placeholder="eg. Tunku Abdul Rahman University College" name="University"/>
                                </div>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-xs-3"><label>Graduation Date</label></div>
                                <div class="col-xs-3">
                                    <select class="form-control" name="month" required id="month">
                                        <option disabled="disabled" value="" selected="selected">Month</option>
                                        <option value="01" {{ old('month') == '01' ? 'selected' : '' }}>January</option>
                                        <option value="02" {{ old('month') == '02' ? 'selected' : '' }}>February</option>
                                        <option value="03" {{ old('month') == '03' ? 'selected' : '' }}>March</option>
                                        <option value="04" {{ old('month') == '04' ? 'selected' : '' }}>April</option>
                                        <option value="05" {{ old('month') == '05' ? 'selected' : '' }}>May</option>
                                        <option value="06" {{ old('month') == '06' ? 'selected' : '' }}>June</option>
                                        <option value="07" {{ old('month') == '07' ? 'selected' : '' }}>July</option>
                                        <option value="08" {{ old('month') == '08' ? 'selected' : '' }}>August</option>
                                        <option value="09" {{ old('month') == '09' ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ old('month') == '10' ? 'selected' : '' }}>October</option>
                                        <option value="11" {{ old('month') == '11' ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ old('month') == '12' ? 'selected' : '' }}>December</option>
                                    </select>
                                </div>
                                
                                <div class="col-xs-3">
                                    <select class="form-control" name="year" required>
                                        <option disabled="disabled" value="" selected="selected">Year</option>
                                            <?php $minYear = now()->year-10;
                                                  $maxYear = now()->year+10;
                                            ?>
                                        @for($max = $maxYear; $max >= $minYear; $max--)
                                        <option {{ old('year') == $max ? 'selected' : '' }}>{{$max}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                            
                        </br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Qualification</label>
                                        <select class="form-control" name="Qualification" required>
                                            <option disabled="disabled" value="" selected="selected">Please Select</option>
                                            <option {{ old('Qualification') == 'Secondary School' ? 'selected' : '' }}>Secondary School</option>
                                            <option {{ old('Qualification') == 'Pre - U' ? 'selected' : '' }}>Pre - U</option>
                                            <option {{ old('Qualification') == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                            <option {{ old('Qualification') == 'Advanced Diploma' ? 'selected' : '' }}>Advanced Diploma</option>
                                            <option {{ old('Qualification') == 'Professional Certificates' ? 'selected' : '' }}>Professional Certificates</option>
                                            <option {{ old('Qualification') == 'Vocational Certificate' ? 'selected' : '' }}>Vocational Certificate</option>
                                            <option {{ old('Qualification') == 'Degree' ? 'selected' : '' }}>Degree</option>
                                            <option {{ old('Qualification') == 'Honours Degree' ? 'selected' : '' }}>Honours Degree</option>
                                            <option {{ old('Qualification') == 'Post Graduate Diploma' ? 'selected' : '' }}>Post Graduate Diploma</option>
                                            <option {{ old('Qualification') == 'Masters' ? 'selected' : '' }}>Masters</option>
                                            <option {{ old('Qualification') == 'Phds' ? 'selected' : '' }}>Phds</option>
                                            <option {{ old('Qualification') == 'Other' ? 'selected' : '' }}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>University Location</label>
                                        <input value='{{ old('Uni_Location')}}' maxlength="50" minlength="2" type="text" class="form-control" name="Uni_Location" />
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Field of Study</label>
                                        <select class="form-control" name="Field_Of_Study" required>
                                            <option disabled="disabled" value="" selected="selected">Please Select</option>
                                            <option {{ old('Field_Of_Study') == 'Advertising/Media' ? 'selected':''}}>Advertising/Media</option>
                                            <option {{ old('Field_Of_Study') == 'Agriculture/Aquaculture/Forestry' ? 'selected':''}}>Agriculture/Aquaculture/Forestry</option>
                                            <option {{ old('Field_Of_Study') == 'Airline Operation/Airport Management' ? 'selected':''}}>Airline Operation/Airport Management</option>
                                            <option {{ old('Field_Of_Study') == 'Architecture' ? 'selected':''}}>Architecture</option>
                                            <option {{ old('Field_Of_Study') == 'Art/Design/Creative Multimedia' ? 'selected':''}}>Art/Design/Creative Multimedia</option>
                                            <option {{ old('Field_Of_Study') == 'Biology' ? 'selected':''}}>Biology</option>
                                            <option {{ old('Field_Of_Study') == 'BioTechnology' ? 'selected':''}}>BioTechnology</option>
                                            <option {{ old('Field_Of_Study') == 'Business Studies/Administration/Management' ? 'selected':''}}>Business Studies/Administration/Management</option>
                                            <option {{ old('Field_Of_Study') == 'Chemistry' ? 'selected':''}}>Chemistry</option>
                                            <option {{ old('Field_Of_Study') == 'Commerce' ? 'selected':''}}>Commerce</option>
                                            <option {{ old('Field_Of_Study') == 'Computer Science/Information Technology' ? 'selected':''}}>Computer Science/Information Technology</option>
                                            <option {{ old('Field_Of_Study') == 'Dentistry' ? 'selected':''}}>Dentistry</option>
                                            <option {{ old('Field_Of_Study') == 'Economics' ? 'selected':''}}>Economics</option>
                                            <option {{ old('Field_Of_Study') == 'Education/Teaching/Training' ? 'selected':''}}>Education/Teaching/Training</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Aviation/Aeronautics/Astronautics)' ? 'selected':''}}>Engineering (Aviation/Aeronautics/Astronautics)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Bioengineering/Biomedical)' ? 'selected':''}}>Engineering (Bioengineering/Biomedical)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Chemical)' ? 'selected':''}}>Engineering (Chemical)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Civil)' ? 'selected':''}}>Engineering (Civil)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Computer/Telecommunication)' ? 'selected':''}}>Engineering (Computer/Telecommunication)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Electrical/Electronic)' ? 'selected':''}}>Engineering (Electrical/Electronic)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Environmental/Health/Safety)' ? 'selected':''}}>Engineering (Environmental/Health/Safety)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Industrial)' ? 'selected':''}}>Engineering (Industrial)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Marine)' ? 'selected':''}}>Engineering (Marine)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Material Science)' ? 'selected':''}}>Engineering (Material Science)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Mechanical)' ? 'selected':''}}>Engineering (Mechanical)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Mechatronic/Electromechanical)' ? 'selected':''}}>Engineering (Mechatronic/Electromechanical)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Metal Fabrication/Tool & Die/Welding)' ? 'selected':''}}>Engineering (Metal Fabrication/Tool &amp; Die/Welding)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Mining/Mineral)' ? 'selected':''}}>Engineering (Mining/Mineral)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Others)' ? 'selected':''}}>Engineering (Others)</option>
                                            <option {{ old('Field_Of_Study') == 'Engineering (Petroleum/Oil/Gas)' ? 'selected':''}}>Engineering (Petroleum/Oil/Gas)</option>
                                            <option {{ old('Field_Of_Study') == 'Finance/Accountancy/Banking' ? 'selected':''}}>Finance/Accountancy/Banking</option>
                                            <option {{ old('Field_Of_Study') == 'Food & Beverage Services Management' ? 'selected':''}}>Food &amp; Beverage Services Management</option>
                                            <option {{ old('Field_Of_Study') == 'Food Technology/Nutrition/Dietetics' ? 'selected':''}}>Food Technology/Nutrition/Dietetics</option>
                                            <option {{ old('Field_Of_Study') == 'Geographical Science' ? 'selected':''}}>Geographical Science</option>
                                            <option {{ old('Field_Of_Study') == 'Geology/Geophysics' ? 'selected':''}}>Geology/Geophysics</option>
                                            <option {{ old('Field_Of_Study') == 'History' ? 'selected':''}}>History</option>
                                            <option {{ old('Field_Of_Study') == 'Hospitality/Tourism/Hotel Management' ? 'selected':''}}>Hospitality/Tourism/Hotel Management</option>
                                            <option {{ old('Field_Of_Study') == 'Human Resource Management' ? 'selected':''}}>Human Resource Management</option>
                                            <option {{ old('Field_Of_Study') == 'Humanities/Liberal Arts' ? 'selected':''}}>Humanities/Liberal Arts</option>
                                            <option {{ old('Field_Of_Study') == 'Journalism' ? 'selected':''}}>Journalism</option>
                                            <option {{ old('Field_Of_Study') == 'Law' ? 'selected':''}}>Law</option>
                                            <option {{ old('Field_Of_Study') == 'Library Management' ? 'selected':''}}>Library Management</option>
                                            <option {{ old('Field_Of_Study') == 'Linguistics/Languages' ? 'selected':''}}>Linguistics/Languages</option>
                                            <option {{ old('Field_Of_Study') == 'Logistic/Transportation' ? 'selected':''}}>Logistic/Transportation</option>
                                            <option {{ old('Field_Of_Study') == 'Maritime Studies' ? 'selected':''}}>Maritime Studies</option>
                                            <option {{ old('Field_Of_Study') == 'Marketing' ? 'selected':''}}>Marketing</option>
                                            <option {{ old('Field_Of_Study') == 'Mass Communications' ? 'selected':''}}>Mass Communications</option>
                                            <option {{ old('Field_Of_Study') == 'Mathematics' ? 'selected':''}}>Mathematics</option>
                                            <option {{ old('Field_Of_Study') == 'Medical Science' ? 'selected':''}}>Medical Science</option>
                                            <option {{ old('Field_Of_Study') == 'Medicine' ? 'selected':''}}>Medicine</option>
                                            <option {{ old('Field_Of_Study') == 'Music/Performing Arts Studies' ? 'selected':''}}>Music/Performing Arts Studies</option>
                                            <option {{ old('Field_Of_Study') == 'Nursing' ? 'selected':''}}>Nursing</option>
                                            <option {{ old('Field_Of_Study') == 'Optometry' ? 'selected':''}}>Optometry</option>
                                            <option {{ old('Field_Of_Study') == 'Others' ? 'selected':''}}>Others</option>
                                            <option {{ old('Field_Of_Study') == 'Personal Services' ? 'selected':''}}>Personal Services</option>
                                            <option {{ old('Field_Of_Study') == 'Pharmacy/Pharmacology' ? 'selected':''}}>Pharmacy/Pharmacology</option>
                                            <option {{ old('Field_Of_Study') == 'Philosophy' ? 'selected':''}}>Philosophy</option>
                                            <option {{ old('Field_Of_Study') == 'Physical Therapy/Physiotherapy' ? 'selected':''}}>Physical Therapy/Physiotherapy</option>
                                            <option {{ old('Field_Of_Study') == 'Physics' ? 'selected':''}}>Physics</option>
                                            <option {{ old('Field_Of_Study') == 'Political Science' ? 'selected':''}}>Political Science</option>
                                            <option {{ old('Field_Of_Study') == 'Property Development/Real Estate Management' ? 'selected':''}}>Property Development/Real Estate Management</option>
                                            <option {{ old('Field_Of_Study') == 'Protective Services & Management' ? 'selected':''}}>Protective Services &amp; Management</option>
                                            <option {{ old('Field_Of_Study') == 'Psychology' ? 'selected':''}}>Psychology</option>
                                            <option {{ old('Field_Of_Study') == 'Quantity Survey' ? 'selected':''}}>Quantity Survey</option>
                                            <option {{ old('Field_Of_Study') == 'Science & Technology' ? 'selected':''}}>Science &amp; Technology</option>
                                            <option {{ old('Field_Of_Study') == 'Secretarial' ? 'selected':''}}>Secretarial</option>
                                            <option {{ old('Field_Of_Study') == 'Social Science/Sociology' ? 'selected':''}}>Social Science/Sociology</option>
                                            <option {{ old('Field_Of_Study') == 'Sports Science & Management' ? 'selected':''}}>Sports Science &amp; Management</option>
                                            <option {{ old('Field_Of_Study') == 'Textile/Fashion Design' ? 'selected':''}}>Textile/Fashion Design</option>
                                            <option {{ old('Field_Of_Study') == 'Urban Studies/Town Planning' ? 'selected':''}}>Urban Studies/Town Planning</option>
                                            <option {{ old('Field_Of_Study') == 'Veterinary' ? 'selected':''}}>Veterinary</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Major</label>
                                        <input required value='{{ old('Major')}}' maxlength="100" minlength="2" type="text" class="form-control" placeholder="Internet Technology" name="Major" />
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Grade</label>
                                        <select class="form-control" name="Grade" required id="grade">
                                            <option disabled="disabled" selected="selected" value="">Please Select</option>
                                            <option {{ old('Grade') == 'Grade A' ? 'selected':''}}>Grade A</option>
                                            <option {{ old('Grade') == 'Grade B' ? 'selected':''}}>Grade B</option>
                                            <option {{ old('Grade') == 'Grade C' ? 'selected':''}}>Grade C</option>
                                            <option {{ old('Grade') == 'Grade D' ? 'selected':''}}>Grade D</option>
                                            <option {{ old('Grade') == '1st Class' ? 'selected':''}}>1st Class</option>
                                            <option {{ old('Grade') == '2nd Class Upper' ? 'selected':''}}>2nd Class Upper</option>
                                            <option {{ old('Grade') == '2nd Class Lower' ? 'selected':''}}>2nd Class Lower</option>
                                            <option {{ old('Grade') == '3rd Class' ? 'selected':''}}>3rd Class</option>
                                            <option {{ old('Grade') == 'CGPA' ? 'selected':''}}>CGPA</option>
                                            <option {{ old('Grade') == 'Pass' ? 'selected':''}}>Pass</option>
                                            <option {{ old('Grade') == 'Other' ? 'selected':''}}>Other</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                
                                <div class="col-sm-3" id="CGPA">
                                    <div class="form-group">
                                        <label>CGPA</label>
                                        <input value='{{old('CGPA')}}' step="0.0001" pattern="^\d+(?:\.\d{1,4})?$" min="0" placeholder="0.0000" name="CGPA" type="number" class="form-control" />
                                    </div>
                                </div>
                                  
                                    
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Additional Information</label>
                                        <input value='{{old('Additional_Info')}}' maxlength="2500" ype="textarea" class="form-control" name="Additional_Info"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"> 
                                <button type="submit">Save</button>
                                <button type="button" onclick="window.location='{{ url("student/resume/education") }}'">Cancel</button>
                            </div>
                        </div>    
                    </form>  
                    @endif                   
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
    $(function(){     
            if($("#error").length != 0){
                $("#formButton").click();
            }
    });
    

    var test = $('#grade :selected').text();
    
    if(test != 'CGPA'){
        $('#CGPA').hide();
    }
    else{
        $('#CGPA').show();
    }

    $("#formButton").click(function(){
        $("#addForm").css("display", "block");
    });
    
    function confirmation(){
        return confirm("Do you want to delete this item?");
    } 
    
    $('#grade').change(function(){
        var grade = $(this).val();
        if(grade == "CGPA") 
            $('#CGPA').show();
        else
            $('#CGPA').hide();
    });
</script>
<script src="{{asset('js/app.js')}}"></script>
@endsection