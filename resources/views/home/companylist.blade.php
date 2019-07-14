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
                        <div class="row">
                        <div class="col-sm-12">
                            &nbsp; &nbsp; Filtering Jobs By Company Name
                            <hr>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-4">
                                <ul>
                                    @if($results->count() != 0)
                                        @foreach($results as $result)
                                            <li><a href="home?name={{ $result->Cmp_Name }}">{{ $result->Cmp_Name }}</a></li>
                                        @endforeach
                                    @else
                                        <li><a href="home?">No company found </a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
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