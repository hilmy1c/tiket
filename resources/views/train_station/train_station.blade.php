@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Stasiun Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('train_station.create') }}" class="btn btn-default" style="margin-bottom: 15px">Tambah</a>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Kota</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($train_stations as $train_station)
                    <tr>
                        <td>{{ $train_station->id }}</td>
                        <td>{{ $train_station->name }}</td>
                        <td>{{ $train_station->code }}</td>
                        <td>{{ $train_station->city->city }}</td>
                        <td>
                            <a href="{{ route('train_station.edit', ['id' => $train_station->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('train_station.destroy', ['id' => $train_station->id]) }}" method="POST" class="inline">
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

