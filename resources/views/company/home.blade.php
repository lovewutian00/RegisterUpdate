@extends('layouts.layout1')

@section ('content')    
<div id="all">
    <div id="content">
        <div class="container">

            <div class="col-md-12">
                <div class="search-form">
                @if(session()->has('message'))
                        <div class="alert alert-success">
                            <b>{{ session()->get('message') }}</b>
                        </div>
                    @endif
                </div>
            </div>
            @include('company._companySidebar')

            <div class="col-md-9">
                

                <div class="box">
                    <p style="font-size: 20px;">Current Jobs List</p>
                    @foreach ($job_posts as $job_post)
                    <div class="box">
                        <a href="{{url('company/jobPostDetail/'.$job_post->Job_Id)}}">{{$job_post->Title}} </a>             
                    <div class="pull-right">
<!--                        <i class="fa fa-user"></i> 5 Applicants &nbsp;                       -->
                        <i class="fa fa-clock-o"></i>{{date('d-m-Y',strtotime($job_post->PostDT))}}
                    </div>
                        
                    </div>
                    @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
 
@stop