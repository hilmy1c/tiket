@extends('layouts.app')

@section('content')
<div class="train-banner" style="height: 250px">
    <div class="my-container">
        <h2 class="text-white">Pesan tiket dari mana saja, dimana saja</h2>
        <p class="text-white" style="font-size: 17px">Mulai dari mencari jadwal, memesan tiket kereta api, sampai melakukan pembayaran<br>
        &mdash;sekarang semuanya bisa Anda lakukan dengan mudah melalui Rajatiket</p>
    </div>
</div>
<div class="bg-default">
    <div class="my-container">
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-12">
                <h3>{{ $start_station->city->city }} ({{ $start_station->code }}) &rarr; {{ $end_station->city->city }} ({{ $end_station->code }})</h3>
                <div class="flight-detail">
                    {{ date('l, d F Y', strtotime($departure_date)) }} | {{ $adult_number }} Dewasa, {{ $baby_number }} Bayi
                    <button class="btn btn-primary pull-right" id="ganti-pencarian">Ganti Pencarian</button>
                </div>
            </div>
        </div>
        <div class="panel panel-default" id="journey_search_form" style="display: none">
            <div class="panel-body">
                <strong class="text-primary" style="margin-bottom: 15px; display: inline-block;"><img src="\img\icons\search-blue.png" alt="" class="my-icon">&nbsp;Cari tiket kereta api</strong>
                <form action="{{ route('train_journey.search2') }}" method="POST">
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
                                                <option value="{{ $station->id }}" {{ ($station->id == $start_station->id) ? 'selected' : '' }}>{{ $station->city->city }} ({{ $station->code }})</option>
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
                                                <option value="{{ $station->id }}" {{ ($station->id == $end_station->id) ? 'selected' : '' }}>{{ $station->city->city }} ({{ $station->code }})</option>
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
                                    <input type="text" id="departure_date" name="departure_date" class="input-sm form-control" value="{{ date('Y-m-d', strtotime($departure_date)) }}" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="padding-left: 0">
                            <div class="col-md-4">
                                <label for="">Dewasa</label>
                                <div class="input-group input-group-sm">
                                    <span class="input-group-addon"><img src="\img\icons\adult.png" alt="" class="my-icon-sm"></span>
                                    <select name="adult_number" id="adult" class="input-sm form-control">
                                        <option value="1" {{ ($adult_number == '1') ? 'selected' : '' }}>1</option>
                                        <option value="2" {{ ($adult_number == '2') ? 'selected' : '' }}>2</option>
                                        <option value="3" {{ ($adult_number == '3') ? 'selected' : '' }}>3</option>
                                        <option value="4" {{ ($adult_number == '4') ? 'selected' : '' }}>4</option>
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

                    <input type="hidden" name="adult_number" id="adult_number" value="{{ $adult_number }}">
                    <input type="hidden" name="baby_number" id="baby_number" value="{{ $baby_number }}">
                </form>
            </div>
        </div>

        <div class="flight-search-header">
            <div class="row">
                <div class="col-md-3 bold">Nama Kereta</div>
                <div class="col-md-2 bold">Berangkat</div>
                <div class="col-md-1 bold">&nbsp;</div>
                <div class="col-md-2 bold">Tiba</div>
                <div class="col-md-2 bold">Durasi</div>
                <div class="col-md-2 bold">Harga Total</div>
            </div>
        </div>
        @foreach ($train_journeys as $train_journey)
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-3">
                    <h4 class="bold">{{ $train_journey->trainRoute->train->name }}</h4>
                    <small>{{ ucwords($train_journey->sub_class) }} ({{ $train_journey->sub_class_code }})</small>
                </div>
                <div class="col-md-2">
                    <h4>{{ date('H:i', strtotime($train_journey->trainRoute->departure_time)) }}</h4>
                    <small>{{ $train_journey->trainRoute->startStation->city->city }}</small>
                </div>
                <div class="col-md-1 vertical-middle">
                    &rarr;
                </div>
                <div class="col-md-2">
                    <h4>{{ date('H:i', strtotime($train_journey->trainRoute->arrival_time)) }}</h4>
                    <small>{{ $train_journey->trainRoute->endStation->city->city }}</small>
                </div>
                <div class="col-md-2">
                    <h4>{{ $train_journey->timeRange }}</h4>
                    <small>langsung</small>
                </div>
                <div class="col-md-2">
                    <h4 class="text-warning bold">Rp {{ $train_journey->fare }}</h4>
                    
                    <form action="{{ route('passenger.train_create', ['id' => $train_journey->id]) }}" method="GET">
                        {{ csrf_field() }}
                        
                        <input type="hidden" name="class" value="{{ ucwords($train_journey->sub_class) }} ({{ $train_journey->sub_class_code }})">
                        <input type="hidden" name="adult_number" value="{{ $adult_number }}">
                        <input type="hidden" name="baby_number" value="{{ $baby_number }}">
                        <input type="hidden" name="adult_fare" value="{{ $train_journey->adult_fare }}">
                        <input type="hidden" name="baby_fare" value="{{ $train_journey->baby_fare }}">
                        <input type="hidden" name="departure_time" value="{{ $train_journey->departure_time }}">
                        <input type="hidden" name="fare_total" value="{{ $train_journey->fare }}">

                        <button type="submit" class="btn btn-sm btn-warning col-md-12">Pilih</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    var hiddenInput = {
        adult_number: $("#adult_number").val(),
        baby_number: $("#baby_number").val()
    };

    $("#ganti-pencarian").click(function(event) {
        $("#journey_search_form").slideToggle();
    });

    $("#baby").html('<option value="0">0</option>')

    for (var i = 1; i <= $("#adult").val(); i++) {
        $("#baby").append('<option value="'+i+'" '+(i == hiddenInput.baby_number ? 'selected' : '')+'>'+i+'</option>');
    }

    $("#adult").change(function (event) {
        $("#baby").html('<option value="0">0</option>')

        for (var i = 1; i <= $(this).val(); i++) {
            $("#baby").append('<option value="'+i+'">'+i+'</option>');
        }
    });
</script>
@endsection
