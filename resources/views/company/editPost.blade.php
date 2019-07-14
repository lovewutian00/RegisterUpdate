@extends('layouts.layout1')

@section('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
           @include('company._companySidebar')

            <div class="col-md-9">
                <div class="box">
                    <form method="post" action="../editPost/{{$job->Job_Id}}/update" >
                            {{csrf_field()}}
                            {{ method_field('patch') }}
                        <h3>Job Posting</h3>
                        <hr />
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h4>Job Title</h4>
                                    <input type="text" name="title" value="{{$job->Title}}" class="form-control" placeholder="eg. Web Developer" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h4>Qualification</h4>
                                    <input type="text" name="qualification" value="{{$job->Qualification}}" class="form-control" placeholder="eg. Fresh Graduate" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <h4>Salary (RM)</h4>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{$job->MinAllowance}}"  name="minAllowance" class="form-control" />
                                    </div>
                                    <div class="col-sm-2">
                                        <span style="font-size: 18px;">to</span>
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text" value="{{$job->MaxAllowance}}" name="maxAllowance" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h4>Job Description</h4>
                                    <textarea rows="8" name="description" style="resize: none;" class="form-control">{{$job->Descript}}</textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <h4>Job Detail</h4>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Working Location</label>
                                    <select name="location" selected="{{$job->Location}}"class="form-control">
                                        <option value="Johor">Johor</option>
                                        <option value="Kedah">Kedah</option>
                                        <option value="Kelantan">Kelantan</option>
                                        <option value="Kuala Lumpur">Kuala Lumpur</option>
                                        <option value="Labuan">Labuan</option>
                                        <option value="Melaka">Melaka</option>
                                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                                        <option value="Pahang">Pahang</option>
                                        <option value="Penang">Penang</option>
                                        <option value="Perak">Perak</option>
                                        <option value="Perlis">Perlis</option>
                                        <option value="Putrajaya">Putrajaya</option>
                                        <option value="Sabah">Sabah</option>
                                        <option value="Sarawak">Sarawak</option>
                                        <option value="Selangor">Selangor</option>
                                        <option value="Terengganu">Terengganu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Processing Time</label>
                                    <input type="text" value="{{$job->ProcessTime}}" name="processTime" class="form-control" placeholder="eg. 3 Days" />
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Dress Code</label>
                                    <input type="text" value="{{$job->DressCode}}" name="dressCode" class="form-control" placeholder="eg. Smart Casual" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Benefits</label>
                                    <input type="text" value="{{$job->Benefits}}" name="Benefits" class="form-control" placeholder="eg. Medical, Insurance" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Working Days</label>
                                    <input type="text" value="{{$job->WorkingDays}}" name="WorkingDays" class="form-control" placeholder="eg. Mondays - Fridays" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Working Hours</label>
                                    <input type="text" value="{{$job->WorkingHours}}" name="WorkingHours" class="form-control" placeholder="eg. 9am to 6pm" />
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" name="action" value="Post" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                                <a href="{{url('company/jobPostDetail/'.$job->Job_Id)}}" name="action" value="Cancel" class="btn btn-danger"><i class="fa fa-refresh"></i> Back</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@stop
