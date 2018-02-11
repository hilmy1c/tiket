@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tambah Tarif</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('train_fare.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="class" class="col-md-4 control-label">Kelas</label>
                    <div class="col-md-6">
                        <select class="form-control" name="class" id="class">
                            <option value="Economy">Ekonimi</option>
                            <option value="Business">Bisnis</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="train_number" class="col-md-4 control-label">Nomor Kereta</label>
                    <div class="col-md-6">
                        <input id="train_number" type="text" class="form-control" name="train_number" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="fare" class="col-md-4 control-label">Tarif</label>
                    <div class="col-md-6">
                        <input id="fare" type="text" class="form-control" name="fare" required>
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

