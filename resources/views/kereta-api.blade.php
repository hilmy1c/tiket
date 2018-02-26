@extends('layouts.app')

@section('content')
<div class="banner" style="overflow: visible;">
    <div class="my-container">
        <h1 class="welcome-message">Selamat Datang</h1>
        <p class="welcome-message">Temukan harga terbaik untuk setiap produk yang anda inginkan.</p>
        <div class="panel panel-default" style="border: none;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2 sidebar-search-menu" style="position: relative; height: 232px;">
                        <div class="row">
                            <a href="/" class="bold"><img src="/img/icons/airplane.png" alt="" class="my-icon">&nbsp;&nbsp;Pesawat</a>
                        </div>
                        <div class="row active">    
                            <a href="{{ route('train_journey.search_index') }}" class="bold"><img src="/img/icons/train.png" alt="" class="my-icon">&nbsp;&nbsp;Kereta Api</a>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <strong class="text-primary" style="margin-bottom: 15px; display: inline-block;"><img src="\img\icons\search-blue.png" alt="" class="my-icon">&nbsp;Cari tiket kereta api</strong>
                        <form action="{{ route('train_journey.search') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="row">
                                <div class="col-md-12" style="padding-left: 0">
                                    <div class="form-group col-md-6">
                                        <label for="kota-asal">Kota Asal:</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <span><img src="\img\icons\train1.png" alt="" class="my-icon-sm"></span>
                                            </div>
                                            <select name="start_station" id="start_station" class="form-control select2" style="width: 99%">
                                                @foreach ($islands as $island)
                                                <optgroup label="{{ $island->island }}">
                                                    @foreach ($stations as $station)
                                                        @if ($station->city->island == $island->island)
                                                        <option value="{{ $station->id }}" {{ ($station->code == 'BD') ? 'selected' : '' }}>{{ $station->city->city }} ({{ $station->code }})</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6" style="overflow: hidden;">
                                        <label for="kota-tujuan">Kota Tujuan:</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <span><img src="\img\icons\train2.png" alt="" class="my-icon-sm"></span>
                                            </div>
                                            <select name="end_station" id="end_station" class="form-control select2" style="width: 99%">
                                                @foreach ($islands as $island)
                                                <optgroup label="{{ $island->island }}">
                                                    @foreach ($stations as $station)
                                                        @if ($station->city->island == $island->island)
                                                        <option value="{{ $station->id }}" {{ ($station->code == 'ML') ? 'selected' : '' }}>{{ $station->city->city }} ({{ $station->code }})</option>
                                                        @endif
                                                    @endforeach
                                                </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 0">
                                    <div class="form-group col-md-12">
                                        <label for="">Tanggal Berangkat:</label>
                                        <div class="input-group input-group-sm date">
                                            <span class="input-group-addon"><img src="\img\icons\calendar.png" alt="" class="my-icon-sm"></span>
                                            <input type="text" id="departure_date" name="departure_date" class="input-sm form-control" value="{{ date('Y-m-d') }}" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 0">
                                    <div class="col-md-4">
                                        <label style="color: #fff;" for="">Dewasa</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><img src="\img\icons\adult.png" alt="" class="my-icon-sm"></span>
                                            <select name="adult_number" id="adult" class="input-sm form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                            </select>
                                        </div>
                                        <span class="help-block bold" style="font-size: 12px">Diatas 3 tahun</span>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Bayi</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon"><img src="\img\icons\baby.png" alt="" class="my-icon-sm"></span>
                                            <select name="baby_number" id="baby" class="input-sm form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                            </select>
                                        </div>
                                        <span class="help-block bold" style="font-size: 12px">Dibawah 3 tahun</span>
                                    </div>
                                    <div class="form-group col-md-4">
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
        <h3 class="text-center">Kenapa Memilih Zeeber?</h3>
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
            <h3>Partner Zeeber</h3>
            <div class="title-border" style="margin-left: 0px"></div>
            <p>Kami bekerja sama dengan berbagai maskapai penerbangan & PT KAI untuk membawa Anda ke mana pun Anda inginkan!</p>
        </div>
        <div class="col-md-8">
            <div class="col-md-4">
                <a href="https://www.airasia.com/id">
                    <img src="/img/partners/air_asia.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://www.citilink.co.id/" class="partners-logo-container">
                    <img src="/img/partners/citilink.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://www.garuda-indonesia.com/id" class="partners-logo-container">
                    <img src="/img/partners/garuda_indonesia.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="http://www.lionair.co.id/id" class="partners-logo-container">
                    <img src="/img/partners/lion_air.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://www.sriwijayaair.co.id/" class="partners-logo-container">
                    <img src="/img/partners/sriwijaya_air.png" alt="" class="partners-logo">
                </a>
            </div>
            <div class="col-md-4">
                <a href="https://kai.id/" class="partners-logo-container">
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
    $("#adult").change(function (event) {
        $("#baby").html('<option value="0">0</option>')

        for (var i = 1; i <= $(this).val(); i++) {
            $("#baby").append('<option value="'+i+'">'+i+'</option>');
        }
    });
</script>
@endsection
