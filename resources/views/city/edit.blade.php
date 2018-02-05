@extends('layouts.admin-app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit City</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('city.update', ['id' => $city->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $city->city }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="province" class="col-md-4 control-label">Province</label>
                            <div class="col-md-6">
                                <select name="province" id="province" class="form-control">
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province->province }}" {{ $province->province == $city->province ? 'selected' : '' }}>{{ $province->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="island" class="col-md-4 control-label">Island</label>
                            <div class="col-md-6">
                                <select name="island" id="island" class="form-control" {{ $province->island == $city->island ? 'selected' : '' }}>
                                    <option value="Jawa">Jawa</option>
                                    <option value="Sumatera">Sumatera</option>
                                    <option value="Kalimantan">Kalimantan</option>
                                    <option value="Sulawesi">Sulawesi</option>
                                    <option value="Bali & Nusa Tenggara">Bali & Nusa Tenggara</option>
                                    <option value="Maluku">Maluku</option>
                                    <option value="Papua">Papua</option>
                                </select>
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
    </div>
</div>
@endsection
