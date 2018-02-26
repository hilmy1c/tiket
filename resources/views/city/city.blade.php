@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Kota</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('city.create') }}" class="btn btn-success" style="margin-bottom: 15px">Tambah</a>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Kota</th>
                    <th>Provinsi</th>
                    <th>Pulau</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($cities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->city }}</td>
                        <td>{{ $city->province }}</td>
                        <td>{{ $city->island }}</td>
                        <td>
                            <a href="{{ route('city.edit', ['id' => $city->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('city.destroy', ['id' => $city->id]) }}" method="POST" class="inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>  
@endsection
