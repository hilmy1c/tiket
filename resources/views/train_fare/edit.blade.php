@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Tarif Perjalanan Kereta {{ $train_fare->trainJourney->sub_class }} ({{ $train_fare->trainJourney->sub_class_code }}) <strong>{{ $train_fare->trainJourney->startStation->city->city }} ({{ $train_fare->trainJourney->startStation->code }}) - {{ $train_fare->trainJourney->endStation->city->city }} ({{ $train_fare->trainJourney->endStation->code }})</strong></div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_fare.update', ['id' => $train_fare->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="fare" class="col-md-4 control-label">Tarif</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="fare" type="text" class="form-control money" name="fare" value="{{ $train_fare->fare }}" required>
                        </div>
                    </div>
                </div>

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
     $(".money").keyup(function(event) {
        if (event.which >= 37 && event.which <= 40) return;
        
        $(this).val(function(index, value) {
            return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        });
    });
</script>
@endsection

