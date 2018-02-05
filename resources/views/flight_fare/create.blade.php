@extends('layouts.admin-app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Flight Fare <strong>{{ $flight->flight_number }}</strong></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('flight_fare.store') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

                        <h4 class="text-center">Economy Class</h4>
                        <div class="divider"></div>

                        <div class="form-group">
                            <label for="economy_adult" class="col-md-4 control-label">Adult</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input id="economy_adult" type="text" class="form-control money" name="economy_adult" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="economy_child" class="col-md-4 control-label">Child</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input id="economy_child" type="text" class="form-control money" name="economy_child" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="economy_baby" class="col-md-4 control-label">Baby</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input id="economy_baby" type="text" class="form-control money" name="economy_baby" required>
                                </div>
                            </div>
                        </div>

                        <h4 class="text-center">Business Class</h4>
                        <div class="divider"></div>

                        <div class="form-group">
                            <label for="business_adult" class="col-md-4 control-label">Adult</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input id="business_adult" type="text" class="form-control money" name="business_adult" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business_child" class="col-md-4 control-label">Child</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input id="business_child" type="text" class="form-control money" name="business_child" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="business_baby" class="col-md-4 control-label">Baby</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <span class="input-group-addon">Rp.</span>
                                    <input id="business_baby" type="text" class="form-control money" name="business_baby" required>
                                </div>
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
