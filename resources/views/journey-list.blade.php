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
                <h3>Bandung (BD) &rarr; Malang (ML)</h3>
                <div class="flight-detail">
                    Sabtu, 17 Februari 2018 | 1 Dewasa, 1 Bayi
                    <button class="btn btn-primary pull-right" id="ganti-pencarian">Ganti Pencarian</button>
                </div>
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
                    <small>Ekonomi (C)</small>
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
                    <h4>15j 20m</h4>
                    <small>langsung</small>
                </div>
                <div class="col-md-2">
                    <h4 class="text-warning bold">Rp 250.000</h4>
                    
                    <form action="" method="GET">
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
        
    });
</script>
@endsection
