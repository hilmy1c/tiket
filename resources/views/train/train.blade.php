@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('train.create') }}" class="btn btn-default" style="margin-bottom: 15px">Tambah</a>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Jumlah Kursi Ekonomi</th>
                    <th>Jumlah Kursi Bisnis</th>
                    <th>Jumlah Kursi Eksekutif</th>
                    <th>Jenis Lokomotif</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($trains as $train)
                    <tr>
                        <td>{{ $train->id }}</td>
                        <td>{{ $train->name }}</td>
                        <td>{{ $train->economy_seat_number }}</td>
                        <td>{{ $train->business_seat_number }}</td>
                        <td>{{ $train->executive_seat_number }}</td>
                        <td>{{ $train->locomotive_type }}</td>
                        <td>
                            <a href="{{ route('train.edit', ['id' => $train->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('train.destroy', ['id' => $train->id]) }}" method="POST" class="inline">
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
