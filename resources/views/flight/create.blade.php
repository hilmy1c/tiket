@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Penerbangan</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('flight.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="flight_number" class="col-md-4 control-label">No. Penerbangan</label>
                    <div class="col-md-6">
                        <input id="flight_number" type="text" class="form-control" name="flight_number" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="airplane_id" class="col-md-4 control-label">Pesawat</label>
                    <div class="col-md-6">
                        <select class="form-control" name="airplane_id" id="airplane_id">
                            @foreach ($airplanes as $airplane)
                            <option value="{{ $airplane->id }}">{{ $airplane->airline->name }} - {{ $airplane->aircraft_type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="from_airport_id" class="col-md-4 control-label">Dari</label>
                    <div class="col-md-6">
                        <select class="form-control" name="from_airport_id" id="from_airport_id">
                            @foreach ($airports as $airport)
                            <option value="{{ $airport->id }}">{{ $airport->city->city }} - ({{ $airport->code }}) {{ $airport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="destination_airport_id" class="col-md-4 control-label">Tujuan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="destination_airport_id" id="destination_airport_id">
                            @foreach ($airports as $airport)
                            <option value="{{ $airport->id }}">{{ $airport->city->city }} - ({{ $airport->code }}) {{ $airport->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departure_time" class="col-md-4 control-label">Waktu Keberangkatan</label>
                    <div class="col-md-6">
                        <input id="departure_time" type="datetime-local" class="form-control" name="departure_time" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_time" class="col-md-4 control-label">Waktu Tiba</label>
                    <div class="col-md-6">
                        <input id="arrival_time" type="datetime-local" class="form-control" name="arrival_time" required>
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

<script type="text/javascript">
    $("#airplane_id").change(function (event) {
        var id = $(this).val();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('flight/get_flight_number') . '/' }}" + id,
            type: "POST",
            success: function (res) {
                $("#flight_number").val(res);
            },
        });
    });
</script>
@endsection

