@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Flights</div>

                <div class="panel-body">
                    <a href="{{ route('flight.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

                    <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Flight Number</th>
                            <th>Airplane</th>
                            <th>Airline</th>
                            <th>From</th>
                            <th>Destination</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($flights as $flight)
                            <tr>
                                <td>{{ $flight->id }}</td>
                                <td>{{ $flight->flight_number }}</td>
                                <td>{{ $flight->airplane->aircraft_type }}</td>
                                <td>{{ $flight->airplane->airline->name }}</td>
                                <td>{{ $flight->fromAirport->name }}</td>
                                <td>{{ $flight->destinationAirport->name }}</td>
                                <td>{{ $flight->departure_time }}</td>
                                <td>{{ $flight->arrival_time }}</td>
                                <td>
                                    <a href="{{ route('flight.edit', ['id' => $flight->id]) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('flight.destroy', ['id' => $flight->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">Delete</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
