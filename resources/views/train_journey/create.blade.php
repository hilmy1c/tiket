@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('train_journey.store') }}">
                        {{ csrf_field() }}

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
                                <input id="train_number" type="text" class="form-control" name="train_number" required>
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
