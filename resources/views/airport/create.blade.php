@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Create Airport</div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('airport.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code" class="col-md-4 control-label">Code</label>
                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control" name="code" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="city" class="col-md-4 control-label">City</label>
                    <div class="col-md-6">
                        <select name="city" id="city" class="form-control">
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
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
@endsection

