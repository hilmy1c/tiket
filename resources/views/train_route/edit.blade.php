@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Edit Rute Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_route.update', ['id' => $train_route->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="train" class="col-md-4 control-label">Kereta</label>
                    <div class="col-md-6">
                        <select class="form-control" name="train" id="train">
                            @foreach ($trains as $train)
                            <option value="{{ $train->id }}" {{ ($train_route->train_id == $train->id) ? 'selected' : '' }}>{{ $train->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="train" class="col-md-4 control-label">Rute Awal</label>
                    <div class="col-md-6">
                        <select class="form-control" name="start_route" id="start_route">
                            @foreach ($train_stations as $train_station)
                            <option value="{{ $train_station->id }}" {{ ($train_route->start_route == $train_station->id) ? 'selected' : '' }}>Stasiun {{ $train_station->name }} - {{ $train_station->city->city }} ({{ $train_station->code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departure_time" class="col-md-4 control-label">Waktu Keberangkatan</label>
                    <div class="col-md-6">
                        <input type="time" name="departure_time" class="form-control" value="{{ $train_route->departure_time }}">
                    </div>
                </div>
                
                <?php $number = 2 ?>
                @for ($i = 1; $i <= sizeof(unserialize($train_route->full_route)) - 2; $i++)
                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Rute {{ $number }}</label>
                        <div class="col-md-6">
                            <select class="form-control" name="route{{ $number }}" id="">
                                @foreach ($train_stations as $station)
                                <option value="{{ $station->id }}" {{ ($station->id == unserialize($train_route->full_route)[$number]) ? 'selected' : '' }}>{{ $station->name }} - {{ $station->city->city }} ({{ $station->code }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-md-4 control-label">Waktu Tiba & Berangkat</label>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="time" name="departure_time{{ $number }}" class="form-control" value="{{ unserialize($train_route->full_departure_time)[$number] }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="time" name="arrival_time{{ $number }}" class="form-control" value="{{ unserialize($train_route->full_arrival_time)[$number] }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $number++ ?>
                @endfor

                <input type="hidden" name="route_number" value="{{ $number }}">

                <div class="form-group">
                    <label for="train" class="col-md-4 control-label">Rute Akhir</label>
                    <div class="col-md-6">
                        <select class="form-control" name="end_route" id="end_route">
                            @foreach ($train_stations as $train_station)
                            <option value="{{ $train_station->id }}" {{ ($train_route->end_route == $train_station->id) ? 'selected' : '' }}>Stasiun {{ $train_station->name }} - {{ $train_station->city->city }} ({{ $train_station->code }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_time" class="col-md-4 control-label">Waktu Kedatangan</label>
                    <div class="col-md-6">
                        <input type="time" name="arrival_time" class="form-control" value="{{ $train_route->arrival_time }}">
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

