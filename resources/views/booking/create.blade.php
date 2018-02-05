@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8">
            <h4><strong>Data Pemesan</strong></h4>
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Data Pemesan</strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" name="" class="form-control">
                        <span class="help-block"><strong>Sesuai KTP/paspor/SIM (tanpa tanda baca atau gelar)</strong></span>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="">No. Handphone</label>
                            <div class="input-group">
                                <span class="input-group-addon">+62</span>
                                <input type="text" name="" class="form-control">
                            </div>
                            <span class="help-block"><strong>Contoh: +62812345678, (+62) Kode Negara dan No. Handphone 0812345678</strong></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Email</label>
                            <input type="email" name="" class="form-control">
                            <span class="help-block"><strong>Contoh: email@example.com</strong></span>
                        </div>
                    </div>
                </div>
            </div>

            <h4><strong>Data Wisatawan</strong></h4>
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <span class="text-warning">Nama lengkap (sesuai KTP/SIM/Paspor)</span>
                    <div class="form-group">
                        <label for="">Titel</label>
                        <input type="email" name="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
@endsection
