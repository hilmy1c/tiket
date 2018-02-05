@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('train.update', ['id' => $train->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $train->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="economy_seat_number" class="col-md-4 control-label">Economy Seat Number</label>
                            <div class="col-md-6">
                                <input id="economy_seat_number" type="number" class="form-control" name="economy_seat_number" value="{{ $train->economy_seat_number }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business_seat_number" class="col-md-4 control-label">Business Seat Number</label>
                            <div class="col-md-6">
                                <input id="business_seat_number" type="number" class="form-control" name="business_seat_number" value="{{ $train->business_seat_number }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="executive_seat_number" class="col-md-4 control-label">Executive Seat Number</label>
                            <div class="col-md-6">
                                <input id="executive_seat_number" type="number" class="form-control" name="executive_seat_number" value="{{ $train->executive_seat_number }}" required>
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
