@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Booking</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('booking.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Booking Code</th>
                        <th>User</th>
                        <th>Booking Date</th>
                        <th>Payment Status</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->booking_code }}</td>
                            <td>{{ $booking->user->name }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->is_paid == true ? 'Sudah dibayar' : 'Belum dibayar' }}</td>
                            <td>
                                <a href="{{ route('booking.detail', ['id' => $booking->id]) }}" class="btn btn-primary">Detail</a>
                                <a href="{{ route('booking.edit', ['id' => $booking->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('booking.destroy', ['id' => $booking->id]) }}" method="POST">
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
