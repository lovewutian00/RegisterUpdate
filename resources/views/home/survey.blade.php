@extends('layouts.layout1')

@section ('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="all">
    <div id="content">
        <div class="container">
            <div style="height: 60px;">
            <h2>Student Online Survey</h2>
            </div>
            
             <div class="col-md-3">
                <div class="panel panel-default sidebar-menu">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-navicon"></i> Survey/Feedback </h3>
                    </div>

                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked category-menu">
                            <li><a href="#">System Feedback</a></li>
                            <li><a href="#">Student Online Survey</a></li>
                        </ul>
                    </div>

                </div>
                </div>
            <div class="col-md-9">
            <form>
              <div class="form-group">
                <label for="feedback" style="width:200px;">Company Environment:</label>
                <label class="radio-inline"><input type="radio" name="optradio" checked>Good</label>
                <label class="radio-inline"><input type="radio" name="optradio">Normal</label>
                <label class="radio-inline"><input type="radio" name="optradio">Bad</label>
              </div>
              <div class="form-group">
                <label for="feedback">Feedback:</label>
                <textarea class="form-control" rows="5" id="feedback"></textarea>
              </div>
                
            </form>
                </div>
        </div>
    </div>
</div>
 
@endsection