@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="my-container">
        <h3 style="color: #fff">{{ $fromAirport->city->city }} - {{ $fromAirport->name }} Airport ({{ $fromAirport->code }}) &rarr; {{ $destinationAirport->city->city }} - {{ $destinationAirport->name }} Airport ({{ $destinationAirport->code }})</h3>
        <div class="flight-detail" style="color: #fff">
            {{ date('l, d F Y', strtotime($date)) }} | {{ $adult_number }} Dewasa, {{ $child_number }} Anak, {{ $baby_number }} Bayi | {{ $class }}
            <button class="btn btn-white pull-right" id="ganti-pencarian">Ganti Pencarian</button>
        </div>
    </div>
</div>
<div class="bg-default">
    <div class="my-container">
        <div class="panel panel-default" id="search-flight-form" style="display: none">
            <div class="panel-body">
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
                                                        @foreach ($jawa as $airport)
                                                            @foreach ($airport->city()->where('island', 'Jawa')->get() as $city)
                                                            <div class="col-md-3 cities-list">
                                                                <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                            </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <div class="row cities">
                                                        @foreach ($sumatera as $airport)
                                                            @foreach ($airport->city()->where('island', 'Sumatera')->get() as $city)
                                                            <div class="col-md-3 cities-list">
                                                                <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                            </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Kalimantan
                                                        </div>
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Sulawesi
                                                        </div>
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Bali & Nusa Tenggara
                                                        </div>
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Maluku & Papua
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" id="kota-asal" name="kota-asal" class="form-control" autocomplete="off">
                                    <input type="hidden" name="from">
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
                                                        @foreach ($jawa as $airport)
                                                            @foreach ($airport->city()->where('island', 'Jawa')->get() as $city)
                                                            <div class="col-md-3 cities-list">
                                                                <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                            </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <div class="row cities">
                                                        @foreach ($sumatera as $airport)
                                                            @foreach ($airport->city()->where('island', 'Sumatera')->get() as $city)
                                                            <div class="col-md-3 cities-list">
                                                                <a href="javascript:" data-input="{{ $city->city }} ({{ $airport->code }})" data-id="{{ $airport->id }}">{{ $city->city }}</a>
                                                            </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Kalimantan
                                                        </div>
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Sulawesi
                                                        </div>
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Bali & Nusa Tenggara
                                                        </div>
                                                    </div>
                                                    <div class="row cities">
                                                        <div class="col-md-3 cities-list">
                                                            Maluku & Papua
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="text" id="kota-tujuan" name="kota-tujuan" class="input-sm form-control" autocomplete="off">
                                    <input type="hidden" name="destination">
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
                                    <input type="text" id="penumpang" name="penumpang" class="input-sm form-control" value="1 Dewasa, 0 Anak, 0 Bayi" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kelas">Kelas Penerbangan:</label>
                                <select name="class" id="kelas" class="input-sm form-control">
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Bisnis">Bisnis</option>
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
        <div class="flight-search-header">
            <div class="row">
                <div class="col-md-3"><b>Maskapai</b></div>
                <div class="col-md-2"><b>Berangkat</b></div>
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-2"><b>Sampai</b></div>
                <div class="col-md-2"><b>Durasi</b></div>
                <div class="col-md-2"><b>Harga</b></div>
            </div>
        </div>
        @foreach ($flights as $flight)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-3 vertical-middle">
                    <img src="{{ Storage::url($flight->airplane->airline->image) }}" alt="" class="my-icon-sm">&nbsp;&nbsp;{{ $flight->airplane->airline->name }}
                </div>
                <div class="col-md-2">
                    <h4>{{ date('H:i', strtotime($flight->departure_time)) }}</h4>
                    <small>{{ $flight->fromAirport->city->city }} ({{ $flight->fromAirport->code }})</small>
                </div>
                <div class="col-md-1 vertical-middle">
                    &rarr;
                </div>
                <div class="col-md-2">
                    <h4>{{ date('H:i', strtotime($flight->arrival_time)) }}</h4>
                    <small>{{ $flight->destinationAirport->city->city }} ({{ $flight->destinationAirport->code }})</small>
                </div>
                <div class="col-md-2">
                    <h4>{{ $flight->timeRange }}</h4>
                    <small>langsung</small>
                </div>
                <div class="col-md-2">
                    <h4 class="text-warning">Rp. {{ $flight->fare }}</h4>
                    
                    <form action="{{ route('flight.show', ['id' => $flight->id]) }}" method="GET">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="timeRange" value="{{ $flight->timeRange }}">
                        <input type="hidden" name="class" value="{{ $class }}">
                        <input type="hidden" name="adult_number" value="{{ $adult_number }}">
                        <input type="hidden" name="child_number" value="{{ $child_number }}">
                        <input type="hidden" name="baby_number" value="{{ $baby_number }}">
                        <input type="hidden" name="adult_fare" value="{{ $flight->adult_fare }}">
                        <input type="hidden" name="child_fare" value="{{ $flight->child_fare }}">
                        <input type="hidden" name="baby_fare" value="{{ $flight->baby_fare }}">
                        <input type="hidden" name="departure_time" value="{{ $date }}">
                        <input type="hidden" name="fare" value="{{ $flight->fare }}">

                        <button type="submit" class="btn btn-sm btn-warning col-md-12">Pilih</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    $("#ganti-pencarian").click(function(event) {
        $("#search-flight-form").slideToggle();
    });
</script>
@endsection
