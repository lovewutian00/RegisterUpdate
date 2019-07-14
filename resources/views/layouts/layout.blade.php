<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITP ONLINE</title>
    <!-- Bootstrap core CSS -->
     <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' />

    <!-- Custom fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{asset('css/style.css')}}" rel='stylesheet' />
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index">ITP ONLINE</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#background">Background</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                    </li>
                        @if (Auth::guard('student')->check()||Auth::guard('company')->check()||Auth::guard('supervisor')->check()||Auth::guard('admin')->check())
                        <li><a href="/home"><i class="fa fa-search"></i> Search Job</a></li>
                        @if(Auth::guard('student')->check())
                            <li><a href="/student/home"><i class="fa fa-home"></i> Home</a></li>
                        @elseif(Auth::guard('company')->check())
                            <li><a href="/company/companyHome"><i class="fa fa-home"></i> Home</a></li>
                        @elseif(Auth::guard('supervisor')->check())
                            <li><a href="/supervisor/home"><i class="fa fa-home"></i> Home</a></li>
                        @elseif(Auth::guard('admin')->check())
                            <li><a href="/admin/home"><i class="fa fa-home"></i> Home</a></li>
                        @else
                            <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
                        @endif
                        <li><a href="/profile"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                        @else
                            <li><a href="/register"><i class="fa fa-user-plus"></i> Register</a></li>
                            <li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
                        @endif
                    </ul>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <hr />
    <footer>
        <p>Copyright &copy; 2018</p>
    </footer>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('js/jquery.easing.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('js/custom.js')}}" type="text/javascript" ></script>

</body>
</html>
