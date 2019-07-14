@extends('layouts.layout1')

@section ('content')    
<div id="all">
    <div id="content">
        <div class="container">

            <br>        

            <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-calendar-check-o"></i> Upcoming invite(s) <span class="badge pull-right">5</span></h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li><a href="#">Invite 1</a></li>
                            <li><a href="#">Invite 2</a></li>
                            <li><a href="#">Invite 3</a></li>
                            <li><a href="#">Invite 4</a></li>
                            <li><a href="#">Invite 5</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="col-md-9">
                <div class="box info-bar">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 products-showing">
                            <strong>What would you like to do?</strong>
                        </div>

                        <div class="col-sm-12 col-md-8  products-number-sort">
                            <div class="row">
                                    <div class="col-md-10 col-sm-10">
                                        <div class="products-number">                                     
                                            <a href="/admin/supervisorList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Supervisor List</a>
                                            <a href="/admin/studentList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Student List</a>
                                            <a href="/admin/companyVisitList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Company List</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>    
                
                <div class="col-md-12">       
                     @if($message = Session::get('Success'))
                    <div class='alert alert-success'>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if($message = Session::get('Warning'))
                    <div class='alert alert-warning'>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                <div class="box">
                    <hr>
                    
                    <p style="font-size: 20px;">Company Document</p>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-sm-2'>
                                <button class="btn btn-default"><a href='/admin/viewCompany/{{ $id }}'> Return </a></button>
                                
                            </div>
                        </div><div class='row'>
                            <div class='col-sm-10'>
                                <hr>
                                @if($docs->count() != 0)
                                @foreach($docs as $doc)
                                <embed
                                    src="{{ action('AdminController@getDocument', ['id'=> $doc->Doc_Id]) }}"
                                    style="width:600px; height:800px;"
                                    frameborder="0"
                                >
                                @endforeach
                                @else
                                 <tbody>
                                    <tr>
                                        <td colspan="5"><center><h4>No document found.</h4></center></td>
                                    </tr>
                                </tbody>
                                @endif
                                </div>
                        </div>
                    </div>
                </div>
            </div>
                
        </div>
    </div>
</div>
 
@endsection