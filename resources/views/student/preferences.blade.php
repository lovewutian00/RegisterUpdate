@extends ('layouts.layout1')
    
@section('header')
<style>
</style>
@endsection
    
@section('content')
<div class="all">
    <div class="content">
        <div class='container'>
            <br />
            <br />
            @include('student._student_home_sidebar')
            <div class="col-md-9">
                <div class="box">
                    <p style="font-size: 20px;">Preferences</p>
                    @if(empty($preferenceDetail))
                    <form method="POST" action="/student/preference">
                        {{csrf_field()}}
                        <input type="hidden" value="preference" name="attrb">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"><label>Keyword</label></div>
                                    <div class="col-xs-6">
                                        <input type='text' required class='form-control' name='Keyword_1' placeholder="Keyword 1" value="{{old('Keyword_1')}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_2' placeholder="Keyword 2 (optional)" value="{{old('Keyword_2')}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_3' placeholder="Keyword 3 (optional)" value="{{old('Keyword_3')}}" > 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_4' placeholder="Keyword 4 (optional)"value="{{old('Keyword_4')}}" > 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_5' placeholder="Keyword 5 (optional)" value="{{old('Keyword_5')}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"><label>Location</label></div>
                                    <div class="col-xs-6">
                                        <input type='text' required class='form-control' name='Location_1' placeholder="Location 1" value="{{old('Location_1')}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Location_2' placeholder="Location 2 (optional)" value="{{old('Location_2')}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Location_3' placeholder="Location 3 (optional)" value="{{old('Location_3')}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3">Job Type</div>
                                    <div class="col-xs-6">
                                        <select name='Job_Type_1' class='form-control' required>
                                            <option value="" selected="selected" >-Job Type 1-</option>
                                            <option {{ old('Job_Type_1') == 'Internship' ? 'selected' : ''}}>Internship</option>
                                            <option {{ old('Job_Type_1') == 'Diploma' ? 'selected' : ''}}>Diploma</option>
                                            <option {{ old('Job_Type_1') == 'Bachelor Degree' ? 'selected' : ''}}>Bachelor Degree</option>
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
                                        <select name='Job_Type_2' class='form-control'>
                                            <option value="" selected="selected">-Job Type 2 (optional)-</option>
                                            <option {{ old('Job_Type_2') == 'Internship' ? 'selected' : ''}}>Internship</option>
                                            <option {{ old('Job_Type_2') == 'Diploma' ? 'selected' : ''}}>Diploma</option>
                                            <option {{ old('Job_Type_2') == 'Bachelor Degree' ? 'selected' : ''}}>Bachelor Degree</option>>
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
                                        <select name='Job_Type_3' class='form-control'>
                                            <option value="" selected="selected">-Job Type 3 (optional)-</option>
                                            <option {{ old('Job_Type_3') == 'Internship' ? 'selected' : ''}}>Internship</option>
                                            <option {{ old('Job_Type_3') == 'Diploma' ? 'selected' : ''}}>Diploma</option>
                                            <option {{ old('Job_Type_3') == 'Bachelor Degree' ? 'selected' : ''}}>Bachelor Degree</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-12"> 
                                <button type="submit">Save</button> 
                                <button type="button" onclick="window.location='{{ url("student") }}'">Cancel</button>
                            </div>
                        </div>
                    </form>
                    
                    @else
                    
                    <form method="POST" action="/student/preference">
                        {{csrf_field()}}
                        <input type="hidden" value="preference" name="attrb">
                        
                        {{method_field('PATCH')}}
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"><label>Keyword</label></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_1' placeholder="Keyword 1" value="{{old('Keyword_1',$preferenceDetail->Keyword_1)}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_2' placeholder="Keyword 2 (optional)" value="{{old('Keyword_2',$preferenceDetail->Keyword_2)}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_3' placeholder="Keyword 3 (optional)" value="{{old('Keyword_3',$preferenceDetail->Keyword_3)}}" > 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_4' placeholder="Keyword 4 (optional)"value="{{old('Keyword_4',$preferenceDetail->Keyword_4)}}" > 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Keyword_5' placeholder="Keyword 5 (optional)" value="{{old('Keyword_5',$preferenceDetail->Keyword_5)}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"><label>Location</label></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Location_1' placeholder="Location 1" value="{{old('Location_1',$preferenceDetail->Location_1)}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Location_2' placeholder="Location 2 (optional)" value="{{old('Location_2',$preferenceDetail->Location_2)}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3"></div>
                                    <div class="col-xs-6">
                                        <input type='text' class='form-control' name='Location_3' placeholder="Location 3 (optional)" value="{{old('Location_3',$preferenceDetail->Location_3)}}"> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="col-xs-3">Job Type</div>
                                    <div class="col-xs-6">
                                        <select name='Job_Type_1' class='form-control'>
                                            <option value="" selected="selected" >-Job Type 1-</option>
                                            <option {{ old('Job_Type_1',$preferenceDetail->Job_Type_1) == 'Internship' ? 'selected' : ''}}>Internship</option>
                                            <option {{ old('Job_Type_1',$preferenceDetail->Job_Type_1) == 'Diploma' ? 'selected' : ''}}>Diploma</option>
                                            <option {{ old('Job_Type_1',$preferenceDetail->Job_Type_1) == 'Bachelor Degree' ? 'selected' : ''}}>Bachelor Degree</option>
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
                                        <select name='Job_Type_2' class='form-control'>
                                            <option value="" selected="selected">-Job Type 2 (optional)-</option>
                                            <option {{ old('Job_Type_2',$preferenceDetail->Job_Type_2) == 'Internship' ? 'selected' : ''}}>Internship</option>
                                            <option {{ old('Job_Type_2',$preferenceDetail->Job_Type_2) == 'Diploma' ? 'selected' : ''}}>Diploma</option>
                                            <option {{ old('Job_Type_2',$preferenceDetail->Job_Type_2) == 'Bachelor Degree' ? 'selected' : ''}}>Bachelor Degree</option>>
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
                                        <select name='Job_Type_3' class='form-control'>
                                            <option value="" selected="selected">-Job Type 3 (optional)-</option>
                                            <option {{ old('Job_Type_3',$preferenceDetail->Job_Type_3) == 'Internship' ? 'selected' : ''}}>Internship</option>
                                            <option {{ old('Job_Type_3',$preferenceDetail->Job_Type_3) == 'Diploma' ? 'selected' : ''}}>Diploma</option>
                                            <option {{ old('Job_Type_3',$preferenceDetail->Job_Type_3) == 'Bachelor Degree' ? 'selected' : ''}}>Bachelor Degree</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-sm-12"> 
                                <button type="submit">Save</button> 
                                <button type="button" onclick="window.location='{{ url("student") }}'">Cancel</button>
                            </div>
                        </div>
                    </form>
                    @endif
                        
                </div>
                <div class="row">
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
</div>
    
@endsection