@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Airplanes</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('airplane.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>
            
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
                            <a href="{{ route('airplane.edit', ['id' => $airplane->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('airplane.destroy', ['id' => $airplane->id]) }}" method="POST" class="inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>       
@endsection
            
