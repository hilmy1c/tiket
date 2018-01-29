@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="my-container">
        <h1 class="welcome-message">Selamat Datang</h1>
        <p class="welcome-message">Temukan harga terbaik untuk setiap produk yang anda inginkan.</p>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav my-nav-pills nav-stacked">
                            <li>
                                <a href="">
                                    <img src="/img/icons/airplane.png" alt="" class="my-icon">&nbsp;Pesawat
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/img/icons/train.png" alt="" class="my-icon">&nbsp;Kereta Api
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <strong class="text-primary" style="margin-bottom: 15px; display: inline-block;">Cari tiket pesawat</strong>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6" style="padding-left: 0">
                                    <div class="form-group col-md-6">
                                        <label for="from">Kota Asal:</label>
                                        <input type="text" id="from" name="from" class="input-sm form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="destination">Kota Tujuan:</label>
                                        <input type="text" id="destination" name="destination" class="input-sm form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Tanggal Berangkat:</label>
                                        <input type="text" id="" name="" class="input-sm form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for=""><input type="checkbox">&nbsp;Pulang Pergi:</label>
                                        <input type="text" id="" name="" class="input-sm form-control">
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 0">
                                    <div class="form-group col-md-12">
                                        <label for="">Jumlah Penumpang:</label>
                                        <input type="text" id="" name="" class="input-sm form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Kelas Penerbangan:</label>
                                        <select name="" id="" class="input-sm form-control">
                                            <option value="">Ekonomi</option>
                                            <option value="">Bisnis</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
