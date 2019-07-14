@extends('layouts.layout')

@section ('content')

  <link href="{{asset('css/style1.css')}}" rel='stylesheet' />

<header class="masthead">
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Welcome To Our Page!</div>
            <div class="intro-heading text-uppercase">Industrial Training</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#">About Us</a>
        </div>
    </div>
</header>

<section id="services">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <img src="{{asset('img/pic1.png')}}" height="100" width="100" />
                </span>
                <h4 class="service-heading">Professional Identity</h4>
                <p class="text-muted">Build your professional identity online and stay connected with opportunities.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <img src="{{asset('img/pic2.png')}}" height="100" width="100" />
                </span>
                <h4 class="service-heading">Your Personal Page</h4>
                <p class="text-muted">Log in to your personal page and view jobs that match you.</p>
            </div>
            <div class="col-md-4">
                <span class="fa-stack fa-4x">
                    <img src="{{asset('img/pic3.png')}}" height="100" width="100" />
                </span>
                <h4 class="service-heading">Richer Job Ads</h4>
                <p class="text-muted">Get Salary Matching, Location Map and Company Insights.</p>
            </div>
        </div>
    </div>
</section>

<section class="bg-light" id="background">
    <div class="container">
        <div class="banner_bottom_agile_info_inner_w3ls">
            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <figure class="effect-roxy">
                    <img src="{{asset('img/tarc.jpg')}}" alt=" " class="img-responsive" />
                </figure>
            </div>
            <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
                <img src="{{asset('img/tarcLogo.png')}}" />
                <p>
                    <h5>About TAR UC Student Development & Career Centre</h5>
                    Preparing young adults for the future by equipping them with series of wholesome activities and exploring opportunities is our main core. We support students to embark on self-discovery, personal and career development through experiential learning!!
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3><i class="fa fa-map-marker"></i> Address</h3>
                <p>
                    Kampus Utama,
                    <br />Jalan Genting Kelang,
                    <br />53300 Kuala Lumpur,
                    <br />Wilayah Persekutuan Kuala Lumpur
                    <br />
                    <br />
                    <strong>Malaysia</strong>
                </p>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-4">
                <h3><i class="fa fa-phone"></i> Tel </h3>
                <p>
                    <strong>(6)03-41450123</strong><br />
                </p>
                <br />
                <br />
                <h3><i class="fa fa-fax"></i> Fax </h3>
                <p>
                    <strong>(6)03-41423166</strong><br />
                </p>
            </div>
            <!-- /.col-sm-4 -->
            <div class="col-sm-4">
                <h3><i class="fa fa-envelope"></i> Email</h3>
                <strong>
                    <a href="mailto:">info@tarc.edu.my</a>
                </strong>
                <br />
                <br />
                <h4>More about Tunku Abdul Rahman University College</h4>

                <h5><a href="https://www.facebook.com/tunkuabdulrahmanuniversitycollege"><i class="fa fa-facebook"> &nbsp;&nbsp;&nbsp;Facebook</i></a></h5>
                <h5><a href="https://www.youtube.com/channel/UCqjsPpVnwjCRT5mgAgFo1ng"><i class="fa fa-youtube"> &nbsp;&nbsp;Youtube</i></a></h5>
            </div>
        </div>

    </div>
</section>
 
@endsection