<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Rajatiket') }} Admin</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/plugins/icheck/square/blue.css" rel="stylesheet">
    <link href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">
    <link href="/plugins/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/datatables/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/datatables/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/datatables/css/dataTables.searchHighlight.css" rel="stylesheet">
    <link href="/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="/plugins/icheck/icheck.min.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/dataTables.searchHighlight.min.js"></script>
    <script type="text/javascript" src="/plugins/datatables/js/jquery.highlight.js"></script>
    <script type="text/javascript" src="/plugins/select2/select2.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a href="/" class="navbar-brand">
                        <img src="{{ asset('img/logo_admin.png') }}" alt="Rajatiket">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="login" role="button" aria-expanded="false" aria-haspopup="true">
                                    Login</span>
                                </a>
                                <div class="dropdown-menu my-dropdown-menu" aria-labelledby="login">
                                    <strong style="margin-bottom: 10px; display: inline-block">Sign In ke Akun Anda</strong>
                                    <form action="{{ route('login') }}" method="post">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" id="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning col-md-4">Sign In</button>
                                            <p class="col-md-8" style="font-size: 13px; margin-bottom: 0">Belum punya akun? <a href="{{ route('register') }}" style="line-height: 5px">Daftar</a></p>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li><a href="{{ route('register') }}">Daftar</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::guard('admin')->user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <img src="/img/icons/logout.png" alt="" class="my-icon">&nbsp;&nbsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="my-container">
            <div class="row" style="margin-top: 20px">
                <div class="col-md-3">
                    <nav class="sidebar-menu-container">
                        <ul class="sidebar-menu">
                            <li>
                                <a href="{{ route('user.index') }}">
                                    <img src="/img/icons/user.png" class="my-icon" alt="">User</a>
                            </li>
                            <li>
                                <a href="{{ route('airline.index') }}">
                                    <img src="/img/icons/sidebar/pilot-hat.png" class="my-icon" alt="">Maskapai</a>
                            </li>
                            <li>
                                <a href="{{ route('airplane.index') }}">
                                    <img src="/img/icons/sidebar/airplane-blue.png" class="my-icon" alt="">Pesawat</a>
                            </li>
                            <li>
                                <a href="{{ route('airport.index') }}">
                                    <img src="/img/icons/sidebar/runway.png" class="my-icon" alt="">Bandara</a>
                            </li>
                            <li>
                                <a href="{{ route('booking.index') }}">
                                    <img src="/img/icons/sidebar/booking.png" class="my-icon" alt="">Booking</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('city.index') }}">
                                    <img src="/img/icons/sidebar/skycrapers.png" class="my-icon" alt="">Kota</a>
                            </li>
                            <li>
                                <a href="{{ route('flight.index') }}">
                                    <img src="/img/icons/sidebar/luggage-trolly.png" class="my-icon" alt="">Penerbangan</a>
                            </li>
                            <li>
                                <a href="javascript:" data-toggle="collapse" data-target="#sub-menu2"><img src="/img/icons/sidebar/price.png" class="my-icon" alt="">Tarif <span class="pull-right"><i class="caret"></i></span></a>
                                <ul class="sidebar-menu collapse my-collapse" id="sub-menu2">
                                    <li>
                                        <a href="{{ route('flight_fare.index') }}">Penerbangan</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('train_fare.index') }}">Kereta</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('passenger.index') }}"><img src="/img/icons/sidebar/traveler.png" class="my-icon" alt="">Penumpang</a>
                            </li>
                            <li>
                                <a href="{{ route('train.index') }}">
                                    <img src="/img/icons/sidebar/train.png" class="my-icon" alt="">Kereta</a>
                            </li>
                            <li>
                                <a href="{{ route('train_journey.index') }}">
                                    <img src="/img/icons/sidebar/train-track.png" class="my-icon" alt="">Perjalanan Kereta</a>
                            </li>
                            <li>
                                <a href="{{ route('train_route.index') }}">
                                    <img src="/img/icons/sidebar/track.png" class="my-icon" alt="">Rute Kereta</a>
                            </li>
                            <li>
                                <a href="{{ route('train_station.index') }}">
                                    <img src="/img/icons/sidebar/railway-station.png" class="my-icon" alt="">Stasiun Kereta</a>
                            </li>
                            <li>
                                <a href="{{ route('bank_account.index') }}">
                                    <img src="/img/icons/sidebar/bank.png" class="my-icon" alt="">Rekening Bank</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                @yield('content')
                
            </div>
        </div>
        <div class="footer" style="padding-top: 0">
            <div class="my-container">
                <div class="footer-sign" style="border-top: none">
                    Copyright &copy; PT. Rajatiket Jaya. All Rights Reserved
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            var table = $('.table').DataTable({
                responsive: true,
                searchHighlight: true
            });
         
            new $.fn.dataTable.FixedHeader(table);
        });
    </script>
</body>
</html>
