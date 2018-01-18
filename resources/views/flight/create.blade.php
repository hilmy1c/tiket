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
                            <label for="flight-number" class="col-md-4 control-label">Flight Number</label>
                            <div class="col-md-6">
                                <input id="flight-number" type="number" class="form-control" name="flight_number" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="from" class="col-md-4 control-label">From</label>
                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control" name="from" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="dest" class="col-md-4 control-label">Dest</label>
                            <div class="col-md-6">
                                <input id="dest" type="text" class="form-control" name="dest" required autofocus> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="depart_time" class="col-md-4 control-label">Depart Time</label>
                            <div class="col-md-6">
                                <input id="depart_time" type="number" class="form-control" name="depart_time" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="arrival_time" class="col-md-4 control-label">Arrival Time</label>
                            <div class="col-md-6">
                                <input id="arrival_time" type="number" class="form-control" name="arriv_time" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="airplane_id" class="col-md-4 control-label">Airplane Id</label>
                            <div class="col-md-6">
                                <input id="airplane_id" type="number" class="form-control" name="airplane_id" required autofocus>
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
