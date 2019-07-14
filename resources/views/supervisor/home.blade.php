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
                                            <a href="/supervisor/studentList" class="btn btn-default btn-sm"><i class="fa fa-list"></i>Student List</a>
                                            <a href="#" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i>Manage Profile</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box">
                    <p style="font-size: 20px;">Company Waiting for Approval</p>
                    
                    <div class="box">
                        <a href="#">ABC Consulting Sdn Bhd</a>             
                    <div class="pull-right">  
                        <button type="button" class="btn btn-info">View</button>
                        <button type="button" class="btn btn-success">Approve</button>     
                        <button type="button" class="btn btn-danger">Reject</button>                        
                    </div>
                    <div><i class="fa fa-clock-o"></i> 4 days ago</div>   
                    </div>
                    
                    <div class="box">
                        <a href="#">XYZ IT Solution Sdn Bhd</a>             
                    <div class="pull-right">
                        <button type="button" class="btn btn-info">View</button>
                        <button type="button" class="btn btn-success">Approve</button>     
                        <button type="button" class="btn btn-danger">Reject</button>
                    </div>
                    <div><i class="fa fa-clock-o"></i> 4 days ago</div>   
                    </div>
                    
                    <div class="box">
                        <a href="#">BBC Accounting Sdn Bhd</a>             
                    <div class="pull-right">
                        <button type="button" class="btn btn-info">View</button>
                        <button type="button" class="btn btn-success">Approve</button>     
                        <button type="button" class="btn btn-danger">Reject</button>
                    </div>
                    <div><i class="fa fa-clock-o"></i> 4 days ago</div>   
                    </div>
                    
                    <div class="box">
                        <a href="#">Hihima International</a>             
                    <div class="pull-right">
                        <button type="button" class="btn btn-info">View</button>
                        <button type="button" class="btn btn-success">Approve</button>     
                        <button type="button" class="btn btn-danger">Reject</button>
                    </div>
                    <div><i class="fa fa-clock-o"></i> 4 days ago</div>   
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
 
@endsection