@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('train_station.update', ['id' => $train_station->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $train_station->name }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="code" class="col-md-4 control-label">Code</label>
                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="{{ $train_station->code }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <select name="city" id="city" class="form-control">
                                    @foreach ($cities as $city)
                                    <option value="{{ $city->city }}" {{ $train_station->city == $city->city ? 'selected' : '' }}>{{ $city->city }}</option>
                                    @endforeach
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
