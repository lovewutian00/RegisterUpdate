@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')

            <div class="col-md-9">
                <div class="box">
                    <div class="pull-right">
                        <img src="~/img/face.png" style="cursor:pointer; width:150px; height:150px" />
                    </div>
                    <h1>Info</h1>
                    <p class="lead">Student Personal Detail</p>

                    @*-----------Personal Details-----------*@
                    <form method="post">
                        <h3>Personal Details</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <div  type="text" class="well well-sm form-control"><?php echo $student->FirstName ?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->LastName ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>IC / Passport</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->IcNo?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date of Birth</label>
                                    <div type="text" class="well well-sm form-control">Date of Birth</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div type="text" class="well well-sm form-control">Male/Female</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Race</label>
                                    <div type="text" class="well well-sm form-control">Chinese</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->ContactNo?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>College Email</label>
                                    <div type="text" class="well well-sm form-control">xxx@student.tarc.edu.my</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Personal Email</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Email?></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address 1</label>
                                    <div type="text" class="well well-sm form-control">No.xx, Jalan xxx,</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address 2</label>
                                    <div type="text" class="well well-sm form-control">Taman xxx</div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <div type="text" class="well well-sm form-control">xxx</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Postcode</label>
                                    <div type="text" class="well well-sm form-control">00000</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>State</label>
                                    <div type="text" class="well well-sm form-control">xxxx</div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <div type="text" class="well well-sm form-control">Malaysia</div>
                                </div>
                            </div>
                        </div>
                    </form>


                    @* Below not changing. Use the class above. *@
                    @*-----------Additional Info-----------*@
                    <form method="post">
                        <h3>Additional Info</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Expected Salary</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Expected_Salary?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Preffered Working Location</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Preffered_Location_one?></div>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Preffered_Location_two?></div>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Preffered_Location_three?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Others</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Preferred_Location_three?></div>
                                </div>
                            </div>
                        </div>
                    </form>

                    @*-----------Education-----------*@
                    <form method="post">
                        <h3>Educations</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-1"><label>From</label></div>
                                    
                                </div>
                            </div>
                            <br /><br />
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-1"><label>To</label></div>
                                    
                            </div>
                            <br /><br /><br />
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Qualification</label>
                                    <div type="text" class="well well-sm form-control"><?php echo $student->Qualification?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Field of Study</label>
                                     <div type="text" class="well well-sm form-control"><?php echo $student->Field_Od_study?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Programme</label>
                                     <div type="text" class="well well-sm form-control"><?php echo $student->Major?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Institute</label>
                                     <div type="text" class="well well-sm form-control"><?php echo $student->University?></div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Grade</label>
                                     <div type="text" class="well well-sm form-control"><?php echo $student->Grade?></div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Referer</label>
                                    <input type="text" class="form-control" placeholder="eg. Dr Aaron" />
                                </div>
                            </div>
                        </div>
                    </form>

                    @*-----------Experience-----------*@
                    <form method="post">
                        <h3>Experiences</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-1"><label>From</label></div>
                                    <div class="col-xs-2">
                                        <select class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <select class="form-control">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2">
                                        <select class="form-control">
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br /><br />
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-1"><label>To</label></div>
                                    <div class="col-xs-2">
                                        <select class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <select class="form-control">
                                            <option value="1">January</option>
                                            <option value="2">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-2">
                                        <select class="form-control">
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br /><br /><br />
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" placeholder="eg. Google" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Industry</label>
                                    <select class="form-control">
                                        <option value="" selected="selected">Please Select</option>
                                        <optgroup label="Human services">
                                            <option value="59">Environment / Health / Safety</option>
                                            <option value="56">Government / Defence</option>
                                            <option value="55">Hotel / Hospitality</option>
                                            <option value="58">Library / Museum</option>
                                            <option value="57">Social Services / NGO</option>
                                            <option value="60">Sports</option>
                                        </optgroup>
                                        <optgroup label="Information services">
                                            <option value="54">Education</option>
                                            <option value="51">Engineering / Technical Consulting</option>
                                            <option value="49">IT / Hardware</option>
                                            <option value="50">IT / Software</option>
                                            <option value="53">R&amp;D</option>
                                            <option value="52">Science &amp; Technology</option>
                                        </optgroup>
                                        <optgroup label="Manufacturing">
                                            <option value="16">Automobile / Automotive</option>
                                            <option value="17">Aviation / Airline</option>
                                            <option value="15">BioTech / Pharmaceutical</option>
                                            <option value="12">Chemical / Fertilizers</option>
                                            <option value="14">Construction / Building</option>
                                            <option value="13">Consumer Products / FMCG</option>
                                            <option value="20">Electrical &amp; Electronics</option>
                                            <option value="8">Food &amp; Beverage</option>
                                            <option value="18">Gems / Jewellery</option>
                                            <option value="21">Heavy Industrial / Machinery</option>
                                            <option value="10">Manufacturing / Production</option>
                                            <option value="22">Semiconductor</option>
                                            <option value="9">Textiles / Garment</option>
                                            <option value="11">Tobacco</option>
                                            <option value="19">Utilities / Power</option>
                                        </optgroup>
                                        <optgroup label="Raw materials">
                                            <option value="5">Agriculture / Poultry / Fisheries</option>
                                            <option value="7">Marine / Aquaculture</option>
                                            <option value="2">Mining</option>
                                            <option value="3">Oil / Gas / Petroleum</option>
                                            <option value="4">Polymer / Rubber</option>
                                            <option value="6">Wood / Fibre / Paper</option>
                                        </optgroup>
                                        <optgroup label="Services">
                                            <option value="25">Accounting / Tax Services</option>
                                            <option value="26">Advertising / Marketing / PR</option>
                                            <option value="24">Apparel</option>
                                            <option value="27">Architecture / Interior Design</option>
                                            <option value="28">Arts / Design / Fashion</option>
                                            <option value="29">Banking / Finance</option>
                                            <option value="43">Beauty / Fitness</option>
                                            <option value="30">Business / Mgmt Consulting</option>
                                            <option value="42">Call Center / BPO</option>
                                            <option value="44">Entertainment / Media</option>
                                            <option value="45">Exhibitions / Event Mgmt</option>
                                            <option value="33">General &amp; Wholesale Trading</option>
                                            <option value="34">Healthcare / Medical</option>
                                            <option value="32">HR Mgmt / Consulting</option>
                                            <option value="31">Insurance</option>
                                            <option value="46">Journalism</option>
                                            <option value="35">Law / Legal</option>
                                            <option value="23">Printing / Publishing</option>
                                            <option value="41">Property / Real Estate</option>
                                            <option value="47">Repair / Maintenance</option>
                                            <option value="36">Retail / Merchandise</option>
                                            <option value="37">Security / Law Enforcement</option>
                                            <option value="38">Stockbroking / Securities</option>
                                            <option value="48">Telecommunication</option>
                                            <option value="40">Transportation / Logistics</option>
                                            <option value="39">Travel / Tourism</option>
                                        </optgroup>
                                        <optgroup label="Other">
                                            <option value="1">Other</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Position Level</label>
                                    <select class="form-control">
                                        <option disabled="disabled" value="" selected="selected">Please Select</option>
                                        <option value="8">Internship</option>
                                        <option value="1">Fresh Graduate</option>
                                        <option value="2">Non-Executive/Clerical</option>
                                        <option value="3">Executive</option>
                                        <option value="4">Senior Executive</option>
                                        <option value="5">Manager</option>
                                        <option value="6">Senior Manager</option>
                                        <option value="7">Top Management</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Position Title</label>
                                    <input type="text" placeholder="eg. Back-End Developer" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Salary Range</label>
                                    <select class="form-control">
                                        <option value="#" selected="selected">Please Select</option>
                                        <option value="1">Below RM 1000</option>
                                        <option value="2">RM 1000 to RM 2000</option>
                                        <option value="3">RM 2001 to RM 3000</option>
                                        <option value="3">RM 3001 to RM 4000</option>
                                        <option value="3">RM 4001 to RM 5000</option>
                                        <option value="4">Above RM 5000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Referer</label>
                                    <input type="text" class="form-control" placeholder="eg. Mr Lim" />
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" style="resize: none; height: 120px;"></textarea>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection