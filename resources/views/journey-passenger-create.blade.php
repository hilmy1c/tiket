@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <h4><strong>Data Pemesan yang Dapat Dihubungi</strong></h4>

    <div class="row">
        <div class="col-md-7">
            <form action="{{ route('passenger.train_store') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="booking_code" value="{{ $booking_code }}">
                <input type="hidden" name="adult_number" value="{{ $adult_number }}">
                <input type="hidden" name="baby_number" value="{{ $baby_number }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="fare_total" value="{{ $fare_total }}">
                <input type="hidden" name="train_journey_id" value="{{ $train_journey->id }}">
                <input type="hidden" name="adult_fare" value="{{ $adult_fare }}">
                <input type="hidden" name="baby_fare" value="{{ $baby_fare }}">
                <input type="hidden" name="class" value="{{ $class }}">

                <div class="panel panel-default" style="box-sizing: border-box; border-left: 3px solid #2196f3">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="customer_name" class="form-control" value="{{ Auth::user()->name }}">
                            <span class="help-block"><strong>Sesuai KTP/paspor/SIM (tanpa tanda baca atau gelar)</strong></span>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">No. Handphone</label>
                                <div class="input-group">
                                    <span class="input-group-addon">+62</span>
                                    <input type="text" name="customer_phone" class="form-control" value="{{ substr(Auth::user()->phone, 1) }}">
                                </div>
                                <span class="help-block"><strong>Contoh: +62812345678, (+62) Kode Negara dan No. Handphone 0812345678</strong></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="customer_email" class="form-control" value="{{ Auth::user()->email }}">
                                <span class="help-block"><strong>Contoh: email@example.com</strong></span>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="bold">Data Penumpang</h4>
                <div class="panel panel-default" style="box-sizing: border-box; border-left: 3px solid #ffa000">
                    <div class="panel-body">
                        <div class="col-md-1">
                            <img src="/img/icons/info-warning.png" alt="">
                        </div>
                        <div class="col-md-11">
                            <ul>
                                <li>Detail penumpang harus dituliskan sesuai dengan KTP / SIM / paspor</li>
                                <li>Data penumpang tidak dapat diubah setelah melewati halaman ini</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                @if ($adult_number != 0)
                    @for ($i = 1; $i <= $adult_number; $i++)
                    <div class="panel panel-default" style="box-sizing: border-box; border-left: 3px solid #2196f3">
                        <div class="panel-body">
                            <h4 class="booking-sub-title"><span class="text-black">Penumpang Dewasa</span> (3 Tahun Keatas)</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Titel</label>
                                    <select name="adult_appellation_{{ $i }}" class="form-control">
                                        <option value="Tuan">Tuan</option>
                                        <option value="Nyonya">Nyonya</option>
                                        <option value="Nona">Nona</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Nama Penumpang</label>
                                    <input type="text" name="adult_fullname_{{ $i }}" class="form-control">
                                    <span class="help-block strong">Nama sesuai KTP/SIM/paspor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif

                @if ($baby_number != 0)
                    @for ($i = 1; $i <= $baby_number; $i++)
                    <div class="panel panel-default" style="box-sizing: border-box; border-left: 3px solid #2196f3">
                        <div class="panel-body">
                            <h4 class="booking-sub-title"><span class="text-black">Penumpang Bayi</span> (3 Tahun Kebawah)</h4>
                            
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="">Titel</label>
                                    <select name="baby_appellation_{{ $i }}" class="form-control">
                                        <option value="Tuan">Tuan</option>
                                        <option value="Nona">Nona</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="">Nama Penumpang</label>
                                    <input type="text" name="baby_fullname_{{ $i }}" class="form-control">
                                    <span class="help-block strong">Nama sesuai KTP/SIM/paspor</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif

                <h4 class="bold">Rincian Harga</h4>

                <div class="panel panel-default" style="box-sizing: border-box; border-left: 3px solid #2196f3">
                    <div class="panel-body" style="padding-bottom: 0px">
                        @if ($adult_fare != 0)
                        <div class="row">
                            <div class="col-md-8">
                                {{ $train_journey->trainRoute->train->name }} (Dewasa) x{{ $adult_number }}
                            </div>
                            <div class="col-md-4 text-right">
                                Rp. {{ $adult_fare }}
                            </div>
                        </div>
                        @endif

                        @if ($baby_number != 0)
                        <div class="row">
                            <div class="col-md-8">
                                {{ $train_journey->trainRoute->train->name }} (Bayi) x{{ $baby_number }}
                            </div>
                            <div class="col-md-4 text-right">
                                Rp. {{ $baby_fare }}
                            </div>
                        </div>
                        @endif

                        <div class="row bg-default" style="margin-top: 10px">
                            <div class="col-md-8">
                                <span class="booking-price-total">Total</span>
                            </div>
                            <div class="col-md-4 text-right">
                                <span class="bold booking-price-total">Rp. {{ $fare_total }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-warning pull-right" style="margin-bottom: 20px; padding-left: 20px; padding-right: 20px">Lanjutkan</button>
            </form>
        </div>
            
        
        <div class="col-md-4">
            <div class="panel panel-default" style="background-color: #f7f7f7">
                <div class="panel-heading" style="background-color: #ddd;color: #000">
                    <h4 class="bold">Perjalanan Kereta</h4>
                    <span class="text-grey">{{ date('l, d F Y', strtotime($departure_time)) }}</span>
                </div>
                <div class="panel-body">
                    <span class="bold">{{ $train_journey->trainRoute->train->name }}</span><br>
                    <span>{{ ucwords($train_journey->sub_class) }} ({{ $train_journey->sub_class_code }})</span><br><br>
                    <div class="row" style="position: relative;">
                        <div class="vertical-line"></div>
                        <div class="col-md-6 time-range" style="min-height: 70px">
                            <div class="circle-invert"></div>
                            <strong style="display: block">{{ date('H:i', strtotime($train_journey->trainRoute->departure_time)) }}</strong>
                            <small class="text-grey">{{ date('d M Y', strtotime($train_journey->departure_time)) }}</small>
                        </div>
                        <div class="col-md-6" style="min-height: 70px">
                            <strong style="display: block">{{ $train_journey->startStation->city->city }} ({{ $train_journey->startStation->code }})</strong>
                            <small class="text-grey">Stasiun {{ $train_journey->startStation->name }}</small>
                        </div>
                        <div class="col-md-6 time-range" style="min-height: 70px;">
                            <div class="circle-blue"></div>
                            <div style="position: absolute; bottom: 0">
                                <strong style="display: block">{{ date('H:i', strtotime($train_journey->trainRoute->arrival_time)) }}</strong>
                                <small class="text-grey">{{ date('d M Y', strtotime($train_journey->arrival_time)) }}</small>
                            </div>
                        </div>
                        <div class="col-md-6" style="min-height: 70px;">
                            <div style="position: absolute; bottom: 0">
                                <strong style="display: block">{{ $train_journey->endStation->city->city }} ({{ $train_journey->endStation->code }})</strong>
                                <small class="text-grey">Stasiun {{ $train_journey->endStation->name }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection