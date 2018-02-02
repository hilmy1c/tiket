@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="my-container">
        <h3 style="color: #fff">Jakarta - Soekarno-Hatta (CGK) &rarr; Denpasar - Ngurah Rai (DPS)</h3>
        <div class="flight-detail" style="color: #fff">
            Rabu, 31 Januari 2018 | 1 Dewasa | Economy
        </div>
    </div>
</div>
<div class="bg-default">
    <div class="my-container">
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
                <div class="col-md-3">
                    <img src="{{ Storage::url($flight->airplane->airline->image) }}" alt="" class="my-icon-sm">&nbsp;&nbsp;{{ $flight->airplane->airline->name }}
                </div>
                <div class="col-md-2">
                    <h4>{{ date('H:i', strtotime($flight->departure_time)) }}</h4>
                    <small>{{ $flight->fromAirport->city }} ({{ $flight->fromAirport->code }})</small>
                </div>
                <div class="col-md-1">
                    &rarr;
                </div>
                <div class="col-md-2">
                    <h4>{{ date('H:i', strtotime($flight->arrival_time)) }}</h4>
                    <small>{{ $flight->destinationAirport->city }} ({{ $flight->destinationAirport->code }})</small>
                </div>
                <div class="col-md-2">
                    <h4>1j 50m</h4>
                    <small>langsung</small>
                </div>
                <div class="col-md-2">
                    <h4 class="text-warning">Rp 520.300</h4>
                    <button class="btn btn-sm btn-warning col-md-12">Pilih</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
