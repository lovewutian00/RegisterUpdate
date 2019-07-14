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
                            &nbsp; &nbsp; Filtering Jobs By Specializations
                            <hr>
                        </div>
                            
                        </div>
                        @if($categories->count() != 0)
                        @foreach($categories as $cat)
                        <div class="col-sm-4 col-md-4">
                            <div class="box">
                            <div style="font-size:14px;"><strong><a href="/home?category={{ $cat->Cat_Id }}">All {{ $cat->Cat_Name }} Jobs</a></strong></div>
                            @if($cat->job_sub_categories->count() != 0)
                            @foreach($cat->job_sub_categories as $sub)
                            <div style="font-size:12px;"><a href="/home?specialization={{ $sub->Sub_Id }}">{{ $sub->Sub_Name }} Jobs</a></div>
                            @endforeach
                            @else
                                <div style="font-size:12px;">No sub category found</div>
                            @endif
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="box">
                            <h3>No category found</h3>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection