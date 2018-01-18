@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('flight.update', ['id' => $flight->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="flight_number" class="col-md-4 control-label">Flight Number</label>
                            <div class="col-md-6">
                                <input id="flight_number" type="text" class="form-control" name="flight_number" value="{{ $flight->flight_number }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="from" class="col-md-4 control-label">From</label>
                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" name="from" value="{{ $flight->from }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dest" class="col-md-4 control-label">Dest</label>
                            <div class="col-md-6">
                                <input id="dest" type="text" class="form-control" name="dest" value="{{ $flight->dest }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="depart_time" class="col-md-4 control-label">Depart Time</label>
                            <div class="col-md-6">
                                <input id="depart_time" type="number" class="form-control" name="depart_time" value="{{ $flight->depart_time }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="arriv_time" class="col-md-4 control-label">Arrival Time</label>
                            <div class="col-md-6">
                                <input id="arriv_time" type="number" class="form-control" name="arriv_time" value="{{ $flight->arriv_time }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="airplane_id" class="col-md-4 control-label">Airplane Id</label>
                            <div class="col-md-6">
                                <input id="airplane_id" type="number" class="form-control" name="airplane_id" value="{{ $flight->airplane_id }}" required>
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
    </div>
</div>
@endsection
