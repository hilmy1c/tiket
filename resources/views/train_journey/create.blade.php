@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Perjalanan Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_journey.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="train_id" class="col-md-4 control-label">Kereta</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <select class="form-control" name="train_id" id="train_id">
                                    <option value="" id="not">---- Pilih Kereta ----</option>
                                    @foreach ($trains as $train)
                                    <option value="{{ $train->name }}">{{ $train->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="train_number" id="train_number">
                                    <option value="" id="not">---- Pilih No. KA ----</option>

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class="form-group" style="display: none;">
                    <label for="sub_class" class="col-md-4 control-label">Sub Kelas</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <select class="form-control" name="sub_class" id="sub_class">
                                    <option value="" id="not">---- Pilih Kelas ----</option>

                                </select>
                            </div>
                            <div class="col-md-5">
                                <select class="form-control" name="sub_class_code" id="sub_class_code">
                                    <option value="" id="not">---- Pilih Kode ----</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="pilih_rute" class="col-md-4 control-label">Rute</label>
                    <div class="col-md-6">
                        <select class="form-control" name="pilih_rute" id="pilih_rute">
                            <option value="" id="not">---- Pilih Rute ----</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="departure_station" class="col-md-4 control-label">Stasiun Keberangkatan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="departure_station" id="departure_station">
                            <option value="" id="not">---- Pilih Stasiun Keberangkatan ----</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group" style="display: none;">
                    <label for="arrival_station" class="col-md-4 control-label">Stasiun Kedatangan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="arrival_station" id="arrival_station">
                            <option value="" id="not">---- Pilih Stasiun Kedatangan ----</option>
                            
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
    if ($("#sub_class").val() == "executive") {
        $("#sub_class_code").append('<option value="A">A</option><option value="H">H</option><option value="I">I</option><option value="J">J</option><option value="X">X</option>');
    }
    if ($("#sub_class").val() == "business") {
        $("#sub_class_code").append('<option value="B">B</option><option value="K">K</option><option value="N">N</option><option value="O">O</option><option value="Y">Y</option>');
    }

    if ($("#sub_class").val() == "economy") {
        $("#sub_class_code").append('<option value="C">C</option><option value="P">P</option><option value="Q">Q</option><option value="S">S</option><option value="Z">Z</option>');
    }

    $("#sub_class").change(function(event) {
        $("#sub_class_code option").not("#not").remove();

        if ($(this).val() == "executive") {
            $("#sub_class_code").append('<option value="A">A</option><option value="H">H</option><option value="I">I</option><option value="J">J</option><option value="X">X</option>');
        }
        if ($(this).val() == "business") {
            $("#sub_class_code").append('<option value="B">B</option><option value="K">K</option><option value="N">N</option><option value="O">O</option><option value="Y">Y</option>');
        }

        if ($(this).val() == "economy") {
            $("#sub_class_code").append('<option value="C">C</option><option value="P">P</option><option value="Q">Q</option><option value="S">S</option><option value="Z">Z</option>');
        }
    });

    $("#train_id").change(function(event) {
        $("#pilih_rute option").not("#not").remove();
        $("#departure_station option").not("#not").remove();
        $("#arrival_station option").not("#not").remove();
        $("#train_number option").not("#not").remove();
        $("#sub_class option").not("#not").remove();
        $("#sub_class_code option").not("#not").remove();

        var id = $(this).val();

        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_route/get_train_number') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
                $.each(res, function (index, val) {
                    $("#train_number").append('<option value="' + val.id + '">' + val.train_number + '</option>');
                });

                getTrainSubClass(id);
            }
        });
    });

    $("#train_number").change(function(event) {
        $("#pilih_rute option").not("#not").remove();
        $("#departure_station option").not("#not").remove();
        $("#arrival_station option").not("#not").remove();
        $("#sub_class option").not("#not").remove();
        $("#sub_class_code option").not("#not").remove();

        var id = $(this).val();

        getRoute(id);

        $(".form-group").slideDown();
    });

    $("#pilih_rute").change(function(event) {
        $("#departure_station option").not("#not").remove();
        $("#arrival_station option").not("#not").remove();

        getStartStation($("#pilih_rute").val());
    });

    $("#departure_station").change(function(event) {
        $("#arrival_station option").not("#not").remove();

        getEndStation($("#pilih_rute").val(), $(this).val());
    });

    function getTrainSubClass(id) {
        return $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_journey/get_train_seat_number') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
                if (res.economy_seat_number != 0) {
                    $("#sub_class").append('<option value="economy">Ekonomi</option>');
                }

                if (res.business_seat_number != 0) {
                    $("#sub_class").append('<option value="business">Bisnis</option>');
                }

                if (res.executive_seat_number != 0) {
                    $("#sub_class").append('<option value="executive">Eksekutif</option>');
                }
            }
        });
    }

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

                getTrainSubClass($("#train_id").val());
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

