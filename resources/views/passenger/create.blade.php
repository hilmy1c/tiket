@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <div class="row">
        <h4><strong>Data Pemesan</strong></h4>
        <div class="col-md-8">
            <form action="{{ route('passenger.store') }}" method="POST">
                {{ csrf_field() }}

                <input type="hidden" name="booking_code" value="{{ $booking_code }}">
                <input type="hidden" name="adult_number" value="{{ $adult_number }}">
                <input type="hidden" name="child_number" value="{{ $child_number }}">
                <input type="hidden" name="baby_number" value="{{ $baby_number }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="fare" value="{{ $fare_total }}">
                <input type="hidden" name="flight_number" value="{{ $flight_number }}">
                <input type="hidden" name="adult_number" value="{{ $adult_number }}">
                <input type="hidden" name="child_number" value="{{ $child_number }}">
                <input type="hidden" name="baby_number" value="{{ $baby_number }}">
                <input type="hidden" name="adult_fare" value="{{ $adult_fare }}">
                <input type="hidden" name="child_fare" value="{{ $child_fare }}">
                <input type="hidden" name="baby_fare" value="{{ $baby_fare }}">

                <div class="panel panel-default">
                    <div class="panel-heading"><strong>Data Pemesan</strong></div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                            <span class="help-block"><strong>Sesuai KTP/paspor/SIM (tanpa tanda baca atau gelar)</strong></span>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">No. Handphone</label>
                                <div class="input-group">
                                    <span class="input-group-addon">+62</span>
                                    <input type="text" name="phone" class="form-control" value="{{ substr(Auth::user()->phone, 1) }}">
                                </div>
                                <span class="help-block"><strong>Contoh: +62812345678, (+62) Kode Negara dan No. Handphone 0812345678</strong></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                <span class="help-block"><strong>Contoh: email@example.com</strong></span>
                            </div>
                        </div>
                    </div>
                </div>

                <h4><strong>Data Wisatawan</strong></h4>
                @if ($adult_number != 0)
                    @for ($i = 1; $i <= $adult_number; $i++)
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Dewasa {{ $i }}</strong></div>
                        <div class="panel-body">
                            <span class="text-warning" style="display: inline-block; margin-bottom: 15px">Nama lengkap (sesuai KTP/SIM/Paspor)</span>
                            <div class="form-group">
                                <label>Titel</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="adult_titel_{{ $i }}" class="form-control">
                                            <option value="Tuan">Tuan</option>
                                            <option value="Nyonya">Nyonya</option>
                                            <option value="Nona">Nona</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="adult_fullname_{{ $i }}" class="form-control">
                                <span class="help-block">
                                    <strong>(tanpa gelar dan tanda baca)</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif

                @if ($child_number != 0)
                    @for ($i = 1; $i <= $child_number; $i++)
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Anak {{ $i }}</strong></div>
                        <div class="panel-body">
                            <span class="text-warning" style="display: inline-block; margin-bottom: 15px">Nama lengkap (sesuai KTP/SIM/Paspor)</span>
                            <div class="form-group">
                                <label>Titel</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="child_titel_{{ $i }}" class="form-control">
                                            <option value="Tuan">Tuan</option>
                                            <option value="Nona">Nona</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="child_fullname_{{ $i }}" class="form-control">
                                <span class="help-block">
                                    <strong>(tanpa gelar dan tanda baca)</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <select name="child_day_{{ $i }}" class="form-control select2">
                                            <?php
                                            $day=31;
                                            for ($a=01;$a<=$day;$a++)
                                            {
                                                if ($a == date('d')) {
                                                    $select = 'selected';
                                                } else {
                                                    $select = ' ';
                                                }

                                                echo "<option value='$a' ".$select.">$a</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="child_month_{{ $i }}" class="form-control select2">
                                            <?php
                                                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                $jlh_bln=count($bulan);
                                                $m = 01;
                                                for($c=0; $c<$jlh_bln; $c+=1)
                                                {
                                                    if ($m == date('m')) {
                                                        $select = 'selected';
                                                    } else {
                                                        $select = ' ';
                                                    }

                                                    echo"<option value='$m' ".$select."> $bulan[$c] </option>";
                                                    $m++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="child_year_{{ $i }}" class="form-control select2">
                                            <?php
                                            $now=date('Y');
                                            for ($a=1950;$a<=$now;$a++) 
                                            {
                                                if($a == date('Y')){
                                                    $select = 'selected';
                                                }else{
                                                    $select = '';
                                                }
                                                
                                                echo "<option value='$a' ".$select.">$a</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <span class="help-block">
                                    <strong>Penumpang Anak (2 - 11 tahun)</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif

                @if ($baby_number != 0)
                    @for ($i = 1; $i <= $baby_number; $i++)
                    <div class="panel panel-default">
                        <div class="panel-heading"><strong>Bayi {{ $i }}</strong></div>
                        <div class="panel-body">
                            <span class="text-warning" style="display: inline-block; margin-bottom: 15px">Nama lengkap (sesuai KTP/SIM/Paspor)</span>
                            <div class="form-group">
                                <label for="">Titel</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="baby_titel_{{ $i }}" class="form-control">
                                            <option value="Tuan">Tuan</option>
                                            <option value="Nona">Nona</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="baby_fullname_{{ $i }}" class="form-control">
                                <span class="help-block">
                                    <strong>(tanpa gelar dan tanda baca)</strong>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <div class="row">
                                    <div class="col-md-2">
                                        <select name="baby_day_{{ $i }}" class="form-control select2">
                                            <?php
                                            $day=31;
                                            for ($a=01;$a<=$day;$a++) 
                                            {
                                                if ($a == date('d')) {
                                                    $select = 'selected';
                                                } else {
                                                    $select = ' ';
                                                }

                                                echo "<option value='$a' ".$select.">$a</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="baby_month_{{ $i }}" class="form-control select2">
                                            <?php
                                                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                                                $jlh_bln=count($bulan);
                                                $m = 01;
                                                for($c=0; $c<$jlh_bln; $c+=1)
                                                {
                                                    if ($m == date('m')) {
                                                        $select = 'selected';
                                                    } else {
                                                        $select = ' ';
                                                    }

                                                    echo"<option value='$m' ".$select."> $bulan[$c] </option>";
                                                    $m++;
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="baby_year_{{ $i }}" class="form-control select2">
                                            <?php
                                            $now=date('Y');
                                            for ($a=1950;$a<=$now;$a++) 
                                            {
                                                if($a == date('Y')){
                                                    $select = 'selected';
                                                }else{
                                                    $select = '';
                                                }

                                                echo "<option value='$a' ".$select.">$a</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <span class="help-block">
                                    <strong>Penumpang Bayi (di bawah 2 tahun)</strong>
                                </span>
                            </div>
                        </div>
                    </div>
                    @endfor
                @endif

                <button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 20px; padding-left: 20px; padding-right: 20px">Lanjutkan</button>
            </form>
        </div>
        <div class="col-md-4">
            <h4><strong>Pesanan Anda</strong></h4>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>{{ $flight->fromAirport->city->city }} <img src="/img/icons/swipe_right.png" class="my-icon" alt=""> {{ $flight->destinationAirport->city->city }}</strong></div>
                <div class="panel-body">
                    <strong>{{ date('l, d F Y', strtotime($flight->departure_time)) }}</strong>
                    <div class="airplane-airline" style="margin-bottom: 15px">
                        <img src="{{ Storage::url($flight->airplane->airline->image) }}" alt="" width="70px" style="margin-right: 20px;">
                        <p style="display: inline-block;">
                            <strong>{{ $flight->airplane->airline->name }}</strong><br>
                            <small class="text-grey">{{ $class }}</small>
                        </p>
                    </div>
                    <div class="row" style="position: relative;">
                        <div class="vertical-line"></div>
                        <div class="col-md-6 time-range">
                            <div class="circle-invert"></div>
                            <strong style="display: block">{{ date('H:i', strtotime($flight->departure_time)) }}</strong>
                            <small class="text-grey">{{ date('d M Y', strtotime($flight->departure_time)) }}</small>
                        </div>
                        <div class="col-md-6">
                            <strong style="display: block">{{ $flight->fromAirport->city->city }} ({{ $flight->fromAirport->code }})</strong>
                            <small class="text-grey">{{ $flight->fromAirport->name }} Airport</small>
                        </div>
                        <div class="col-md-6 time-range">
                            <div class="circle-blue"></div>
                            <strong style="display: block">{{ date('H:i', strtotime($flight->arrival_time)) }}</strong>
                            <small class="text-grey">{{ date('d M Y', strtotime($flight->arrival_time)) }}</small>
                        </div>
                        <div class="col-md-6">
                            <strong style="display: block">{{ $flight->destinationAirport->city->city }} ({{ $flight->destinationAirport->code }})</strong>
                            <small class="text-grey">{{ $flight->destinationAirport->name }} Airport</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection