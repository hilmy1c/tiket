@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Edit Tarif Penerbangan {{ $flight_fare->class }} ({{ $flight_fare->passenger }}) <strong>{{ $flight_fare->flight->flight_number }}</strong></div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('flight_fare.update', ['id' => $flight_fare->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="fare" class="col-md-4 control-label">Tarif</label>
                    <div class="col-md-6">
                        <div class="input-group">
                            <span class="input-group-addon">Rp.</span>
                            <input id="fare" type="text" class="form-control money" name="fare" value="{{ $flight_fare->fare }}" required>
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
@endsection

