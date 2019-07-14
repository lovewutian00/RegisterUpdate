@extends('layouts.layout1')

@section('content')

<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('student._student_home_sidebar')
            <div class="col-md-9">
                <div class="box">
                        <br />
                        <h3><i class="fa fa-folder-open-o"></i> Report</h3>
                        <hr />
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Due date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($unsubmit_schedules as $unsubmit)
                                        <tr>
                                            <td></td>
                                            <td><strong>Monthly Report</strong></td>
                                            <td>{{$unsubmit->Sch_Date->format('d-m-Y')}}</td>
                                            @if($unsubmit->Sch_Date->lessThan(now()))
                                            <td><a href="{{ route('report.create',['id'=>$unsubmit->Sch_Id]) }}"><button class="btn btn-danger"> Overdue </button></a></td>
                                            @else
                                            <td><a href="{{ route('report.create',['id'=>$unsubmit->Sch_Id]) }}"><button class="btn btn-default"> Submit </button></a></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        
                                        @foreach($submitted_schedules as $submitted)
                                        <tr>
                                            <td></td>
                                            <td><strong>TODO</strong></td>
                                            <td>{{$submitted->Sch_Date->format('d-m-Y')}}</td>
                                            <td><span class="btn btn-success disabled"> Submited </span></td>
                                        </tr>
                                        @endforeach
       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection