@extends('layouts.layout1')
    
@section('content')
    
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
                
            <div class="col-md-8 col-sm-push-2">
                <div class="box">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                    <p class="lead">Company's Detail</p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Company Name</label></div>
                                <div class="col-sm-9"><label class="form-control">{{$company_student->Cmp_Name}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Email:</label></div>
                                <div class="col-sm-9"><label class="form-control">{{$company_student->Email}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Contact:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$company_student->ContactNo}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Address:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$company_student->Address}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Town:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$company_student->Town}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>State:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$company_student->State}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Country:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$company_student->Country}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                    <p class="lead">Person In Charge</p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Name:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$cmp_id->PersonInCharged}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Position:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$cmp_id->PicPosition}}</label></div>
                            </div>
                        </div>
                    </div>
                        
                    <a href="{{ route('stud_Index') }}" class="btn  btn-default">Back</a> 
                        
                    <a href="{{ route('student_Survey') }}" class="btn  btn-default pull-right">Feedback</a> 
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
    
@section('footer')
<script>
    function apply_confirmation(){
        return confirm("Are you sure you want to apply this job?");
    } 
    function delete_confirmation(){
        return confirm('Are you sure you want to delete this application?');
    }
</script>
@endsection