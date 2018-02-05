@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Booking Detail</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('booking_detail.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Travel Number</th>
                        <th>Status</th>
                        <th>Fare</th>
                        <th>Booking Code</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($booking_details as $booking_detail)
                        <tr>
                            <td>{{ $booking_detail->id }}</td>
                            <td>{{ $booking_detail->travel_number }}</td>
                            <td>{{ $booking_detail->status }}</td>
                            <td>{{ $booking_detail->fare_id }}</td>
                            <td>{{ $booking_detail->booking_code }}</td>
                            <td>
                                <a href="{{ route('booking_detail.edit', ['id' => $booking_detail->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('booking_detail.destroy', ['id' => $booking_detail->id]) }}" method="POST">
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
