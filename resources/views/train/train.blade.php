@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Trains</div>

        <div class="panel-body">
            <a href="{{ route('train.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Economy Seat Number</th>
                        <th>Business Seat Number</th>
                        <th>Executive Seat Number</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($trains as $train)
                        <tr>
                            <td>{{ $train->id }}</td>
                            <td>{{ $train->name }}</td>
                            <td>{{ $train->economy_seat_number }}</td>
                            <td>{{ $train->business_seat_number }}</td>
                            <td>{{ $train->executive_seat_number }}</td>
                            <td>
                                <a href="{{ route('train.edit', ['id' => $train->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('train.destroy', ['id' => $train->id]) }}" method="POST">
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
