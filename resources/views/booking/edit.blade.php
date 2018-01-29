@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('booking.update', ['id' => $booking->id]) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="booking_code" class="col-md-4 control-label">Booking Code</label>
                            <div class="col-md-6">
                                <input id="booking_code" type="text" class="form-control" name="booking_code" value="{{ $booking->booking_code }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="col-md-4 control-label">User</label>
                            <div class="col-md-6">
                                <select class="form-control" name="user_id" id="user_id">
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="booking_date" class="col-md-4 control-label">Booking Date</label>
                            <div class="col-md-6">
                                <input id="booking_date" type="date" format="yyyy-mm-dd" class="form-control" name="booking_date" value="{{ $booking->booking_date }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="is_paid" class="col-md-4 control-label">Is Paid</label>
                            <div class="col-md-6">
                                <select name="is_paid" id="is_paid" class="form-control">
                                    <option value="0" {{ $booking->is_paid == false ? 'selected' : '' }}>False</option>
                                    <option value="1" {{ $booking->is_paid == true ? 'selected' : '' }}>True</option>
                                </select>
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
