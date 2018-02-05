@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Airplanes</div>

        <div class="panel-body">
            <a href="{{ route('airplane.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Aircraft Type</th>
                        <th>Economy Seat Number</th>
                        <th>Business Seat Number</th>
                        <th>Airline</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($airplanes as $airplane)
                        <tr>
                            <td>{{ $airplane->id }}</td>
                            <td>{{ $airplane->aircraft_type }}</td>
                            <td>{{ $airplane->economy_seat_number }}</td>
                            <td>{{ $airplane->business_seat_number }}</td>
                            <td><img src="{{ Storage::url($airplane->airline->image) }}" alt="" class="my-icon"> {{ $airplane->airline->name }}</td>
                            <td>
                                <a href="{{ route('airplane.edit', ['id' => $airplane->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('airplane.destroy', ['id' => $airplane->id]) }}" method="POST">
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
@endsection
