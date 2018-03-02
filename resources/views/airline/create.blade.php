@extends('layouts.admin-app')

@section('title', 'Tambah Maskapai')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Maskapai</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('airline.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="image" class="col-md-4 control-label">Gambar</label>
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
                    <label for="code" class="col-md-4 control-label">Kode</label>
                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control" name="code" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
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

