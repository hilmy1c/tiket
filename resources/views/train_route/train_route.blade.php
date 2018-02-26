@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Rute Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('train_route.create') }}" class="btn btn-success" style="margin-bottom: 15px">Tambah</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Rute</th>
                        <th>Kereta Api</th>
                        <th>Waktu Keberangkatan</th>
                        <th>Waktu Kedatangan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($train_routes as $train_route)
                    <tr>
                        <td>{{ $train_route->id }}</td>
                        <td>{{ $train_route->startStation->city->city }} ({{ $train_route->startStation->code }}) - {{ $train_route->endStation->city->city }} ({{ $train_route->endStation->code }})</td>
                        <td>{{ $train_route->train->name }}</td>
                        <td>{{ date('H:i', strtotime($train_route->departure_time)) }}</td>
                        <td>{{ date('H:i', strtotime($train_route->arrival_time)) }}</td>
                        <td>
                            <a href="{{ route('train_route.edit', ['id' => $train_route->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('train_route.destroy', ['id' => $train_route->id]) }}" method="POST" class="inline">
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