@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8">
            <h4><strong>Data Pemesan</strong></h4>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Data Pemesan</strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="" class="form-control">
                        <span class="help-block"><strong>Sesuai KTP/paspor/SIM (tanpa tanda baca atau gelar)</strong></span>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">No. Handphone</label>
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="text" name="" class="form-control">
                            </div>
                            <span class="help-block"><strong>Contoh: +62812345678, (+62) Kode Negara dan No. Handphone 0812345678</strong></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="email" name="" class="form-control">
                            <span class="help-block"><strong>Contoh: email@example.com</strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <h4><strong>Data Wisatawan</strong></h4>
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <span class="text-warning">Nama lengkap (sesuai KTP/SIM/Paspor)</span>
                    <div class="form-group">
                        <label for="">Titel</label>
                        <input type="email" name="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4><strong>Pesanan Anda</strong></h4>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ $flight->fromAirport->city->city }} <img src="/img/icons/swipe_right.png" class="my-icon" alt=""> {{ $flight->destinationAirport->city->city }}</strong></div>
                <div class="panel-body">
                    <strong>{{ date('l, d F Y', strtotime($flight->departure_time)) }}</strong>
                    <div class="airplane-airline">
                        <img src="{{ Storage::url($flight->airplane->airline->image) }}" alt="" width="70px" style="margin-right: 20px;">
                        <p style="display: inline-block;">
                            <strong>{{ $flight->airplane->airline->name }}</strong><br>
                            <small class="text-grey">{{ $class }}</small>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

