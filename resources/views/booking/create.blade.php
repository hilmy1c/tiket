@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('booking.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="booking_code" class="col-md-4 control-label">Booking Code</label>
                            <div class="col-md-6">
                                <input id="booking_code" type="text" class="form-control" name="booking_code" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="user_id" class="col-md-4 control-label">User</label>
                            <div class="col-md-6">
                                <select class="form-control" name="user_id" id="user_id">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="booking_date" class="col-md-4 control-label">Booking Date</label>
                            <div class="col-md-6">
                                <input id="booking_date" type="date" class="form-control" name="booking_date" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                                <input id="status" type="text" class="form-control" name="status" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="payment_status" class="col-md-4 control-label">Payment Status</label>
                            <div class="col-md-6">
                                <input id="payment_status" type="text" class="form-control" name="payment_status" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
