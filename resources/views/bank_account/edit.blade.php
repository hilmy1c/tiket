@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Edit Bank Account</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('bank_account.update', ['id' => $bank_account->id]) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="image" class="col-md-4 control-label">Image</label>
                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="image" autofocus>

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="owner" class="col-md-4 control-label">Owner</label>
                    <div class="col-md-6">
                        <input id="owner" type="text" class="form-control" name="owner" value="{{ $bank_account->owner }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bank_name" class="col-md-4 control-label">Bank Name</label>
                    <div class="col-md-6">
                        <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ $bank_account->bank_name }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="account" class="col-md-4 control-label">Account</label>
                    <div class="col-md-6">
                        <input id="account" type="text" class="form-control" name="account" value="{{ $bank_account->account }}" required autofocus>
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

