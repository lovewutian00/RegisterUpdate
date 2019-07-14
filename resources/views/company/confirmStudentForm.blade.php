@extends('layouts.layout1')

@section('header')
<style>
.desc_css{
    table-layout: fixed;
    width: 100%;
}
.desc_css tr td{
    word-wrap:break-word;
}
</style>
@endsection

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">
            <br />
            <br />
            @include('company._companySidebar')           
            <div class="col-md-9">
                <div class="box">
                    <form method="post" action="/company/confirmStudentForm/{{$student->Stud_Id}}/{{$job->Job_Id}}">
                        {{csrf_field()}}
                        {{ method_field('patch') }}
                        <div class="pull-right">
                            <img src="~/img/face.png" class="img-circle" style="width:100px">
                        </div>
                        <br />
                        <br />
                        <h3><i class="fa fa-check-square-o"></i> Acceptance Form: Student Name</h3>
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
                        <div class="form-group">
                        <div class="col-md-12">
                            <table>
                                <tr>
                                    <td>Student Name :</td>
                                    <td><strong>{{$student->FirstName." ".$student->LastName}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Supervisor :</td>
                                    <td><input class="form-control" type="text" name="PersonInCharged" required placeholder="Supervisor Name" /></td>
                                </tr>
                                <tr>
                                    <td>Supervisor Position :</td>
                                    <td><input class="form-control" type="text" name="PicPosition" required placeholder="Department Name" /></td>
                                </tr>
                                <tr>
                                    <td>Nature Of Work:</td>
                                    <td><strong>{{$job->Descript}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Allowance Per Month (RM) :</td>
                                    <td><input class="form-control" type="text" required name="Allowance" placeholder="eg: 1500"></td>
                                </tr>
                                <tr>
                                    <td>Working Days :</td>
                                    <td><strong>{{$job->WorkingDays}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Working Hours :</td>
                                    <td><strong>{{$job->WorkingHours}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Dress Code :</td>
                                    <td><strong>{{$job->DressCode}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                    <div class="row">
                                    <div class="col-sm-12 text-center">
                                    <button type="submit" name="action" value="Post" class="btn btn-primary"><i class="fa fa-save"></i> Confirm</button>
                                    <a href="/company/companyHome" name="action" value="Cancel" class="btn btn-danger"><i class="fa fa-refresh"></i> Cancel</a>
                                    </div>
                                    </div>
                                    <td>
                                </tr>
                            </table>
                        </div>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
