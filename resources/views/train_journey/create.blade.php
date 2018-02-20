@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_journey.store') }}">
                {{ csrf_field() }}

                 <div class="form-group">
                    <label for="train_id" class="col-md-4 control-label">Kereta</label>
                    <div class="col-md-6">
                        <select class="form-control" name="train_id" id="train_id">
                            <option value="">---- Pilih Kereta ----</option>
                            @foreach ($trains as $train)
                            <option value="{{ $train->id }}">{{ $train->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="pilih_rute" class="col-md-4 control-label">Pilih Rute</label>
                    <div class="col-md-6">
                        <select class="form-control" name="pilih_rute" id="pilih_rute">
                            
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="departure_station" class="col-md-4 control-label">Stasiun Keberangkatan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="departure_station" id="departure_station">
                            
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="arrival_station" class="col-md-4 control-label">Stasiun Kedatangan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="arrival_station" id="arrival_station">
                            
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="departure_time" class="col-md-4 control-label">Tanggal Keberangkatan</label>
                    <div class="col-md-6">
                        <input id="departure_time" type="date" class="form-control" name="departure_time" required>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="arrival_time" class="col-md-4 control-label">Tanggal Tiba</label>
                    <div class="col-md-6">
                        <input id="arrival_time" type="date" class="form-control" name="arrival_time" required>
                    </div>
                </div>

                <input type="hidden" name="train_route_id" id="train_route_id">

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $("#train_id").change(function(event) {
        $("#pilih_rute").empty();
        $("#departure_station").empty();
        $("#arrival_station").empty();

        var id = $(this).val();

        getRoute(id);

        $(".form-group").slideDown();
    });

    $("#pilih_rute").change(function(event) {
        $("#departure_station").empty();
        $("#arrival_station").empty();

        getRoute($("#train_id").val());
    });

    $("#departure_station").change(function(event) {
        $("#arrival_station").empty();

        getEndStation($("#pilih_rute").val(), $(this).val());
    });

    function getRoute(id) {
        return $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_journey/get_route') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
                $.each(res, function (index, val) {
                    $("#pilih_rute").append('<option value="' + val.id + '">' + val.start_station.city.city + ' (' + val.start_station.code + ')  - ' + val.end_station.city.city + ' (' + val.end_station.code + ')</option>');
                });

                getStartStation($("#pilih_rute").val());
            }
        });
    }

    function getStartStation(id) {
        return $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_journey/get_start_station') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
                $.each(res, function(index, val) {
                    $("#departure_station").append(val);
                });

                getEndStation($("#pilih_rute").val(),  $("#departure_station").val());
            }
        });
    }

    function getEndStation(id, startStation) {
        return $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_journey/get_end_station') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            data: {
                start_station: startStation
            },
            success: function (res) {
                $.each(res, function(index, val) {
                    $("#arrival_station").append(val);
                });
            }
        });
    }
</script>
@endsection

