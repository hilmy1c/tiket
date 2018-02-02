@extends('layouts.app')

@section('content')
<div class="banner" style="overflow: visible;">
    <div class="my-container">
        <h1 class="welcome-message">Selamat Datang</h1>
        <p class="welcome-message">Temukan harga terbaik untuk setiap produk yang anda inginkan.</p>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2" style="position: relative">
                        <ul class="nav my-nav-pills nav-stacked main-search-sidebar">
                            <li>
                                <a href="">
                                    <img src="/img/icons/airplane.png" alt="" class="my-icon">&nbsp;Pesawat
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/img/icons/train.png" alt="" class="my-icon">&nbsp;Kereta Api
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-10">
                        <strong class="text-primary" style="margin-bottom: 15px; display: inline-block;"><img src="\img\icons\search-blue.png" alt="" class="my-icon">&nbsp;Cari tiket pesawat</strong>
                        <form action="{{ route('flight.search') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-6" style="padding-left: 0">
                                    <div class="form-group col-md-6">
                                        <label for="kota-asal">Kota Asal:</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon open">
                                                <span><img src="\img\icons\airplane_take_off.png" alt="" class="my-icon-sm"></span>
                                                <div class="dropdown-menu" style="width: 814px">
                                                    <div class="dropdown-header">
                                                        Pilih Kota Asal Penerbangan Anda
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <ul class="dropdown-sidebar">
                                                                <li>
                                                                    <a href="javascript:">JAWA</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:">SUMATERA</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:">KALIMANTAN</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:">SULAWESI</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:">BALI & NUSA TENG.</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:">MALUKU & PAPUA</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-9">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" id="kota-asal" name="kota-asal" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kota-tujuan">Kota Tujuan:</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><img src="\img\icons\airplane_landing.png" alt="" class="my-icon-sm"></span>
                                            <input type="text" id="kota-tujuan" name="kota-tujuan" class="input-sm form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tgl-berangkat">Tanggal Berangkat:</label>
                                        <div class="input-group input-group-sm date">
                                            <span class="input-group-addon"><img src="\img\icons\calendar.png" alt="" class="my-icon-sm"></span>
                                            <input type="text" id="tgl-berangkat" name="tgl-berangkat" class="input-sm form-control" value="{{ date('Y-m-d') }}" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tgl-pulang-pergi"><input type="checkbox" id="is-pulang-pergi">&nbsp;Pulang Pergi:</label>
                                        <div class="input-group input-group-sm date" id="pulang-pergi" style="display: none;">
                                            <span class="input-group-addon"><img src="\img\icons\calendar.png" alt="" class="my-icon-sm"></span>
                                            <input type="text" id="tgl-pulang-pergi" name="tgl-pulang-pergi" class="input-sm form-control" value="{{ date('Y-m-d') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 0">
                                    <div class="form-group col-md-12">
                                        <label for="">Jumlah Penumpang:</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <span><img src="\img\icons\family.png" alt="" class="my-icon-sm"></span>
                                                <ul class="dropdown-menu" style="width: 362px">
                                                    <li class="list-passengers">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="\img\icons\man.png" alt="" class="my-icon">&nbsp;Dewasa
                                                                <small>(12 thn atau lebih)</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-sm col-md-10 pull-right">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default minus" type="button">
                                                                            <img src="\img\icons\minus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="dewasa" name="dewasa" value="1">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default plus" type="button">
                                                                            <img src="\img\icons\plus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-passengers">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="\img\icons\son.png" alt="" class="my-icon">&nbsp;Anak
                                                                <small>(2-11 thn)</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-sm col-md-10 pull-right">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default minus" type="button">
                                                                            <img src="\img\icons\minus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="anak" name="anak" value="0">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default plus" type="button">
                                                                            <img src="\img\icons\plus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-passengers">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="\img\icons\baby.png" alt="" class="my-icon">&nbsp;Bayi
                                                                <small>(di bawah 2 thn)</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-sm col-md-10 pull-right">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default minus" type="button">
                                                                            <img src="\img\icons\minus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="bayi" name="bayi" value="0">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default plus" type="button">
                                                                            <img src="\img\icons\plus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-passengers">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <a href="javascript:" class="pull-right" style="text-decoration: none;" id="done"><strong>Selesai</strong></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <input type="text" id="penumpang" name="penumpang" class="input-sm form-control" value="1 Dewasa, 0 Anak, 0 Bayi" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Kelas Penerbangan:</label>
                                        <select name="" id="" class="input-sm form-control">
                                            <option value="">Ekonomi</option>
                                            <option value="">Bisnis</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <br>
                                        <button type="submit" name="" class="btn btn-sm btn-warning pull-right"><img src="\img\icons\search-white.png" alt="" class="my-icon-sm">&nbsp;Cari Tiket</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="my-container">
    <div class="row" style="margin-bottom: 30px">
        <h3 class="text-center">Kenapa Memilih Rajatiket?</h3>
        <div class="title-border"></div>
        <div class="col-md-4 text-center">
            <img src="/img/icons/why_choose/24_hours.png" alt=""><br>
            <h4>Layanan Pelanggan 24 Jam</h4>
        </div>
        <div class="col-md-4 text-center">
            <img src="/img/icons/why_choose/asia.png" alt=""><br>
            <h4>Pesan Tiket Pesawat dan Kereta Api Terlengkap</h4>
        </div>
        <div class="col-md-4 text-center">
            <img src="/img/icons/why_choose/card_payment.png" alt=""><br>
            <h4>Kemudahan dalam Pembayaran</h4>
        </div>
    </div>
    <div class="row" style="margin-bottom: 30px">
        <div class="col-md-4">
            <h3>Partner Rajatiket</h3>
            <div class="title-border" style="margin-left: 0px"></div>
            <p>Kami bekerja sama dengan berbagai maskapai penerbangan & PT KAI untuk membawa Anda ke mana pun Anda inginkan!</p>
        </div>
        <div class="col-md-8">
            <div class="col-md-4">
                <a href="">
                    <img src="/img/partners/air_asia.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="partners-logo-container">
                    <img src="/img/partners/citilink.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="partners-logo-container">
                    <img src="/img/partners/garuda_indonesia.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="partners-logo-container">
                    <img src="/img/partners/lion_air.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="partners-logo-container">
                    <img src="/img/partners/sriwijaya_air.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="" class="partners-logo-container">
                    <img src="/img/partners/pt_kai.png" alt="" class="partners-logo">
                </a>
            </div>
        </div>
    </div>
</div>
<div class="banner2">
    <div class="my-container">
        <div class="row">
            <h3 class="text-center" style="margin-bottom: 20px">Destinasi Populer</h3>
            <ul class="text-center">
                <li class="col-md-4 img-destination" id="img1">
                    <h4>Jakarta</h4>
                </li>
                <li class="col-md-4 img-destination" id="img2">
                    <h4>Jogja</h4>
                </li>
                <li class="col-md-4 img-destination" id="img3">
                    <h4>Bali</h4>
                </li>
                <li class="col-md-4 img-destination" id="img4">
                    <h4>Surabaya</h4>
                </li>
                <li class="col-md-4 img-destination" id="img5">
                    <h4>Malang</h4>
                </li>
                <li class="col-md-4 img-destination" id="img6">
                    <h4>Bandung</h4>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="bg-default">
    <div class="my-container">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-6">
                <p style="transform: translateY(25%)">Berlangganan newsletter spesial promo dan penawaran terbaik</p>
            </div>
            <div class="col-md-6">
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Masukkan email anda" style="width: 250px">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning">Langganan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    var man = 1, kids = 0, baby = 0;

    $("#penumpang").focusin(function(event) {
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
                man = $("#dewasa").val();
                break;

            case 'anak':
                kids = $("#anak").val();
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
                man = $("#dewasa").val();
                break;

            case 'anak':
                kids = $("#anak").val();
                break;

            case 'bayi':
                baby = $("#bayi").val();
                break;
        }

        setPassengerValue();
    });

    function setPassengerValue() {
        var text = man + " Dewasa, " + kids + " Anak, " + baby + " Bayi";

        $("#penumpang").val(text);
    }
</script>
@endsection
