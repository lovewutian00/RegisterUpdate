@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">
            @include('home._search_bar')
            @include('home._search_sidebar')
            <div class="col-md-9">
                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            Showing <strong>1</strong> to <strong>20</strong> jobs
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                <form class="form-inline">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-number">
                                            <strong>Show</strong>
                                            <a href="#" class="btn btn-default btn-sm">6</a>
                                            <a href="#" class="btn btn-default btn-sm">12</a>
                                            <a href="#" class="btn btn-default btn-sm">All</a> jobs
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="products-sort-by">
                                            <strong>Sort by</strong>

                                            <select id="UrlList" name="sort-by" class="form-control" onchange="doNavigate()">
                                                <option value="date">Date</option>
                                                <option value="salary">Salary</option>
                                            </select>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    @if($results->count() != 0)
                        @foreach($results as $result)
                        <div class="box">
                            <div class="pull-right">
                                <img src="{{ asset('storage/Avatars/'.preg_replace('/\s+/', '', $result->Company->Cmp_Name ).'/'.$result->Company->Avatar)}}" style="width:200px;height:150px;" />
                            </div>
                            <p style="font-size: 25px;">{{ $result->Title }}</p>
                            <p style="font-size: 18px;">{{ $result->Company->Cmp_Name }}</p>
                            <p style="font-size: 12px;"><i class="glyphicon glyphicon-usd"></i> {{ $result->MinAllowance }} - <i class="glyphicon glyphicon-usd"></i>{{ $result->MaxAllowance }}</p>
                            <p><i class="fa fa-map-marker"></i> {{ $result->Location }}</p>
                            <p style="font-size: 12px;"><i class="glyphicon glyphicon-time"></i> {{ Carbon\Carbon::parse($result->PostDT)->diffForHumans() }}</p>
                            @if(Auth::guard('student')->check())
                            <a href="{{ route('jobDetails',['id'=>$result->Job_Id]) }}" class="btn  btn-default">View</a>
                            @endif
                        </div>
                        @endforeach
                    @else
                    <div class="box" style="height:1200px">
                        <h4>Sorry, your search did not match any jobs</h4>
                    </div>
                    @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="Filter" aria-hidden="true">
    <div class="modal-dialog modal-sm">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="Login">Filters</h4>
            </div>
            <div class="modal-body">

                <form>
                    <div class="form-group">
                        <label>Location</label>
                        <select id="location" class="form-control">
                            <option value="#" selected="selected">Select location</option>
                            <optgroup label="Malaysia">
                                <option value="#">Kuala Lumpur</option>
                                <option value="#">Johor</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="location" class="form-control">
                            <option value="#" selected="selected">Select category</option>
                            <optgroup label="Computer/Information Technology">
                                <option value="#">IT - Hardware</option>
                                <option value="#">IT - Software</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Job Level</label>
                        <select id="location" class="form-control">
                            <option value="#" selected="selected">Select job level</option>
                            <option value="#">Fresh Graduate</option>
                            <option value="#">Internship</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Experience</label>
                        <select id="location" class="form-control">
                            <option value="#" selected="selected">Select job experience</option>
                            <option value="#">Less than 1 year</option>
                            <option value="#">1 to 2 years</option>
                        </select>
                    </div>

                    <p class="text-center">
                        <button class="btn btn-danger" onclick="">Reset Filters</button>
                        <button class="btn btn-success" onclick="">Apply Filters</button>
                    </p>
                </form>

                <br />
            </div>
        </div>
    </div>
</div>
 
@endsection