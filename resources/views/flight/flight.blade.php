@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Flights</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('flight.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Flight Number</th>
                        <th>Airplane</th>
                        <th>Airline</th>
                        <th>From</th>
                        <th>Destination</th>
                        <th>Departure Time</th>
                        <th>Arrival Time</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($flights as $flight)
                        <tr>
                            <td>{{ $flight->id }}</td>
                            <td>{{ $flight->flight_number }}</td>
                            <td>{{ $flight->airplane->aircraft_type }}</td>
                            <td><img src="{{ Storage::url($flight->airplane->airline->image) }}" alt="" class="my-icon"> {{ $flight->airplane->airline->name }}</td>
                            <td>{{ $flight->fromAirport->city->city }} - ({{ $flight->fromAirport->code }}) {{ $flight->fromAirport->name }}</td>
                            <td>{{ $flight->destinationAirport->city->city }} - ({{ $flight->destinationAirport->code }}){{ $flight->destinationAirport->name }}</td>
                            <td>{{ date('Y-m-d H:i', strtotime($flight->departure_time)) }}</td>
                            <td>{{ date('Y-m-d H:i', strtotime($flight->arrival_time)) }}</td>
                            <td>
                                <a href="{{ route('flight.edit', ['id' => $flight->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('flight.destroy', ['id' => $flight->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection
