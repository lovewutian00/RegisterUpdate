<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>ITP ONLINE</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <!-- Custom fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <!-- Theme Stylesheet -->
    <link href="{{asset('css/style2.css')}}" rel='stylesheet' />
    <link href="{{asset('css/responsive.css')}}" rel='stylesheet' />
    <link href="{{asset('css/style.default.css')}}" rel='stylesheet' />
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        .wrapper {
            min-height: 100%;
                
            /* Equal to height of footer */
            /* But also accounting for potential margin-bottom of last child */
            margin-bottom: -50px;
        }
        .footer,
        .push {
            height: 50px;
        }
    </style>
   @yield('header')
</head>
<body>
    <div class="top-bar" id="mainNav">
        <div class="container">

            <div class="row">
                <div class="col-md-6">
                    @if (Auth::guard('student')->check()||Auth::guard('company')->check()||Auth::guard('supervisor')->check()||Auth::guard('admin')->check())
                    <a class="navbar-brand">ITP ONLINE</a>
                    @else
                    <a class="navbar-brand" href="/index">ITP ONLINE</a>
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="action pull-right">
                        <ul>
                            @if (Auth::guard('student')->check()||Auth::guard('company')->check()||Auth::guard('supervisor')->check()||Auth::guard('admin')->check())
                            <li><a href="/home"><i class="fa fa-search"></i> Search Job</a></li>
                            @if(Auth::guard('student')->check())
                                <li><a href="/student/"><i class="fa fa-home"></i> Home</a></li>
                            @elseif(Auth::guard('company')->check())
                                <li><a href="/company/companyHome"><i class="fa fa-home"></i> Home</a></li>
                            @elseif(Auth::guard('supervisor')->check())
                                <li><a href="/supervisor/"><i class="fa fa-home"></i> Home</a></li>
                            @elseif(Auth::guard('admin')->check())
                                <li><a href="/admin/home"><i class="fa fa-home"></i> Home</a></li>
                            @else
                                <li><a href="/home"><i class="fa fa-home"></i> Home</a></li>
                            @endif
                            @if(!Auth::guard('supervisor')->check())
                            <li><a href="/profile"><i class="fa fa-user"></i> Profile</a></li>
                            @endif
                            <li><a href="/logout"><i class="fa fa-sign-out"></i> Logout</a></li>
                            @else
                                <li><a href="/register"><i class="fa fa-user-plus"></i> Register</a></li>
                                <li><a href="/login"><i class="fa fa-sign-in"></i> Login</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br />

  <div class="wrapper">
        @yield('content')
        <div class="push"></div>
    </div>
  

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="float-md-left">Copyright &copy; 2018</span>
                </div>
            </div>
        </div>
    </div>

   <script src="{{asset('js/jquery-3.3.1.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('js/jquery.easing.min.js')}}" type="text/javascript" ></script>
    <script src="{{asset('js/custom.js')}}" type="text/javascript" ></script>
    @yield('footer')
</body>
</html>
