@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Akun Bank</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('bank_account.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="image" class="col-md-4 control-label">Gambar</label>
                    <div class="col-md-6">
                        <input id="image" type="file" class="form-control" name="image" required autofocus>

                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="owner" class="col-md-4 control-label">Pemilik</label>
                    <div class="col-md-6">
                        <input id="owner" type="text" class="form-control" name="owner" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="bank_name" class="col-md-4 control-label">Nama Bank</label>
                    <div class="col-md-6">
                        <input id="bank_name" type="text" class="form-control" name="bank_name" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="account" class="col-md-4 control-label">Akun</label>
                    <div class="col-md-6">
                        <input id="account" type="text" class="form-control" name="account" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

