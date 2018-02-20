@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="col-md-4 control-label">Nama</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>

                <div class="form-group">
                    <label for="economy_seat_number" class="col-md-4 control-label">Jumlah Kursi Ekonomi</label>
                    <div class="col-md-6">
                        <input id="economy_seat_number" type="number" class="form-control" name="economy_seat_number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="business_seat_number" class="col-md-4 control-label">Jumlah Kursi Bisnis</label>
                    <div class="col-md-6">
                        <input id="business_seat_number" type="number" class="form-control" name="business_seat_number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="executive_seat_number" class="col-md-4 control-label">Jumlah Kursi Eksekutif</label>
                    <div class="col-md-6">
                        <input id="executive_seat_number" type="number" class="form-control" name="executive_seat_number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="locomotive_type" class="col-md-4 control-label">Lokomotif</label>
                    <div class="col-md-6">
                        <input id="locomotive_type" type="text" class="form-control" name="locomotive_type" required>
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

