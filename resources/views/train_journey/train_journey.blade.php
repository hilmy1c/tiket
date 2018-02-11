@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Perjalanan Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('train_journey.create') }}" class="btn btn-default" style="margin-bottom: 15px">Tambah</a>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Stasiun Keberangkatan</th>
                    <th>Stasiun kedatangan</th>
                    <th>Nomor Kereta</th>
                    <th>Kereta</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Waktu Tiba</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($train_journeys as $train_journey)
                    <tr>
                        <td>{{ $train_journey->id }}</td>
                        <td>{{ $train_journey->departure_station }}</td>
                        <td>{{ $train_journey->arrival_station }}</td>
                        <td>{{ $train_journey->train_number }}</td>
                        <td>{{ $train_journey->train_id }}</td>
                        <td>{{ $train_journey->departure_time }}</td>
                        <td>{{ $train_journey->arrival_time }}</td>
                        <td>
                            <a href="{{ route('train_journey.edit', ['id' => $train_journey->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('train_journey.destroy', ['id' => $train_journey->id]) }}" method="POST" class="inline">
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
            

