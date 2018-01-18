@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('flight_fare.update', ['id' => $flight_fare->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="class" class="col-md-4 control-label">Class</label>
                            <div class="col-md-6">
                                <select class="form-control" name="class" id="class">
                                    <option value="Economy" {{ $flight_fare->class == 'Economy' ? 'selected' : '' }}>Economy</option>
                                    <option value="Business" {{ $flight_fare->class == 'Business' ? 'selected' : '' }}>Business</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="flight_number" class="col-md-4 control-label">Flight Number</label>
                            <div class="col-md-6">
                                <input id="flight_number" type="text" class="form-control" name="flight_number" value="{{ $flight_fare->flight_number }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fare" class="col-md-4 control-label">Fare</label>
                            <div class="col-md-6">
                                <input id="fare" type="text" class="form-control" name="fare" value="{{ $flight_fare->fare }}" required>
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
