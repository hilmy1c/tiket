@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create City</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('city.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="province" class="col-md-4 control-label">Province</label>
                            <div class="col-md-6">
                                <select name="province" id="province" class="form-control">
                                    <optgroup label="Sumatera">
                                        <option value="Aceh">Aceh</option>
                                        <option value="Lampung">Lampung</option>
                                        <option value="Kepulauan Riau">Kepulauan Riau</option>
                                        <option value="Bengkulu">Bengkulu</option>
                                        <option value="Riau">Riau</option>
                                        <option value="Jambi">Jambi</option>
                                        <option value="Sumatera Utara">Sumatera Utara</option>
                                        <option value="Sumatera Barat">Sumatera Barat</option>
                                        <option value="Sumatera Selatan">Sumatera Selatan</option>
                                        <option value="Bangka Belitung">Bangka Belitung</option>
                                    </optgroup>
                                    <optgroup label="Jawa">
                                        <option value="Jawa Barat">Jawa Barat</option>
                                        <option value="Jawa Timur">Jawa Timur</option>
                                        <option value="Jawa Tengah">Jawa Tengah</option>
                                        <option value="Banten">Banten</option>
                                        <option value="DKI Jakarta">DKI Jakarta</option>
                                        <option value="DI Yogyakarta">DI Yogyakarta</option>
                                    </optgroup>
                                    <optgroup label="Bali & Nusa Tenggara">
                                        <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                        <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                        <option value="Bali">Bali</option>
                                    </optgroup>
                                    <optgroup label="Kalimantan">
                                        <option value="Kalimantan Timur">Kalimantan Timur</option>
                                        <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                        <option value="Kalimantan Utara">Kalimantan Utara</option>
                                        <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                        <option value="Kalimantan Barat">Kalimantan Barat</option>
                                    </optgroup>
                                    <optgroup label="Sulawesi">
                                        <option value="Gorontalo">Gorontalo</option>
                                        <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                        <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                        <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                        <option value="Sulawesi Utara">Sulawesi Utara</option>
                                    </optgroup>
                                    <optgroup label="Maluku">
                                        <option value="Maluku">Maluku</option>
                                        <option value="Maluku Utara">Maluku Utara</option>
                                    </optgroup>
                                    <optgroup label="Papua">
                                        <option value="Papua">Papua</option>
                                        <option value="Papua Barat">Papua Barat</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="island" class="col-md-4 control-label">Island</label>
                            <div class="col-md-6">
                                <select name="island" id="island" class="form-control">
                                    <option value="Jawa">Jawa</option>
                                    <option value="Sumatera">Sumatera</option>
                                    <option value="Kalimantan">Kalimantan</option>
                                    <option value="Sulawesi">Sulawesi</option>
                                    <option value="Bali & Nusa Tenggara">Bali</option>
                                    <option value="Maluku">Maluku</option>
                                    <option value="Papua">Papua</option>
                                </select>
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
