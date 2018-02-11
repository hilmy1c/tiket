@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Bandara</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('airport.create') }}" class="btn btn-default" style="margin-bottom: 15px">Tambah</a>
        
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Kode</th>
                    <th>Kota</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($airports as $airport)
                    <tr>
                        <td>{{ $airport->id }}</td>
                        <td>{{ $airport->name }}</td>
                        <td>{{ $airport->code }}</td>
                        <td>{{ $airport->city->city }}</td>
                        <td>
                            <a href="{{ route('airport.edit', ['id' => $airport->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('airport.destroy', ['id' => $airport->id]) }}" method="POST" class="inline">
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

