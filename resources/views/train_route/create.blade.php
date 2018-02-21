@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Rute Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_route.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="train" class="col-md-4 control-label">Kereta & No. KA</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-8">
                                <select class="form-control" name="train" id="train">
                                    <option value="">---- Pilih Kereta ----</option>
                                    @foreach ($trains as $train)
                                    <option value="{{ $train->name }}">{{ $train->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select class="form-control" name="train_number" id="train_number">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="train" class="col-md-4 control-label">Rute Awal</label>
                    <div class="col-md-6">
                        <select class="form-control" name="start_route" id="start_route">
                            @foreach ($train_stations as $train_station)
                            <option value="{{ $train_station->id }}">Stasiun {{ $train_station->name }} - {{ $train_station->city->city }} ({{ $train_station->code }})</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="add_input"><i class="glyphicon glyphicon-plus"></i></button>
                    <button type="button" class="btn btn-danger" id="remove_input"><i class="glyphicon glyphicon-minus"></i></button>
                </div>

                <div class="form-group">
                    <label for="departure_time" class="col-md-4 control-label">Waktu Keberangkatan</label>
                    <div class="col-md-6">
                        <input type="time" name="departure_time" class="form-control">
                    </div>
                </div>

                <div class="dropdown-list"></div>

                <div class="form-group">
                    <label for="train" class="col-md-4 control-label">Rute Akhir</label>
                    <div class="col-md-6">
                        <select class="form-control" name="end_route" id="end_route">
                            @foreach ($train_stations as $train_station)
                            <option value="{{ $train_station->id }}">Stasiun {{ $train_station->name }} - {{ $train_station->city->city }} ({{ $train_station->code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_time" class="col-md-4 control-label">Waktu Kedatangan</label>
                    <div class="col-md-6">
                        <input type="time" name="arrival_time" class="form-control">
                    </div>
                </div>

                <input type="hidden" name="route_number" id="route_number">

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
    var i = 2;

    $("#train").change(function(event) {
        var id = $(this).val();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_route/get_train_number') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
                console.log(res);
            }
        });
    });

    $("#add_input").click(function(event) {
        var optionEl = '';

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_route/get_station') }}",
            type: "POST",
            dataType: "json",
            success: function (res) {
                $.each(res, function (index, val) {
                    optionEl += '<option value="' + val.id + '">Stasiun ' + val.name + ' - ' + val.city.city + ' (' + val.code + ')</option>';
                });

                var html = '<div id="'+i+'"><div class="form-group"><label for="" class="col-md-4 control-label">Rute ' + i + '</label><div class="col-md-6"><select class="form-control" name="route' + i + '" id="">' + optionEl + '</select></div></div><div class="form-group"><label for="" class="col-md-4 control-label">Waktu Tiba & Berangkat</label><div class="col-md-6"><div class="row"><div class="col-md-6"><input type="time" name="departure_time'+i+'" class="form-control"></div><div class="col-md-6"><input type="time" name="arrival_time'+i+'" class="form-control"></div></div></div></div></div>';

                $("#add_input").closest('form').find('.dropdown-list').append(html);
                $("#route_number").val(i);
                i++;
            }
        });
    });

    $("#remove_input").click(function(event) {
        $("#" + i).remove();

        if (i > 2) {
            i--;
        }

        $("#route_number").val(($("#2").length == 0) ? 0 : i);
    });
</script>
@endsection

