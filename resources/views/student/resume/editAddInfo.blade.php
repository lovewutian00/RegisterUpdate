@extends('layouts.layout1')
@section('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
.salary::-webkit-inner-spin-button, 
.salary::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
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
                    @if(count($addInfoDetail) == 1)
                    @foreach($addInfoDetail as $info)
                    <form method="POST" action="/student/resume/additional_info">
                        {{csrf_field()}}
                        {{method_field('PATCH')}}
                        <input type="hidden" value="additional_info" name="attrb">
                        <input type='hidden' value='{{$info->Add_Info_Id}}' name='Add_Info_Id'>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="col-xs-3"><label>Expected Monthly Salary:</label></div>
                                     <div class="col-xs-1"><label>MYR</label></div>
                                     <div class="col-xs-3"><input value="{{old('Expected_Salary',$info->Expected_Salary)}}" required type='number' name='Expected_Salary' class='form-control salary'></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                     <div class="col-xs-3"><label>Preferred Work Location:</label></div>
                                     <div class="col-xs-6">
                                         <select name='Preferred_Location_one' class='form-control' required>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Anywhere in Malaysia' ? 'selected' : '' }}>Anywhere in Malaysia</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Johor' ? 'selected' : '' }}>Johor</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Penang' ? 'selected' : '' }}>Penang</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Perak' ? 'selected' : '' }}>Perak</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                                             <option {{ old('Preferred_Location_one',$info->Preferred_Location_one) == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
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
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Anywhere in Malaysia' ? 'selected' : '' }}>Anywhere in Malaysia</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Johor' ? 'selected' : '' }}>Johor</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Penang' ? 'selected' : '' }}>Penang</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Perak' ? 'selected' : '' }}>Perak</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                                             <option {{ old('Preferred_Location_two',$info->Preferred_Location_two) == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
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
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Anywhere in Malaysia' ? 'selected' : '' }}>Anywhere in Malaysia</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Johor' ? 'selected' : '' }}>Johor</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Kedah' ? 'selected' : '' }}>Kedah</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Kuala Lumpur' ? 'selected' : '' }}>Kuala Lumpur</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Kelantan' ? 'selected' : '' }}>Kelantan</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Melaka' ? 'selected' : '' }}>Melaka</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Negeri Sembilan' ? 'selected' : '' }}>Negeri Sembilan</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Penang' ? 'selected' : '' }}>Penang</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Pahang' ? 'selected' : '' }}>Pahang</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Perak' ? 'selected' : '' }}>Perak</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Perlis' ? 'selected' : '' }}>Perlis</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Putrajaya' ? 'selected' : '' }}>Putrajaya</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Sabah' ? 'selected' : '' }}>Sabah</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Selangor' ? 'selected' : '' }}>Selangor</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Sarawak' ? 'selected' : '' }}>Sarawak</option>
                                             <option {{ old('Preferred_Location_three',$info->Preferred_Location_three) == 'Terengganu' ? 'selected' : '' }}>Terengganu</option>
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
                                         <input {{ old('Oversea',$info->Oversea) == true ? 'checked' : '' }} type='checkbox' name='Oversea'><label>Preferred Overseas Location</label>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3">Other Information</div>
                                     <div class="col-xs-6">
                                         <textarea name='Other_Info' class="form-control" style="resize: none;">{{ old('Other_Info',$info->Other_Info)}}</textarea>
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