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
                    <label for="departure_station" class="col-md-4 control-label">Departure Station</label>
                    <div class="col-md-6">
                        <select class="form-control" name="departure_station" id="departure_station">

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_station" class="col-md-4 control-label">Arrival Station</label>
                    <div class="col-md-6">
                        <select class="form-control" name="arrival_station" id="arrival_station">

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="train_number" class="col-md-4 control-label">Train Number</label>
                    <div class="col-md-6">
                        <input id="train_number" type="text" class="form-control" name="train_number" value="{{ $train_journey->train_number }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="train_id" class="col-md-4 control-label">Train</label>
                    <div class="col-md-6">
                        <select class="form-control" name="train_id" id="train_id">
                            
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="departure_time" class="col-md-4 control-label">Departure Time</label>
                    <div class="col-md-6">
                        <input id="departure_time" type="date" class="form-control" name="departure_time" value="{{ $train_journey->departure_time }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="arrival_time" class="col-md-4 control-label">Arrival Time</label>
                    <div class="col-md-6">
                        <input id="arrival_time" type="date" class="form-control" name="arrival_time" value="{{ $train_journey->arrival_time }}" required>
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

