@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Bandara</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('airport.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code" class="col-md-4 control-label">Kode</label>
                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control" name="code" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="city" class="col-md-4 control-label">Kota</label>
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
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

