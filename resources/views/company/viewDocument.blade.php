@extends('layouts.layout1')

@section ('content')    
<div id="all">
    <div id="content">
        <div class="container">
            <br>
            @include('company._companySidebar')

            <div class="col-md-9">
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
                                <button class="btn btn-default"><a href='/company/profile'> Return </a></button>
                                
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
                                    <h4>No document found.</h4>
                                @endif
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection