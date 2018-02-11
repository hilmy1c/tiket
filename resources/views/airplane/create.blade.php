@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Pesawat</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('airplane.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="aircraft_type" class="col-md-4 control-label">Tipe Pesawat</label>
                    <div class="col-md-6">
                        <input id="aircraft_type" type="text" class="form-control" name="aircraft_type" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="economy_seat_number" class="col-md-4 control-label">Jumlah Kursi Ekonomi</label>
                    <div class="col-md-6">
                        <input id="economy_seat_number" type="number" class="form-control" name="economy_seat_number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="business_seat_number" class="col-md-4 control-label">Jumlah Kursi Bisnis</label>
                    <div class="col-md-6">
                        <input id="business_seat_number" type="number" class="form-control" name="business_seat_number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="airline_id" class="col-md-4 control-label">Maskapai</label>
                    <div class="col-md-6">
                        <select name="airline_id" id="airline_id" class="form-control">
                            @foreach ($airlines as $airline)
                            <option value="{{ $airline->id }}">{{ $airline->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

