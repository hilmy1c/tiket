@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Edit Maskapai</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('airline.update', ['id' => $airline->id]) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label for="code" class="col-md-4 control-label">Kode</label>
                    <div class="col-md-6">
                        <input id="code" type="text" class="form-control" name="code" value="{{ $airline->code }}" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $airline->name }}" required autofocus>
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

