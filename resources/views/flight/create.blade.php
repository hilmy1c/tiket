@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('flight.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="flight_number" class="col-md-4 control-label">Flight Number</label>
                            <div class="col-md-6">
                                <input id="flight_number" type="text" class="form-control" name="flight_number" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="airplane_id" class="col-md-4 control-label">Airplane</label>
                            <div class="col-md-6">
                                <select class="form-control" name="airplane_id" id="airplane_id">
                                    @foreach ($airplanes as $airplane)
                                    <option value="{{ $airplane->id }}">{{ $airplane->airline->name }} : {{ $airplane->aircraft_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="from_airport_id" class="col-md-4 control-label">From</label>
                            <div class="col-md-6">
                                <select class="form-control" name="from_airport_id" id="from_airport_id">
                                    @foreach ($airports as $airport)
                                    <option value="{{ $airport->id }}">{{ $airport->city }} : {{ $airport->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="destination_airport_id" class="col-md-4 control-label">Destination</label>
                            <div class="col-md-6">
                                <select class="form-control" name="destination_airport_id" id="destination_airport_id">
                                @foreach ($airports as $airport)
                                <option value="{{ $airport->id }}">{{ $airport->city }} : {{ $airport->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="departure_time" class="col-md-4 control-label">Departure Time</label>
                            <div class="col-md-6">
                                <input id="departure_time" type="date" class="form-control" name="departure_time" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="arrival_time" class="col-md-4 control-label">Arrival Time</label>
                            <div class="col-md-6">
                                <input id="arrival_time" type="date" class="form-control" name="arrival_time" required>
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
    </div>
</div>
@endsection
