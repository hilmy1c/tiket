@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Edit</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_fare.update', ['id' => $train_fare->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="class" class="col-md-4 control-label">Class</label>
                    <div class="col-md-6">
                        <select class="form-control" name="class" id="class">
                            <option value="Economy" {{ $train_fare->class == 'Economy' ? 'selected' : '' }}>Economy</option>
                            <option value="Business" {{ $train_fare->class == 'Business' ? 'selected' : '' }}>Business</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="train_number" class="col-md-4 control-label">Train Number</label>
                    <div class="col-md-6">
                        <input id="train_number" type="text" class="form-control" name="train_number" value="{{ $train_fare->train_number }}" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fare" class="col-md-4 control-label">Fare</label>
                    <div class="col-md-6">
                        <input id="fare" type="text" class="form-control" name="fare" value="{{ $train_fare->fare }}" required>
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
@endsection

