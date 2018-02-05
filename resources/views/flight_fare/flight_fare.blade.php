@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Flight Fares</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Class</th>
                        <th>Flight Number</th>
                        <th>Fare</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($flight_fares as $flight_fare)
                        <tr>
                            <td>{{ $flight_fare->id }}</td>
                            <td>{{ $flight_fare->class }}</td>
                            <td>{{ $flight_fare->flight->flight_number }}</td>
                            <td>Rp. {{ $flight_fare->fare }}</td>
                            <td>
                                <a href="{{ route('flight_fare.edit', ['id' => $flight_fare->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('flight_fare.destroy', ['id' => $flight_fare->id]) }}" method="POST">
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
