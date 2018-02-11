@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Tarif Penerbangan {{ $flight->flight_number }}</strong></h4>
    <div class="panel panel-default">

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('flight_fare.store') }}">
                {{ csrf_field() }}

                <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                <h4 class="text-center">Kelas Ekonomi</h4>
                <div class="divider"></div>

                <div class="form-group">
                    <label for="economy_adult" class="col-md-4 control-label">Dewasa</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="economy_adult" type="text" class="form-control money" name="economy_adult" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="economy_child" class="col-md-4 control-label">Anak-Anak</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="economy_child" type="text" class="form-control money" name="economy_child" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="economy_baby" class="col-md-4 control-label">Bayi</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="economy_baby" type="text" class="form-control money" name="economy_baby" required>
                        </div>
                    </div>
                </div>

                <h4 class="text-center">Kelas Bisnis</h4>
                <div class="divider"></div>

                <div class="form-group">
                    <label for="business_adult" class="col-md-4 control-label">Dewasa</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="business_adult" type="text" class="form-control money" name="business_adult" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="business_child" class="col-md-4 control-label">Anak-Anak</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="business_child" type="text" class="form-control money" name="business_child" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="business_baby" class="col-md-4 control-label">Bayi</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="business_baby" type="text" class="form-control money" name="business_baby" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(".money").keyup(function(event) {
        if (event.which >= 37 && event.which <= 40) return;
        
        $(this).val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });

        if ($(this).attr('id') == 'economy_adult') {
            var valChild = unformatUang($(this).val()) * 75 / 100,
                valBaby = unformatUang($(this).val()) * 50 / 100;

            $("#economy_child").val(formatUang(valChild));
            $("#economy_baby").val(formatUang(valBaby));
        }

        if ($(this).attr('id') == 'business_adult') {
            var valChild = unformatUang($(this).val()) * 75 / 100,
                valBaby = unformatUang($(this).val()) * 50 / 100;

            $("#business_child").val(formatUang(valChild));
            $("#business_baby").val(formatUang(valBaby));
        }
    });

    function formatUang(text) {
        return text.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    
    function unformatUang(text) {
        return parseInt(text.split('.').join(""));
    }
</script>
@endsection

