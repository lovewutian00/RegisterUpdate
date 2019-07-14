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
                    <form method="post">
                        <div class="pull-right">
                            <img src="~/img/face.png" class="img-circle" style="width:100px">
                        </div>
                        <br />
                        <br />
                        <h3><i class="fa fa-check-square-o"></i> Acceptance Letter: Student Name</h3>
                        <hr />
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="text" class="form-control" placeholder="Enter Company Name">
                                    <textarea class="form-control" style="resize: none; height: 150px;" placeholder="Enter Company Address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <br />
                                    <div class="col-md-1">
                                        <label class="control-label col-sm-1">Date:</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <br /><span>Industrial Training Panel Coordinator/Ms. Wong Mung Lan </span>
                                    <br /><span>Faculty of Computing and Information Technology</span>
                                    <br /><span>Tunku Abdul Rahman University College</span>
                                    <br /><span>P.O. Box 10979</span>
                                    <br /><span>50932 Kuala Lumpur</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <br /><br /><span>Dear Ms Mah,</span>
                                    <br /><strong><u>Industrial Training Programme</u></strong>
                                    <p>With reference to the above, we wish to inform you that:</p>
                                </div>
                                <div class="col-md-12">
                                    1. We are able to accept <strong>Ooi Lun Tat, 00XXX00000</strong> for practical training in our organisation
                                    <br />
                                    <br />
                                </div>
                                <div class="col-md-12">
                                    <label> from </label>
                                    <input type="date" class="" />
                                    <label> to </label>
                                    <input type="date" class="" />
                                    <label> .(12weeks/24weeks*)  </label>
                                </div>
                                <br />
                                <div class="col-md-12">
                                    <hr />
                                    <p>
                                        2. The student will report to <input type="text" placeholder="Supervisor Name" /> of <input type="text" placeholder="Department Name" />.
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <hr />
                                    <p>
                                        3. Nature of work(s) (Please tick (√) whichever apply):
                                    </p>
                                    <div class="row">
                                        <input type="checkbox" />Science & Mathematics based:
                                        <br />
                                        <textarea class="form-control" style="resize: none; height: 100px;" placeholder="Computer Science/Management Mathematics, etc"></textarea>
                                    </div>
                                    <div class="row">
                                        <input type="checkbox" /> ICT based:
                                        <br />
                                        <textarea class="form-control" style="resize: none; height: 100px;"
                                                  placeholder="Programming/Networking/ Technical/System Support/ Internet Security/Games Technology, etc &#10;[Please indicate the programming languages/databases used, if relevant] "></textarea>
                                    </div>
                                    <div class="row">
                                        <input type="checkbox" />Other related tasks
                                        <br />
                                        <textarea class="form-control" style="resize: none; height: 100px;" placeholder="Not applicable for sales and marketing"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>4. Allowance per month</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>5. Working Days:</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="eg. Monday – Friday" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>6. Working Hours</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="eg .9am – 5pm" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>7. Travelling required ?</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="checkbox" /><label>&nbsp;No&nbsp;&nbsp;&nbsp;</label>
                                            <input type="checkbox" /><label>&nbsp;Yes, Location: </label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>8. Travelling allowance</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="if any" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>9. Accommodation provided ?</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="checkbox" /><label>&nbsp;No&nbsp;&nbsp;&nbsp;</label>
                                            <input type="checkbox" /><label>&nbsp;Yes, Address: </label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>Location of training</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="if different from the company addrress in pg 1" />
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label>11. Other job requirements / conditions</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr />
                                    <p>We fully understand that we are not allowed to request, use or borrow any form 
                                    of resources (e.g. Laptop, PC, Software, etc) which belong to the students, to be used for performing any organisational related tasks, 
                                    whether at the office, customer's place or home.</p>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Designation</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Email Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Tel Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Fax Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label class="control-label col-sm-2">Co Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Signature</label>
                                    <div>
                                        <input type="file" accept="image/*" capture style="display:none" />
                                        <img src="~/img/signature.jpg" style="cursor:pointer; width:120px; height:120px" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="control-label">Official Stamp with address</label>
                                    <div>
                                        <input type="file" accept="image/*" capture style="display:none" />
                                        <img src="~/img/stamp.png" style="cursor:pointer; width:120px; height:120px" />
                                    </div>
                                </div>
                            </div>
                            <br />
                        </div>
                        <hr />
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label>I hereby agree to accept the above offer,</label>
                                    <br /><br />
                                    <div class="col-md-12">
                                        <label class="control-label col-sm-2">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="control-label col-sm-2">Date</label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Student's Signature</label>
                                    <div>
                                        <input type="file" accept="image/*" capture style="display:none" />
                                        <img src="~/img/signature.jpg" style="cursor:pointer; width:120px; height:120px" />
                                    </div>
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