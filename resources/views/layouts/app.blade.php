<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/plugins/icheck/square/blue.css" rel="stylesheet">
    <link href="/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="/plugins/icheck/icheck.min.js"></script>
    <script type="text/javascript" src="/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
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
                        <img src="{{ asset('img/logo.png') }}" alt="Rajatiket">
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <img src="/img/icons/logout.png" alt="" class="my-icon">&nbsp;&nbsp;Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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

        @yield('content')

        <div class="footer">
            <div class="my-container">
                <div class="row" style="padding-bottom: 30px">
                    <div class="col-md-4 text-center">
                        <img src="/img/logo.png" alt="" class="footer-icon" width="150px"><br><br>
                        <img src="/img/icons/24_hours_black.png" alt="" style="vertical-align: middle; transform: translateY(-15%)">
                        <p class="text-left" style="display: inline-block">
                            <small>Hubungi Costumer Service</small><br>
                            <strong class="text-warning">+62-852-3223-2097</strong><br>
                            <small class="text-warning">cs@rajatiket.com</small>
                        </p>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <h4>Produk</h4>
                                <ul class="footer-menu">
                                    <li><a href="">Tiket</a></li>
                                    <li><a href="">Pesawat</a></li>
                                    <li><a href="">Kereta Api</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4>Tentang</h4>
                                <ul class="footer-menu">
                                    <li><a href="">Cara Pesan</a></li>
                                    <li><a href="">Hubungi Kami</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4>Lainnya</h4>
                                <ul class="footer-menu">
                                    <li><a href="">Cek Pesanan</a></li>
                                    <li><a href="">Syarat & Ketentuan</a></li>
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <h4>Follow Kami di</h4>
                                <ul class="footer-menu">
                                    <li></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-sign">
                    Copyright &copy; PT. Rajatiket Jaya. All Rights Reserved
                </div>
            </div>
        </div>
    </div>

    <script>
        var adult = 1, child = 0, baby = 0;
        
        $(document).ready(function () {
            $("input").iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue'
            });

            $('.date').datepicker({
                setDate: new Date(),
                format: 'yyyy-mm-dd',
                autoclose: true
            });

            $(".money").keyup(function(event) {
                if (event.which >= 37 && event.which <= 40) return;
                
                $(this).val(function(index, value) {
                    return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                });

                if ($(this).attr('id') == 'economy_adult') {
                    var valChild = unformatUang($(this).val()) * 75 / 100,
                        valBaby = unformatUang($(this).val()) * 50 / 100;

                    $("#economy_child").val(formatUang(valChild));
                    $("#economy_baby").val(formatUang(valBaby));
                }

                if ($(this).attr('id') == 'business_adult') {
                    var valChild = unformatUang($(this).val()) * 75 / 100,
                        valBaby = unformatUang($(this).val()) * 50 / 100;

                    $("#business_child").val(formatUang(valChild));
                    $("#business_baby").val(formatUang(valBaby));
                }
            });

            $(".dropdown-sidebar li").first().addClass('active');
            $(".dropdown-sidebar li:nth-child(1)").addClass('active');

            $("#penumpang").focusin(function(event) {
                $(this).parent().find('.input-group-addon').addClass('open');
            });

            $(".close").click(function(event) {
                $(this).closest('.input-group-addon').removeClass('open');
            });

            $("#kota-asal, #kota-tujuan").focusin(function(event) {
                $(this).parent().find('.input-group-addon').addClass('open');
            });

            $("#is-pulang-pergi").on('ifToggled', function (event) {
                $("#pulang-pergi").toggle();
            });

            $("#done").click(function(event) {
                $("#penumpang").parent().find('.input-group-addon').removeClass('open');
            });

            $(".plus").click(function(event) {
                var input = $(this).closest('.input-group').find('input');

                input.val(function (i, oldval) {
                    return ++oldval;
                });

                switch (input.attr('id')) {
                    case 'dewasa':
                        adult = $("#dewasa").val();
                        break;

                    case 'anak':
                        child = $("#anak").val();
                        break;

                    case 'bayi':
                        baby = $("#bayi").val();
                        break;
                }

                setPassengerValue();
            });

            $(".minus").click(function(event) {
                var input = $(this).closest('.input-group').find('input');

                input.val(function (i, oldval) {
                    if ($(this).val() < 1) {
                        return $(this).val();
                    }

                    return --oldval;
                });

                switch (input.attr('id')) {
                    case 'dewasa':
                        adult = $("#dewasa").val();
                        break;

                    case 'anak':
                        child = $("#anak").val();
                        break;

                    case 'bayi':
                        baby = $("#bayi").val();
                        break;
                }

                setPassengerValue();
            });

            $(".cities-list a").click(function(event) {
                var input = $(this).closest('.input-group').find('input.form-control'),
                    inputHidden = $(this).closest('.input-group').find('input[type=hidden]');

                input.val($(this).data('input'));
                inputHidden.val($(this).data('id'));

                input.parent().find('.input-group-addon').removeClass('open');
            });

            $(".dropdown-sidebar li").click(function(event) {
                $(".dropdown-sidebar li").removeClass('active');
                $(this).addClass('active');

                $(".cities").css('display', 'none');

                switch ($(this).data('island')) {
                    case 'jawa':
                        $(".cities:nth-child(1)").css('display', 'block');
                        break;

                    case 'sumatera':
                        $(".cities:nth-child(2)").css('display', 'block');
                        break;

                    case 'kalimantan':
                        $(".cities:nth-child(3)").css('display', 'block');
                        break;

                    case 'sulawesi':
                        $(".cities:nth-child(4)").css('display', 'block');
                        break;

                    case 'bali & nusa tenggara':
                        $(".cities:nth-child(5)").css('display', 'block');
                        break;

                    case 'maluku & papua':
                        $(".cities:nth-child(6)").css('display', 'block');
                        break;
                }
            });
        });

        function setPassengerValue() {
            var text = adult + " Dewasa, " + child + " Anak, " + baby + " Bayi";

            $("#penumpang").val(text);
        }

        function formatUang(text) {
            return text.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        
        function unformatUang(text) {
            return parseInt(text.split('.').join(""));
        }
    </script>
</body>
</html>
