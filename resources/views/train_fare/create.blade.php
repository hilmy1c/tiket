@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('train_fare.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="class" class="col-md-4 control-label">Class</label>
                            <div class="col-md-6">
                                <select class="form-control" name="class" id="class">
                                    <option value="Economy">Economy</option>
                                    <option value="Business">Business</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="train_number" class="col-md-4 control-label">Train Number</label>
                            <div class="col-md-6">
                                <input id="train_number" type="text" class="form-control" name="train_number" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="fare" class="col-md-4 control-label">Fare</label>
                            <div class="col-md-6">
                                <input id="fare" type="text" class="form-control" name="fare" required>
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
