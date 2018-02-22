@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Edit</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_journey.update', ['id' => $train_journey->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="train_id" class="col-md-4 control-label">Kereta</label>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-7">
                                <select class="form-control" name="train_id" id="train_id">
                                    <option value="" id="not">---- Pilih Kereta ----</option>
                                    @foreach ($trains as $train)
                                    <option value="{{ $train->name }}" {{ ($train->name == $train_journey->trainRoute->train->name) ? 'selected' : '' }}>{{ $train->name }}</option>
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

                 <div class="form-group">
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

                <div class="form-group">
                    <label for="pilih_rute" class="col-md-4 control-label">Rute</label>
                    <div class="col-md-6">
                        <select class="form-control" name="pilih_rute" id="pilih_rute">
                            <option value="" id="not">---- Pilih Rute ----</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departure_station" class="col-md-4 control-label">Stasiun Keberangkatan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="departure_station" id="departure_station">
                            <option value="" id="not">---- Pilih Stasiun Keberangkatan ----</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_station" class="col-md-4 control-label">Stasiun Kedatangan</label>
                    <div class="col-md-6">
                        <select class="form-control" name="arrival_station" id="arrival_station">
                            <option value="" id="not">---- Pilih Stasiun Kedatangan ----</option>
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departure_time" class="col-md-4 control-label">Tanggal Keberangkatan</label>
                    <div class="col-md-6">
                        <input id="departure_time" type="date" class="form-control" name="departure_time" value="{{ $train_journey->departure_time }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_time" class="col-md-4 control-label">Tanggal Tiba</label>
                    <div class="col-md-6">
                        <input id="arrival_time" type="date" class="form-control" name="arrival_time" value="{{ $train_journey->arrival_time }}" required>
                    </div>
                </div>

                <input type="hidden" id="input_journey_id" value="{{ $train_journey->id }}">
                <input type="hidden" id="input_route" value="{{ $train_journey->train_route_id }}">
                <input type="hidden" id="input_train_id" value="{{ $train_journey->trainRoute->train_id }}">
                <input type="hidden" id="input_sub_class" value="{{ $train_journey->sub_class }}">
                <input type="hidden" id="input_sub_class_code" value="{{ $train_journey->sub_class_code }}">

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var hiddenInput = {
        route: $("#input_route").val(),
        journeyId: $("#input_journey_id").val(),
        trainId: $("#input_train_id").val(),
        subClassCode: $("#input_sub_class_code").val(),
        subClass: $("#input_sub_class").val()
    };

    getTrainNumber($("#train_id").val());

    $("#train_id").change(function(event) {
        $("#pilih_rute option").not("#not").remove();
        $("#departure_station option").not("#not").remove();
        $("#arrival_station option").not("#not").remove();
        $("#train_number option").not("#not").remove();
        $("#sub_class option").not("#not").remove();
        $("#sub_class_code option").not("#not").remove();

        var id = $(this).val();

        getTrainNumber(id);
    });

    $("#train_number").change(function(event) {
        $("#pilih_rute option").not("#not").remove();
        $("#departure_station option").not("#not").remove();
        $("#arrival_station option").not("#not").remove();
        $("#sub_class option").not("#not").remove();
        $("#sub_class_code option").not("#not").remove();

        var id = $(this).val();

        getRoute(id);
    });

    $("#pilih_rute").change(function(event) {
        ("#departure_station option").not("#not").remove();
        $("#arrival_station option").not("#not").remove();

        getStartStation($(this).val());
    });

    $("#departure_station").change(function(event) {
        $("#arrival_station").empty();

        getEndStation($("#pilih_rute").val(), $(this).val());
    });

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
                    $("#pilih_rute").append('<option value="' + val.id + '" ' + (val.id == hiddenInput.route ? "selected" : "") +'>' + val.start_station.city.city + ' (' + val.start_station.code + ')  - ' + val.end_station.city.city + ' (' + val.end_station.code + ')</option>');
                });

                editStartStation($("#pilih_rute").val());
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

    function editStartStation(id) {
        return $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_journey/edit_start_station') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            data: {
                train_journey_id: hiddenInput.journeyId
            },
            success: function (res) {
                $.each(res, function(index, val) {
                    $("#departure_station").append(val);
                });

                editEndStation($("#pilih_rute").val(),  $("#departure_station").val());
            }
        });
    }

    function editEndStation(id, startStation) {
        return $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_journey/edit_end_station') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            data: {
                train_journey_id: hiddenInput.journeyId,
                start_station: startStation
            },
            success: function (res) {
                $.each(res, function(index, val) {
                    $("#arrival_station").append(val);
                });
            }
        });
    }

    function getTrainNumber(id) {
        $.ajax({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('train_route/get_train_number') . '/' }}" + id,
            type: "POST",
            dataType: "json",
            success: function (res) {
                $.each(res, function (index, val) {
                    $("#train_number").append('<option value="' + val.id + '" ' + (val.id == hiddenInput.trainId ? 'selected' : '') + '>' + val.train_number + '</option>');
                });

                getTrainSubClass(id);
                getRoute($("#train_number").val());
            }
        });
    }

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
                    $("#sub_class").append('<option value="economy" '+(hiddenInput.subClass == 'economy' ? 'selected' : '')+'>Ekonomi</option>');
                }

                if (res.business_seat_number != 0) {
                    $("#sub_class").append('<option value="business" '+(hiddenInput.subClass == 'business' ? 'selected' : '')+'>Bisnis</option>');
                }

                if (res.executive_seat_number != 0) {
                    $("#sub_class").append('<option value="executive" '+(hiddenInput.subClass == 'executive' ? 'selected' : '')+'>Eksekutif</option>');
                }

                if ($("#sub_class").val() == "executive") {
                    $("#sub_class_code").append('<option value="A" '+ (hiddenInput.subClassCode == 'A' ? 'selected' : '') +'>A</option><option value="H" '+ (hiddenInput.subClassCode == 'H' ? 'selected' : '') +'>H</option><option value="I" '+ (hiddenInput.subClassCode == 'I' ? 'selected' : '') +'>I</option><option value="J" '+ (hiddenInput.subClassCode == 'J' ? 'selected' : '') +'>J</option><option value="X" '+ (hiddenInput.subClassCode == 'X' ? 'selected' : '') +'>X</option>');
                }
                if ($("#sub_class").val() == "business") {
                    $("#sub_class_code").append('<option value="B" '+ (hiddenInput.subClassCode == 'B' ? 'selected' : '') +'>B</option><option value="K" '+ (hiddenInput.subClassCode == 'K' ? 'selected' : '') +'>K</option><option value="N" '+ (hiddenInput.subClassCode == 'N' ? 'selected' : '') +'>N</option><option value="O" '+ (hiddenInput.subClassCode == 'O' ? 'selected' : '') +'>O</option><option value="Y" '+ (hiddenInput.subClassCode == 'Y' ? 'selected' : '') +'>Y</option>');
                }

                if ($("#sub_class").val() == "economy") {
                    $("#sub_class_code").append('<option value="C" '+ (hiddenInput.subClassCode == 'C' ? 'selected' : '') +'>C</option><option value="P" '+ (hiddenInput.subClassCode == 'P' ? 'selected' : '') +'>P</option><option value="Q" '+ (hiddenInput.subClassCode == 'Q' ? 'selected' : '') +'>Q</option><option value="S" '+ (hiddenInput.subClassCode == 'S' ? 'selected' : '') +'>S</option><option value="Z" '+ (hiddenInput.subClassCode == 'Z' ? 'selected' : '') +'>Z</option>');
                }
            }
        });
    }
</script>
@endsection

