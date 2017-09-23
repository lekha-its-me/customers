<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
    <!-- Sandstone Bootstrap CSS -->
{{--<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">--}}

<!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="{{ URL::asset('css/dataTables.bootstrap.min.css') }}">

    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-social.css') }}">

    <!-- Bootstrap select -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-select.css') }}">

    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="{{ URL::asset('css/fileinput.min.css') }}">

    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="{{ URL::asset('css/awesome-bootstrap-checkbox.css') }}">

    <!-- Admin Stye -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Customer Managment
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{ url('/customers') }}"><i class="fa fa-table"></i> Клиенты</a></li>
                <li><a href="{{ url('/services') }}"><i class="fa fa-list"></i> Услуги</a></li>
                <li><a href="{{ url('/view') }}"><i class="fa fa-list"></i> Отчеты</a></li>
                {{--<li><a href="{{ url('/materials') }}"><i class="fa fa-dropbox"></i> Материалы</a></li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-dropbox"></i> Материалы <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ url('/materials') }}">Материалы</a></li>
                        <li><a href="#">Купить материал</a></li>
                    </ul>
                </li>
                <li><a href="{{ url('/sell') }}"><i class="fa fa-cart-plus"></i> Продать услугу</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

            <div class="ts-main-content">
                <div class="container-fluid">
                @if(session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('status') }}
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    @yield('content')
                </div>

            </div>
    </div>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}


{{--<script src="{{ URL::asset('js/jquery.min.js') }}"></script>--}}
<script src="{{ URL::asset('js/bootstrap-select.min.js') }}"></script>

{{--<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>--}}

<script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::asset('js/dataTables.bootstrap.min.js') }}"></script>

<script src="{{ URL::asset('js/Chart.min.js') }}"></script>

<script src="{{ URL::asset('js/fileinput.js') }}"></script>

<script src="{{ URL::asset('js/chartData.js') }}"></script>

<script src="{{ URL::asset('js/main.js') }}"></script>

<script>

    window.onload = function(){

        // Line chart from swirlData for dashReport
        var ctx = document.getElementById("dashReport").getContext("2d");
        window.myLine = new Chart(ctx).Line(swirlData, {
            responsive: true,
            scaleShowVerticalLines: false,
            scaleBeginAtZero : true,
            multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		});

		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
@yield('script')
</body>
</html>
