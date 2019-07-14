@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')

            <div class="col-md-9">
                <div class="form-group">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="box">
                    <form method="POST" action="{{ route('company_profile.submit') }}" aria-label="{{ __('company_profile.submit') }}" enctype="multipart/form-data">
                    @csrf
                        <div class="pull-right">
                            <img id="click_file" src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $user->Cmp_Name).'/'.$user->Avatar)}}" style="width:180px;height:150px;" />
                        </div>
                        <br />
                        <h3>Company Profile</h3>
                        <hr />
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="Cmp_Name">Company Name:</label>
                                    <input type="text" class="form-control{{ $errors->has('Cmp_Name') ? ' is-invalid' : '' }}" 
                                           id="Cmp_Name" name="Cmp_Name" value="{{ old('Cmp_Name')?old('Cmp_Name'):$user->Cmp_Name }}" maxlength="50" required autofocus />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="PICName">Contact Person</label>
                                    <input type="text" class="form-control{{ $errors->has('PICName') ? ' is-invalid' : '' }}" 
                                           id="PICName" name="PICName" value="{{ old('PICName')?old('PICName'):$user->PICName }}" maxlength="30" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="PICPosition">Position</label>
                                    <input type="text" class="form-control{{ $errors->has('PICPosition') ? ' is-invalid' : '' }}" 
                                           id="PICPosition" name="PICPosition" value="{{ old('PICPosition')?old('PICPosition'):$user->PICPosition }}" maxlength="30" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="ContactNo">Contact No</label>
                                    <input type="text" class="form-control{{ $errors->has('ContactNo') ? ' is-invalid' : '' }}" 
                                           id="ContactNo" name="ContactNo" value="{{ old('ContactNo')?old('ContactNo'):$user->ContactNo }}" maxlength="30" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <div class="{{ $user->Email?'well well-sm':'well well-md' }}">{{ $user->Email }}</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Document"> Document [ Update ]</label>
                                    <input type="file" name="Document[]" id="Document[]"  multiple/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control{{ $errors->has('Address') ? ' is-invalid' : '' }}" 
                                               id="Email" name="Address" value="{{ old('Address')?old('Email'):$user->Address }}" maxlength="50" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="Document">Company Logo [ Update ]</label>
                                <input type="file" name="Avatar" id="Avatar"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="City">City</label>
                                    <input type="text" class="form-control{{ $errors->has('Town') ? ' is-invalid' : '' }}" 
                                           id="Town" name="Town" value="{{ old('Town')?old('Town'):$user->Town }}" maxlength="25"  />
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="State">State</label>
                                    <input type="text" class="form-control{{ $errors->has('State') ? ' is-invalid' : '' }}" 
                                           id="State" name="State" value="{{ old('State')?old('State'):$user->State }}" maxlength="25" />
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="Country">Country</label>
                                    <input type="text" class="form-control{{ $errors->has('Country') ? ' is-invalid' : '' }}" 
                                           id="Country" name="Country" value="{{ old('Country')?old('Country'):$user->Country }}" maxlength="25" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-ok"></i> Save</button>
                                        <a href="/company/profile" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Return</a>
                                    </center>
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