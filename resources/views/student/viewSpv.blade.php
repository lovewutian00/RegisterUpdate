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
                                    <p class="lead">Supervisor's Detail</p>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Name</label></div>
                                <div class="col-sm-9"><label class="form-control">{{$student_supervisor->Spv_Name}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Email:</label></div>
                                <div class="col-sm-9"><label class="form-control">{{$student_supervisor->Email}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Gender:</label></div>
                                <div class="col-sm-9"><label class="form-control">{{$student_supervisor->Gender}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-3"><label>Contact:</label></div>
                               <div class="col-sm-9"><label class="form-control">{{$student_supervisor->ContactNo}}</label></div>
                            </div>
                        </div>
                    </div>
                        
                    <a href="{{ route('stud_Index') }}" class="btn  btn-default">Back</a> 
                        
                        
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