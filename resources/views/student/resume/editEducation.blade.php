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
                
            <div class="col-md-3"></div>
                
            <div class="col-md-9">
                <div class="box">                    
                    <form method="POST" action="/student/resume/education/{{$eduDetail->Edu_Id}}">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" value="education" name="attrb">
                        <h3>Education</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-xs-3">
                                    <label>Institute</label>
                                </div>
                                <div class="col-xs-9">
                                    <input required minlength="3" maxlength="60" type="text" class="form-control" name="University" value="{{old('University',$eduDetail->University) }}"/>
                                </div>
                            </div>
                        </div>
                            </br>
                            <div class='row'>
                                <div class="col-sm-12">
                                    <div class="col-xs-3"><label>Graduation Date</label></div>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="month" required>
                                            <option value="01" {{ old('month',$eduDetail->Grad_Date->format('m')) == '01' ? 'selected': ''}}>January</option>
                                            <option value="02" {{ old('month',$eduDetail->Grad_Date->format('m')) == '02' ? 'selected': ''}}>February</option>
                                            <option value="03" {{ old('month',$eduDetail->Grad_Date->format('m')) == '03' ? 'selected': ''}}>March</option>
                                            <option value="04" {{ old('month',$eduDetail->Grad_Date->format('m')) == '04' ? 'selected': ''}}>April</option>
                                            <option value="05" {{ old('month',$eduDetail->Grad_Date->format('m')) == '05' ? 'selected': ''}}>May</option>
                                            <option value="06" {{ old('month',$eduDetail->Grad_Date->format('m')) == '06' ? 'selected': ''}}>June</option>
                                            <option value="07" {{ old('month',$eduDetail->Grad_Date->format('m')) == '07' ? 'selected': ''}}>July</option>
                                            <option value="08" {{ old('month',$eduDetail->Grad_Date->format('m')) == '08' ? 'selected': ''}}>August</option>
                                            <option value="09" {{ old('month',$eduDetail->Grad_Date->format('m')) == '09' ? 'selected': ''}}>September</option>
                                            <option value="10" {{ old('month',$eduDetail->Grad_Date->format('m')) == '10' ? 'selected': ''}}>October</option>
                                            <option value="11" {{ old('month',$eduDetail->Grad_Date->format('m')) == '11' ? 'selected': ''}}>November</option>
                                            <option value="12" {{ old('month',$eduDetail->Grad_Date->format('m')) == '12' ? 'selected': ''}}>December</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-xs-2">
                                        <select class="form-control" name="year" required>
                                            <?php $minYear = now()->year-10;
                                                  $maxYear = now()->year+10;
                                            ?>
                                            @for($max = $maxYear; $max >= $minYear; $max--)
                                            <option {{ old('year',$eduDetail->Grad_Date->format('Y')) == $max ? 'selected': ''}}>{{$max}}</option>
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
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Secondary School' ? 'selected':''}}>Secondary School</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Pre - U' ? 'selected':''}}>Pre - U</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Diploma' ? 'selected':''}}>Diploma</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Advanced Diploma' ? 'selected':''}}>Advanced Diploma</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Professional Certificates' ? 'selected':''}}>Professional Certificates</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Vocational Certificate' ? 'selected':''}}>Vocational Certificate</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Degree' ? 'selected':''}}>Degree</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Honours Degree' ? 'selected':''}}>Honours Degree</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Post Graduate Diploma' ? 'selected':''}}>Post Graduate Diploma</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Masters' ? 'selected':''}}>Masters</option>
                                                <option {{ old('Qualification',$eduDetail->Qualification) == 'Phds' ? 'selected':''}}>Phds</option>
                                                <option>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>University Location</label>
                                            <input value='{{ old('Uni_Location',$eduDetail->Uni_Location)}}' maxlength="50" minlength="2" type="text" class="form-control" name="Uni_Location" />
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
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Advertising/Media' ? 'selected':''}}>Advertising/Media</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Agriculture/Aquaculture/Forestry' ? 'selected':''}}>Agriculture/Aquaculture/Forestry</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Airline Operation/Airport Management' ? 'selected':''}}>Airline Operation/Airport Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Architecture' ? 'selected':''}}>Architecture</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Art/Design/Creative Multimedia' ? 'selected':''}}>Art/Design/Creative Multimedia</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Biology' ? 'selected':''}}>Biology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'BioTechnology' ? 'selected':''}}>BioTechnology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Business Studies/Administration/Management' ? 'selected':''}}>Business Studies/Administration/Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Chemistry' ? 'selected':''}}>Chemistry</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Commerce' ? 'selected':''}}>Commerce</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Computer Science/Information Technology' ? 'selected':''}}>Computer Science/Information Technology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Dentistry' ? 'selected':''}}>Dentistry</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Economics' ? 'selected':''}}>Economics</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Education/Teaching/Training' ? 'selected':''}}>Education/Teaching/Training</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Aviation/Aeronautics/Astronautics)' ? 'selected':''}}>Engineering (Aviation/Aeronautics/Astronautics)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Bioengineering/Biomedical)' ? 'selected':''}}>Engineering (Bioengineering/Biomedical)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Chemical)' ? 'selected':''}}>Engineering (Chemical)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Civil)' ? 'selected':''}}>Engineering (Civil)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Computer/Telecommunication)' ? 'selected':''}}>Engineering (Computer/Telecommunication)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Electrical/Electronic)' ? 'selected':''}}>Engineering (Electrical/Electronic)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Environmental/Health/Safety)' ? 'selected':''}}>Engineering (Environmental/Health/Safety)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Industrial)' ? 'selected':''}}>Engineering (Industrial)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Marine)' ? 'selected':''}}>Engineering (Marine)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Material Science)' ? 'selected':''}}>Engineering (Material Science)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Mechanical)' ? 'selected':''}}>Engineering (Mechanical)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Mechatronic/Electromechanical)' ? 'selected':''}}>Engineering (Mechatronic/Electromechanical)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Metal Fabrication/Tool & Die/Welding)' ? 'selected':''}}>Engineering (Metal Fabrication/Tool &amp; Die/Welding)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Mining/Mineral)' ? 'selected':''}}>Engineering (Mining/Mineral)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Others)' ? 'selected':''}}>Engineering (Others)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Engineering (Petroleum/Oil/Gas)' ? 'selected':''}}>Engineering (Petroleum/Oil/Gas)</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Finance/Accountancy/Banking' ? 'selected':''}}>Finance/Accountancy/Banking</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Food & Beverage Services Management' ? 'selected':''}}>Food &amp; Beverage Services Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Food Technology/Nutrition/Dietetics' ? 'selected':''}}>Food Technology/Nutrition/Dietetics</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Geographical Science' ? 'selected':''}}>Geographical Science</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Geology/Geophysics' ? 'selected':''}}>Geology/Geophysics</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'History' ? 'selected':''}}>History</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Hospitality/Tourism/Hotel Management' ? 'selected':''}}>Hospitality/Tourism/Hotel Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Human Resource Management' ? 'selected':''}}>Human Resource Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Humanities/Liberal Arts' ? 'selected':''}}>Humanities/Liberal Arts</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Journalism' ? 'selected':''}}>Journalism</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Law' ? 'selected':''}}>Law</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Library Management' ? 'selected':''}}>Library Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Linguistics/Languages' ? 'selected':''}}>Linguistics/Languages</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Logistic/Transportation' ? 'selected':''}}>Logistic/Transportation</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Maritime Studies' ? 'selected':''}}>Maritime Studies</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Marketing' ? 'selected':''}}>Marketing</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Mass Communications' ? 'selected':''}}>Mass Communications</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Mathematics' ? 'selected':''}}>Mathematics</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Medical Science' ? 'selected':''}}>Medical Science</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Medicine' ? 'selected':''}}>Medicine</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Music/Performing Arts Studies' ? 'selected':''}}>Music/Performing Arts Studies</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Nursing' ? 'selected':''}}>Nursing</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Optometry' ? 'selected':''}}>Optometry</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Others' ? 'selected':''}}>Others</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Personal Services' ? 'selected':''}}>Personal Services</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Pharmacy/Pharmacology' ? 'selected':''}}>Pharmacy/Pharmacology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Philosophy' ? 'selected':''}}>Philosophy</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Physical Therapy/Physiotherapy' ? 'selected':''}}>Physical Therapy/Physiotherapy</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Physics' ? 'selected':''}}>Physics</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Political Science' ? 'selected':''}}>Political Science</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Property Development/Real Estate Management' ? 'selected':''}}>Property Development/Real Estate Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Protective Services & Management' ? 'selected':''}}>Protective Services &amp; Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Psychology' ? 'selected':''}}>Psychology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Quantity Survey' ? 'selected':''}}>Quantity Survey</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Science & Technology' ? 'selected':''}}>Science &amp; Technology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Secretarial' ? 'selected':''}}>Secretarial</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Social Science/Sociology' ? 'selected':''}}>Social Science/Sociology</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Sports Science & Management' ? 'selected':''}}>Sports Science &amp; Management</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Textile/Fashion Design' ? 'selected':''}}>Textile/Fashion Design</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Urban Studies/Town Planning' ? 'selected':''}}>Urban Studies/Town Planning</option>
                                                <option {{ old('Field_Of_Study',$eduDetail->Field_Of_Study) == 'Veterinary' ? 'selected':''}}>Veterinary</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Major</label>
                                            <input required maxlength="100" minlength="2" type="text" class="form-control" placeholder="Internet Technology" name="Major" value="{{ old('Major',$eduDetail->Major) }}"/>
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
                                                <option disabled="disabled" selected="selected">Please Select</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'Grade A' ? 'selected':''}}>Grade A</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'Grade B' ? 'selected':''}}>Grade B</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'Grade C' ? 'selected':''}}>Grade C</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'Grade D' ? 'selected':''}}>Grade D</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == '1st Class' ? 'selected':''}}>1st Class</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == '2nd Class Upper' ? 'selected':''}}>2nd Class Upper</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == '2nd Class Lower' ? 'selected':''}}>2nd Class Lower</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == '3rd Class' ? 'selected':''}}>3rd Class</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'CGPA' ? 'selected':''}}>CGPA</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'Pass' ? 'selected':''}}>Pass</option>
                                                <option {{ old('Grade',$eduDetail->Grade) == 'Other' ? 'selected':''}}>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col-sm-3" id="CGPA">
                                        <div class="form-group">
                                            <label>CGPA</label>
                                            <input step="0.0001" pattern="^\d+(?:\.\d{1,4})?$" min="0" value="{{ old('CGPA',$eduDetail->CGPA) }}"
                                                   placeholder="0.0000" name="CGPA" type="number" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Additional Information</label>
                                            <input maxlength="2500" type="textarea" class="form-control" name="Additional_Info" value="{{ old('Additional_Info',$eduDetail->Additional_Info) }}"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <button type="submit">Save</button>
                                    <button type="button" onclick="window.location='{{ url("student/resume/education") }}'">Back</button>
                                </div>
                            </div>
                                
                    </form>                   
                </div>
                    
                @if($errors->any())
                <div class="alert alert-danger">  
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
    $('#CGPA').hide();
    
    var test = $('#grade :selected').text();
    
    if(test != 'CGPA'){
        $('#CGPA').hide();
    }
    else{
        $('#CGPA').show();
    }

    $('#grade').change(function(){
        var grade = $(this).val();
        if(grade == "CGPA") 
            $('#CGPA').show();
        else
            $('#CGPA').hide();
    });
</script>
@endsection