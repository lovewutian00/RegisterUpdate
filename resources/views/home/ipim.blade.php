@extends('layouts.layout1')

@section ('content')

<div id="all">
    <div id="content">
        <div class="container">
            
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

                <div class="box">
                    <div class="pull-right">
                        <img src="{{asset('img/tarcLogo.png')}}" width="100" height="150" />
                    </div>
                    <p style="font-size: 25px;">Final Year Project Name</p>
                    <p style="font-size: 12px;">Descriptions</p>
                    <p style="font-size: 12px;">Student Name</p>
                </div>
                <div class="box">
                    <div class="pull-right">
                        <img src="{{asset('img/tarcLogo.png')}}" width="100" height="150" />
                    </div>
                      <p style="font-size: 25px;">Final Year Project Name</p>
                    <p style="font-size: 12px;">Descriptions</p>
                    <p style="font-size: 12px;">Student Name</p>
                </div>
                <div class="box">
                    <div class="pull-right">
                        <img src="{{asset('img/tarcLogo.png')}}" width="100" height="150" />
                    </div>
                     <p style="font-size: 25px;">Final Year Project Name</p>
                    <p style="font-size: 12px;">Descriptions</p>
                    <p style="font-size: 12px;">Student Name</p>
                </div>
       
        </div>
    </div>
</div>
 
@endsection