@extends('layouts.layout1')

@section ('content')
<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            <div class="col-md-12">
                <div class="search-form">
                @if(session()->has('message'))
                        <div class="alert alert-success">
                            <b>{{ session()->get('message') }}</b>
                        </div>
                    @endif
                </div>
            @include('company._companySidebar')
            <div class="col-md-9">
                <div class="box">
                    <form method="post">
                        <br />
                        <h3><i class="fa fa-users"></i> Internship List</h3>
                        <hr />

                        <div class="row">
                            <div class="col-sm-12">
                            <div class="media">
                               
                                @foreach($students as $data)
                                <div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="/company/info/{{$data->Stud_Id}}">{{$data->LastName}} {{$data->FirstName}}</a></h4>
                                     <button type="button" onclick="window.location.href='/company/evaluation/{{$data->Stud_Id}}'" name="action" class="btn btn-info pull-right"><i class="fa fa-check-square-o"></i>Evaulation</button>                                    
                                     
                                     <button style="margin-right: 10px;" type="button" onclick="window.location.href='/company/viewReportList/{{$data->Stud_Id}}'" name="action" class="btn btn-info pull-right"><i class="fa fa-check-square-o"></i>View Report</button>  
  
                                     <p>Person In Charge: {{(string)$data->PersonInCharged}} </p>
                                    
                                       
                                </div>
                                
                                </div>
                                 @endforeach
                            </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12 text-center">
                               {{\App\company_student::where('Cmp_Id','=',$cid)->count()}} Students Found
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection