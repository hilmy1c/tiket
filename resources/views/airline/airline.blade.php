@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Maskapai Penerbangan</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('airline.create') }}" class="btn btn-success" style="margin-bottom: 15px">Tambah</a>
                
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @foreach ($airlines as $airline)
                    <tr>
                        <td>{{ $airline->id }}</td>
                        <td>{{ $airline->code }}</td>
                        <td>{{ $airline->name }}</td>
                        <td class="text-center"><img src="{{ Storage::url($airline->image) }}" alt="" width="80px"></td>
                        <td>
                            <a href="{{ route('airline.edit', ['id' => $airline->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('airline.destroy', ['id' => $airline->id]) }}" method="POST" class="inline">
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

