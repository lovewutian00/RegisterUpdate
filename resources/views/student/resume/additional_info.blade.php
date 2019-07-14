@extends('layouts.layout1')
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.salary::-webkit-inner-spin-button, 
.salary::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
#add_info{
    width: 60%;
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
                    <p style="font-size: 20px;">Additional Information
                        @if(count($addInfoDetail) == 1)
                        <a href="{{ route('editAddInfo') }}" class="btn  btn-default">Edit</a>
                        @endif
                    </p>  
                    @if(count($addInfoDetail) < 1)
                    <form method="POST" action="/student/resume/additional_info">
                        {{csrf_field()}}
                        <input type="hidden" value="additional_info" name="attrb">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="col-xs-3"><label>Expected Monthly Salary:</label></div>
                                     <div class="col-xs-1"><label>MYR</label></div>
                                     <div class="col-xs-3"><input required type='number' name='Expected_Salary' class='form-control salary'></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="col-xs-3"><label>Preferred Work Location:</label></div>
                                     <div class="col-xs-6">
                                         <select name='Preferred_Location_one' class='form-control' required>
                                             <option value="" selected="selected">- Preferred Location One -</option>
                                             <option>Anywhere in Malaysia</option>
                                             <option>Johor</option>
                                             <option>Kedah</option>
                                             <option>Kuala Lumpur</option>
                                             <option>Kelantan</option>
                                             <option>Melaka</option>
                                             <option>Negeri Sembilan</option>
                                             <option>Penang</option>
                                             <option>Pahang</option>
                                             <option>Perak</option>
                                             <option>Perlis</option>
                                             <option>Putrajaya</option>
                                             <option>Sabah</option>
                                             <option>Selangor</option>
                                             <option>Sarawak</option>
                                             <option>Terengganu</option>
                                         </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="col-xs-3"></div>
                                     <div class="col-xs-6">
                                         <select name='Preferred_Location_two' class='form-control'>
                                             <option value="" selected="selected">- Preferred Location Two (optional) -</option>
                                             <option>Anywhere in Malaysia</option>
                                             <option>Johor</option>
                                             <option>Kedah</option>
                                             <option>Kuala Lumpur</option>
                                             <option>Kelantan</option>
                                             <option>Melaka</option>
                                             <option>Negeri Sembilan</option>
                                             <option>Penang</option>
                                             <option>Pahang</option>
                                             <option>Perak</option>
                                             <option>Perlis</option>
                                             <option>Putrajaya</option>
                                             <option>Sabah</option>
                                             <option>Selangor</option>
                                             <option>Sarawak</option>
                                             <option>Terengganu</option>
                                         </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="col-xs-3"></div>
                                     <div class="col-xs-6">
                                         <select name='Preferred_Location_three' class='form-control'>
                                             <option value="" selected="selected">- Preferred Location Three (optional) -</option>
                                             <option>Anywhere in Malaysia</option>
                                             <option>Johor</option>
                                             <option>Kedah</option>
                                             <option>Kuala Lumpur</option>
                                             <option>Kelantan</option>
                                             <option>Melaka</option>
                                             <option>Negeri Sembilan</option>
                                             <option>Penang</option>
                                             <option>Pahang</option>
                                             <option>Perak</option>
                                             <option>Perlis</option>
                                             <option>Putrajaya</option>
                                             <option>Sabah</option>
                                             <option>Selangor</option>
                                             <option>Sarawak</option>
                                             <option>Terengganu</option>
                                         </select>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                     <div class="col-xs-6">
                                         <input type='checkbox' name='Oversea'><label>Preferred Overseas Location</label>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3">Other Information</div>
                                     <div class="col-xs-6">
                                         <textarea name='Other_Info' class="form-control" style="resize: none;"></textarea>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-sm-12"> 
                                <button type="submit">Save</button> 
                                <button type="button" onclick="window.location='{{ url("student/resume/additional_info") }}'">Cancel</button>
                            </div>
                        </div>
                    </form>
                    @else
                    @foreach($addInfoDetail as $info)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <div class="col-xs-3"><label>Expected Monthly Salary:</label></div>
                                 <div class="col-xs-3"><label>RM {{$info->Expected_Salary}}</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <div class="col-xs-3"><label>Preferred Work Location:</label></div>
                                 <div class="col-xs-6">
                                     {{$info->Preferred_Location_one}}
                                 </div>
                            </div>
                        </div>
                    </div>
                    @if($info->Preferred_Location_two != null)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <div class="col-xs-3"></div>
                                 <div class="col-xs-6">
                                     {{$info->Preferred_Location_two}}
                                 </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($info->Preferred_Location_three != null)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <div class="col-xs-3"></div>
                                 <div class="col-xs-6">
                                     {{$info->Preferred_Location_three}}
                                 </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if($info->Oversea != false)
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <div class="col-xs-3"></div>
                                 <div class="col-xs-6">
                                     Preferred Oversea Location
                                 </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-xs-3">Other Information</div>
                                 <div class="col-xs-6" id='add_info'>
                                     @if($info->Other_Info != null)
                                        {{$info->Other_Info}}
                                     @else
                                        -
                                     @endif
                                 </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
</script>
@endsection