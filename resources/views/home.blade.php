@extends('layouts.app')

@section('content')
<div class="banner" style="overflow: visible;">
    <div class="my-container">
        <h1 class="welcome-message">Selamat Datang</h1>
        <p class="welcome-message">Temukan harga terbaik untuk setiap produk yang anda inginkan.</p>
        <div class="panel panel-default" style="border: none;">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2 sidebar-search-menu" style="position: relative">
                        <div class="row active">
                            <a href="/" class="bold"><img src="/img/icons/airplane.png" alt="" class="my-icon">&nbsp;&nbsp;Pesawat</a>
                        </div>
                        <div class="row">    
                            <a href="{{ route('train_journey.search_index') }}" class="bold"><img src="/img/icons/train.png" alt="" class="my-icon">&nbsp;&nbsp;Kereta Api</a>
                        </div>
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
                                            <div class="input-group-addon">
                                                <span><img src="\img\icons\airplane_take_off.png" alt="" class="my-icon-sm"></span>
                                                <div class="dropdown-menu" style="width: 750px">
                                                    <div class="dropdown-header">
                                                        Pilih Kota Asal Penerbangan Anda
                                                        <img src="/img/icons/multiply.png" alt="" class="my-icon-sm pull-right close" style="cursor: pointer;">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <ul class="dropdown-sidebar">
                                                                <li data-island="jawa">
                                                                    <a href="javascript:">JAWA</a>
                                                                </li>
                                                                <li data-island="sumatera">
                                                                    <a href="javascript:">SUMATERA</a>
                                                                </li>
                                                                <li data-island="kalimantan">
                                                                    <a href="javascript:">KALIMANTAN</a>
                                                                </li>
                                                                <li data-island="sulawesi">
                                                                    <a href="javascript:">SULAWESI</a>
                                                                </li>
                                                                <li data-island="bali & nusa tenggara">
                                                                    <a href="javascript:">BALI & NUSA TENG.</a>
                                                                </li>
                                                                <li data-island="maluku & papua">
                                                                    <a href="javascript:">MALUKU & PAPUA</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-9" style="padding-top: 5px; padding-bottom: 5px">
                                                            <div class="row cities" style="display: block">
                                                                @foreach ($airports as $airport)
                                                                    @foreach ($airport->city()->where('island', 'Jawa')->get() as $city)
                                                                    <div class="col-md-3 cities-list">
                                                                        <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="row cities">
                                                                @foreach ($airports as $airport)
                                                                    @foreach ($airport->city()->where('island', 'Sumatera')->get() as $city)
                                                                    <div class="col-md-3 cities-list">
                                                                        <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="row cities">
                                                                @foreach ($airports as $airport)
                                                                    @foreach ($airport->city()->where('island', 'Kalimantan')->get() as $city)
                                                                    <div class="col-md-3 cities-list">
                                                                        <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="row cities">
                                                                <div class="col-md-3 cities-list">
                                                                    @foreach ($airports as $airport)
                                                                        @foreach ($airport->city()->where('island', 'Sulawesi')->get() as $city)
                                                                        <div class="col-md-3 cities-list">
                                                                            <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row cities">
                                                                <div class="col-md-3 cities-list">
                                                                    @foreach ($airports as $airport)
                                                                        @foreach ($airport->city()->where('island', 'Bali & Nusa Tenggara')->get() as $city)
                                                                        <div class="col-md-3 cities-list">
                                                                            <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row cities">
                                                                <div class="col-md-3 cities-list">
                                                                    @foreach ($airports as $airport)
                                                                        @foreach ($airport->city()->where('island', 'Maluku')->orWhere('island', 'Papua')->get() as $city)
                                                                        <div class="col-md-3 cities-list">
                                                                            <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" id="kota-asal" name="kota_asal" class="form-control" value="{{ $startAirport->city->city }} ({{ $startAirport->code }})" autocomplete="off">
                                            <input type="hidden" name="from" value="{{ $startAirport->id }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kota-tujuan">Kota Tujuan:</label>
                                        <div class="input-group input-group-sm">
                                            <div class="input-group-addon">
                                                <span><img src="\img\icons\airplane_landing.png" alt="" class="my-icon-sm"></span>
                                                <div class="dropdown-menu" style="width: 750px">
                                                    <div class="dropdown-header">
                                                        Pilih Kota Tujuan Penerbangan Anda
                                                        <img src="/img/icons/multiply.png" alt="" class="my-icon-sm pull-right close" style="cursor: pointer;">
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <ul class="dropdown-sidebar">
                                                                <li data-island="jawa">
                                                                    <a href="javascript:">JAWA</a>
                                                                </li>
                                                                <li data-island="sumatera">
                                                                    <a href="javascript:">SUMATERA</a>
                                                                </li>
                                                                <li data-island="kalimantan">
                                                                    <a href="javascript:">KALIMANTAN</a>
                                                                </li>
                                                                <li data-island="sulawesi">
                                                                    <a href="javascript:">SULAWESI</a>
                                                                </li>
                                                                <li data-island="bali & nusa tenggara">
                                                                    <a href="javascript:">BALI & NUSA TENG.</a>
                                                                </li>
                                                                <li data-island="maluku & papua">
                                                                    <a href="javascript:">MALUKU & PAPUA</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-9" style="padding-top: 5px; padding-bottom: 5px">
                                                            <div class="row cities" style="display: block">
                                                                @foreach ($airports as $airport)
                                                                    @foreach ($airport->city()->where('island', 'Jawa')->get() as $city)
                                                                    <div class="col-md-3 cities-list">
                                                                        <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="row cities">
                                                                @foreach ($airports as $airport)
                                                                    @foreach ($airport->city()->where('island', 'Sumatera')->get() as $city)
                                                                    <div class="col-md-3 cities-list">
                                                                        <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="row cities">
                                                                @foreach ($airports as $airport)
                                                                    @foreach ($airport->city()->where('island', 'Kalimantan')->get() as $city)
                                                                    <div class="col-md-3 cities-list">
                                                                        <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                    </div>
                                                                    @endforeach
                                                                @endforeach
                                                            </div>
                                                            <div class="row cities">
                                                                <div class="col-md-3 cities-list">
                                                                    @foreach ($airports as $airport)
                                                                        @foreach ($airport->city()->where('island', 'Sulawesi')->get() as $city)
                                                                        <div class="col-md-3 cities-list">
                                                                            <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row cities">
                                                                <div class="col-md-3 cities-list">
                                                                    @foreach ($airports as $airport)
                                                                        @foreach ($airport->city()->where('island', 'Bali & Nusa Tenggara')->get() as $city)
                                                                        <div class="col-md-3 cities-list">
                                                                            <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="row cities">
                                                                <div class="col-md-3 cities-list">
                                                                    @foreach ($airports as $airport)
                                                                        @foreach ($airport->city()->where('island', 'Maluku')->orWhere('island', 'Papua')->get() as $city)
                                                                        <div class="col-md-3 cities-list">
                                                                            <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                                        </div>
                                                                        @endforeach
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" id="kota-tujuan" name="kota_tujuan" class="input-sm form-control" value="{{ $endAirport->city->city }} ({{ $endAirport->code }})" autocomplete="off">
                                            <input type="hidden" name="destination" value="{{ $endAirport->id }}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="tgl-berangkat">Tanggal Berangkat:</label>
                                        <div class="input-group input-group-sm date">
                                            <span class="input-group-addon"><img src="\img\icons\calendar.png" alt="" class="my-icon-sm"></span>
                                            <input type="text" id="tgl-berangkat" name="departure_time" class="input-sm form-control" value="{{ date('Y-m-d') }}" autocomplete="off">
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
                                                                <img src="\img\icons\adult.png" alt="" class="my-icon">&nbsp;Dewasa
                                                                <small>(12 thn atau lebih)</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-sm col-md-10 pull-right">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default minus" type="button">
                                                                            <img src="\img\icons\minus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="dewasa" name="adult_number" value="1">
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
                                                                <img src="\img\icons\child.png" alt="" class="my-icon">&nbsp;Anak
                                                                <small>(2-11 thn)</small>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="input-group input-group-sm col-md-10 pull-right">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn btn-default minus" type="button">
                                                                            <img src="\img\icons\minus.png" alt="" class="my-icon-sm">
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control" id="anak" name="child_number" value="0">
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
                                                                    <input type="text" class="form-control" id="bayi" name="baby_number" value="0">
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
                                            <input type="text" id="penumpang" name="penumpang" class="input-sm form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kelas">Kelas Penerbangan:</label>
                                        <select name="class" id="kelas" class="input-sm form-control">
                                            <option value="economy">Ekonomi</option>
                                            <option value="business">Bisnis</option>
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
@endsection
