@extends('layouts.layout1')
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
                    <p style="font-size: 20px;">Experiences               
                        @if($exp_count < 2)
                        <span style="font-size: 14px;"><button type="button" id="formButton" class="btn  btn-default pull-right">Add</button></span>
                        @endif
                        @if($exp_count == 0)
                    <p style="font-size: 14px;">No experience record.</p>
                    @endif
                    </p>
                        
                    @foreach($expDetail as $exp)
                    <div class="box">
                        <span class="pull-right">
                            <form method="POST" action="/student/resume/experience/{{$exp->Exp_Id}}" onsubmit="return confirmation()">
                                {{method_field('DELETE')}}
                                {{csrf_field()}}
                                <input type="hidden" name="attrb" value="experience">
                                <button type="submit" class="btn  btn-default">DELETE</button>
                            </form>
                            <a href="{{ route('editExperience',['id'=>$exp->Exp_Id]) }}" class="btn  btn-default">EDIT</a>
                        </span>
                        
                        <b>{{$exp->Position_Title}} </b>
                        <p>{{$exp->Company_Name}}</p>
                        <p>From {{$exp->Joined_Frm->format('M Y')}}</p>
                        <p>To {{$exp->Joined_To->format('M Y')}}</p>              
                            
                        <div>
                            <table class='desc_css'>
                                <tr>
                                    <td style='width:200px'>Industry</td>
                                    <td>{{$exp->Industry}}</td>
                                </tr>
                                <tr>
                                    <td>Position_Lvl</td>
                                    <td>{{$exp->Position_Lvl}}</td>
                                </tr>
                                <tr>
                                    <td>Country</td>
                                    <td>{{$exp->Country}}</td>
                                </tr>
                                <tr>
                                    <td>Salary Range</td>
                                    <td>{{$exp->Salary_Range}}</td>
                                </tr>
                                    
                                <tr>
                                    <td colspan="2">{{$exp->Description}}</td>
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
                    @if($exp_count<2)
                    <form method="POST" action="/student/resume/experience">
                        {{csrf_field()}}
                        <input type="hidden" value="experience" name="attrb">
                        <h3>Experience</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-1"><label>From</label></div>
                                    <div class="col-xs-3">
                                        <select class="form-control" name="frm_month" required>
                                            <option disabled="disabled" value="" selected="selected">Month</option>
                                            <option value="01" {{ old('frm_month') == '01' ? 'selected': ''}}>January</option>
                                            <option value="02" {{ old('frm_month') == '02' ? 'selected': ''}}>February</option>
                                            <option value="03" {{ old('frm_month') == '03' ? 'selected': ''}}>March</option>
                                            <option value="04" {{ old('frm_month') == '04' ? 'selected': ''}}>April</option>
                                            <option value="05" {{ old('frm_month') == '05' ? 'selected': ''}}>May</option>
                                            <option value="06" {{ old('frm_month') == '06' ? 'selected': ''}}>June</option>
                                            <option value="07" {{ old('frm_month') == '07' ? 'selected': ''}}>July</option>
                                            <option value="08" {{ old('frm_month') == '08' ? 'selected': ''}}>August</option>
                                            <option value="09" {{ old('frm_month') == '09' ? 'selected': ''}}>September</option>
                                            <option value="10" {{ old('frm_month') == '10' ? 'selected': ''}}>October</option>
                                            <option value="11" {{ old('frm_month') == '11' ? 'selected': ''}}>November</option>
                                            <option value="12" {{ old('frm_month') == '12' ? 'selected': ''}}>December</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2">
                                        <select class="form-control" name="frm_year" required >
                                            <option disabled="disabled" value="" selected="selected">Year</option>
                                            <?php $minYear = now()->year-20;
                                                  $maxYear = now()->year;
                                            ?>
                                            @for($max = $maxYear; $max >= $minYear; $max--)
                                            <option {{ old('frm_year') == $max ? 'selected' : '' }}>{{$max}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-sm-1"><label>To</label></div>
                                    <div class="col-sm-3">
                                        <select class="form-control" name="to_month" required>
                                            <option disabled="disabled" value="" selected="selected">Month</option>
                                            <option value="01" {{ old('to_month') == '01' ? 'selected': ''}}>January</option>
                                            <option value="02" {{ old('to_month') == '02' ? 'selected': ''}}>February</option>
                                            <option value="03" {{ old('to_month') == '03' ? 'selected': ''}}>March</option>
                                            <option value="04" {{ old('to_month') == '04' ? 'selected': ''}}>April</option>
                                            <option value="05" {{ old('to_month') == '05' ? 'selected': ''}}>May</option>
                                            <option value="06" {{ old('to_month') == '06' ? 'selected': ''}}>June</option>
                                            <option value="07" {{ old('to_month') == '07' ? 'selected': ''}}>July</option>
                                            <option value="08" {{ old('to_month') == '08' ? 'selected': ''}}>August</option>
                                            <option value="09" {{ old('to_month') == '09' ? 'selected': ''}}>September</option>
                                            <option value="10" {{ old('to_month') == '10' ? 'selected': ''}}>October</option>
                                            <option value="11" {{ old('to_month') == '11' ? 'selected': ''}}>November</option>
                                            <option value="12" {{ old('to_month') == '12' ? 'selected': ''}}>December</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2">
                                        <select class="form-control" name="to_year" required >
                                            <option disabled="disabled" value="" selected="selected">Year</option>
                                            <?php $minYear = now()->year-20;
                                                  $maxYear = now()->year;
                                            ?>
                                            @for($max = $maxYear; $max >= $minYear; $max--)
                                            <option {{ old('to_year') == $max ? 'selected' : '' }}>{{$max}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br /><br />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Company</label>
                                        <input required maxlength="30"type="text" class="form-control" name="Company_Name" value='{{old('Company_Name')}}'/>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Industry</label>
                                        <select class="form-control" name="Industry" required>
                                            <option value="" selected="selected" disabled="">Please Select</option>
                                            <optgroup label="Human services">
                                                <option {{ old('Industry') == 'Environment / Health / Safety' ? 'selected':''}}>Environment / Health / Safety</option>
                                                <option {{ old('Industry') == 'Government / Defence' ? 'selected':''}}>Government / Defence</option>
                                                <option {{ old('Industry') == 'Hotel / Hospitality' ? 'selected':''}}>Hotel / Hospitality</option>
                                                <option {{ old('Industry') == 'Library / Museum' ? 'selected':''}}>Library / Museum</option>
                                                <option {{ old('Industry') == 'Social Services / NGO' ? 'selected':''}}>Social Services / NGO</option>
                                                <option {{ old('Industry') == 'Sports' ? 'selected':''}}>Sports</option>
                                            </optgroup>
                                            <optgroup label="Information services">
                                                <option {{ old('Industry') == 'Education' ? 'selected':''}}>Education</option>
                                                <option {{ old('Industry') == 'Engineering / Technical Consulting' ? 'selected':''}}>Engineering / Technical Consulting</option>
                                                <option {{ old('Industry') == 'IT / Hardware' ? 'selected':''}}>IT / Hardware</option>
                                                <option {{ old('Industry') == 'IT / Software' ? 'selected':''}}>IT / Software</option>
                                                <option {{ old('Industry') == 'R&D' ? 'selected':''}}>R&amp;D</option>
                                                <option {{ old('Industry') == 'Science & Technology' ? 'selected':''}}>Science &amp; Technology</option>
                                            </optgroup>
                                            <optgroup label="Manufacturing">
                                                <option {{ old('Industry') == 'Automobile / Automotive' ? 'selected':''}}>Automobile / Automotive</option>
                                                <option {{ old('Industry') == 'Aviation / Airline' ? 'selected':''}}>Aviation / Airline</option>
                                                <option {{ old('Industry') == 'BioTech / Pharmaceutical' ? 'selected':''}}>BioTech / Pharmaceutical</option>
                                                <option {{ old('Industry') == 'Chemical / Fertilizers' ? 'selected':''}}>Chemical / Fertilizers</option>
                                                <option {{ old('Industry') == 'Construction / Building' ? 'selected':''}}>Construction / Building</option>
                                                <option {{ old('Industry') == 'Consumer Products / FMCG' ? 'selected':''}}>Consumer Products / FMCG</option>
                                                <option {{ old('Industry') == 'Electrical & Electronics' ? 'selected':''}}>Electrical &amp; Electronics</option>
                                                <option {{ old('Industry') == 'Food & Beverage' ? 'selected':''}}>Food &amp; Beverage</option>
                                                <option {{ old('Industry') == 'Gems / Jewellery' ? 'selected':''}}>Gems / Jewellery</option>
                                                <option {{ old('Industry') == 'Heavy Industrial / Machinery' ? 'selected':''}}>Heavy Industrial / Machinery</option>
                                                <option {{ old('Industry') == 'Manufacturing / Production' ? 'selected':''}}>Manufacturing / Production</option>
                                                <option {{ old('Industry') == 'Semiconductor' ? 'selected':''}}>Semiconductor</option>
                                                <option {{ old('Industry') == 'Textiles / Garment' ? 'selected':''}}>Textiles / Garment</option>
                                                <option {{ old('Industry') == 'Tobacco' ? 'selected':''}}>Tobacco</option>
                                                <option {{ old('Industry') == 'Utilities / Power' ? 'selected':''}}>Utilities / Power</option>
                                            </optgroup>
                                            <optgroup label="Raw materials">
                                                <option {{ old('Industry') == 'Agriculture / Poultry / Fisheries' ? 'selected':''}}>Agriculture / Poultry / Fisheries</option>
                                                <option {{ old('Industry') == 'Marine / Aquaculture' ? 'selected':''}}>Marine / Aquaculture</option>
                                                <option {{ old('Industry') == 'Mining' ? 'selected':''}}>Mining</option>
                                                <option {{ old('Industry') == 'Oil / Gas / Petroleum' ? 'selected':''}}>Oil / Gas / Petroleum</option>
                                                <option {{ old('Industry') == 'Polymer / Rubber' ? 'selected':''}}>Polymer / Rubber</option>
                                                <option {{ old('Industry') == 'Wood / Fibre / Paper' ? 'selected':''}}>Wood / Fibre / Paper</option>
                                            </optgroup>
                                            <optgroup label="Services">
                                                <option {{ old('Industry') == 'Accounting / Tax Services' ? 'selected':''}}>Accounting / Tax Services</option>
                                                <option {{ old('Industry') == 'Advertising / Marketing / PR' ? 'selected':''}}>Advertising / Marketing / PR</option>
                                                <option {{ old('Industry') == 'Apparel' ? 'selected':''}}>Apparel</option>
                                                <option {{ old('Industry') == 'Architecture / Interior Design' ? 'selected':''}}>Architecture / Interior Design</option>
                                                <option {{ old('Industry') == 'Arts / Design / Fashion' ? 'selected':''}}>Arts / Design / Fashion</option>
                                                <option {{ old('Industry') == 'Banking / Finance' ? 'selected':''}}>Banking / Finance</option>
                                                <option {{ old('Industry') == 'Beauty / Fitness' ? 'selected':''}}>Beauty / Fitness</option>
                                                <option {{ old('Industry') == 'Business / Mgmt Consulting' ? 'selected':''}}>Business / Mgmt Consulting</option>
                                                <option {{ old('Industry') == 'Call Center / BPO' ? 'selected':''}}>Call Center / BPO</option>
                                                <option {{ old('Industry') == 'Entertainment / Media' ? 'selected':''}}>Entertainment / Media</option>
                                                <option {{ old('Industry') == 'Exhibitions / Event Mgmt' ? 'selected':''}}>Exhibitions / Event Mgmt</option>
                                                <option {{ old('Industry') == 'General & Wholesale Trading' ? 'selected':''}}>General &amp; Wholesale Trading</option>
                                                <option {{ old('Industry') == 'Healthcare / Medical' ? 'selected':''}}>Healthcare / Medical</option>
                                                <option {{ old('Industry') == 'HR Mgmt / Consulting' ? 'selected':''}}>HR Mgmt / Consulting</option>
                                                <option {{ old('Industry') == 'Insurance' ? 'selected':''}}>Insurance</option>
                                                <option {{ old('Industry') == 'Journalism' ? 'selected':''}}>Journalism</option>
                                                <option {{ old('Industry') == 'Law / Legal' ? 'selected':''}}>Law / Legal</option>
                                                <option {{ old('Industry') == 'Printing / Publishing' ? 'selected':''}}>Printing / Publishing</option>
                                                <option {{ old('Industry') == 'Property / Real Estate' ? 'selected':''}}>Property / Real Estate</option>
                                                <option {{ old('Industry') == 'Repair / Maintenance' ? 'selected':''}}>Repair / Maintenance</option>
                                                <option {{ old('Industry') == 'Retail / Merchandise' ? 'selected':''}}>Retail / Merchandise</option>
                                                <option {{ old('Industry') == 'Security / Law Enforcement' ? 'selected':''}}>Security / Law Enforcement</option>
                                                <option {{ old('Industry') == 'Stockbroking / Securities' ? 'selected':''}}>Stockbroking / Securities</option>
                                                <option {{ old('Industry') == 'Telecommunication' ? 'selected':''}}>Telecommunication</option>
                                                <option {{ old('Industry') == 'Transportation / Logistics' ? 'selected':''}}>Transportation / Logistics</option>
                                                <option {{ old('Industry') == 'Travel / Tourism' ? 'selected':''}}>Travel / Tourism</option>
                                            </optgroup>
                                            <optgroup label="Other">
                                                <option {{ old('Industry')== 'Other' ? 'selected':''}}>Other</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Position Level</label>
                                        <select class="form-control" name="Position_Lvl" required>
                                            <option disabled="disabled" value="" selected="selected">Please Select</option>
                                            <option {{ old('Position_Lvl')== 'Internship' ? 'selected':''}}>Internship</option>
                                            <option {{ old('Position_Lvl')== 'Fresh Graduate' ? 'selected':''}}>Fresh Graduate</option>
                                            <option {{ old('Position_Lvl')== 'Non-Executive/Clerical' ? 'selected':''}}>Non-Executive/Clerical</option>
                                            <option {{ old('Position_Lvl')== 'Executive' ? 'selected':''}}>Executive</option>
                                            <option {{ old('Position_Lvl')== 'Senior Executive' ? 'selected':''}}>Senior Executive</option>
                                            <option {{ old('Position_Lvl')== 'Manager' ? 'selected':''}}>Manager</option>
                                            <option {{ old('Position_Lvl')== 'Senior Manager' ? 'selected':''}}>Senior Manager</option>
                                            <option {{ old('Position_Lvl')== 'Top Management' ? 'selected':''}}>Top Management</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Position Title</label>
                                        <input required maxlength="30" value='{{old('Position_Title')}}' type="text" name="Position_Title" placeholder="eg. Back-End Developer" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Salary Range</label>
                                        <select class="form-control" name='Salary_Range' required>
                                            <option value="#" selected="selected">Please Select</option>
                                            <option {{ old('Salary_Range')== 'Below RM 1000' ? 'selected':''}}>Below RM 1000</option>
                                            <option {{ old('Salary_Range')== 'RM 1000 to RM 2000' ? 'selected':''}}>RM 1000 to RM 2000</option>
                                            <option {{ old('Salary_Range')== 'RM 2001 to RM 3000' ? 'selected':''}}>RM 2001 to RM 3000</option>
                                            <option {{ old('Salary_Range')== 'RM 3001 to RM 4000' ? 'selected':''}}>RM 3001 to RM 4000</option>
                                            <option {{ old('Salary_Range')== 'RM 4001 to RM 5000' ? 'selected':''}}>RM 4001 to RM 5000</option>
                                            <option {{ old('Salary_Range')== 'Above RM 5000' ? 'selected':''}}>Above RM 5000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <input required maxlength="20" value='{{old('Country')}}' type="text" name="Country" class="form-control" placeholder="eg. Malaysia" />
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea maxlength="2500" name="Description" class="form-control" style="resize: none; height: 120px;">{{old('Description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"> 
                                <button type="submit">Save</button>
                                <button type="button" onclick="window.location='{{ url("student/resume/experience") }}'">Cancel</button>
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
        window.onload = function() {
            if($("#error")[0]){
                $("#formButton").click();
            }
        }
    })
    $("#formButton").click(function(){
        $("#addForm").css("display", "block");
    });
    
    function confirmation(){
        return confirm("Do you want to delete this item?");
    } 
    
</script>
@endsection