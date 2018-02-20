@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tarif Kereta</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Kelas</th>
                        <th>Jenis Penumpang</th>
                        <th>Jalur</th>
                        <th>Tarif</th>
                        <th class="text-center">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($train_fares as $train_fare)
                        <tr>
                            <td>{{ $train_fare->id }}</td>
                            <td>{{ $train_fare->class }}</td>
                            <td>{{ $train_fare->passenger }}</td>
                            <td>{{ $train_fare->trainJourney->startStation->city->city }} ({{ $train_fare->trainJourney->startStation->code }}) - {{ $train_fare->trainJourney->endStation->city->city }} ({{ $train_fare->trainJourney->endStation->code }})</td>
                            <td>{{ $train_fare->fare }}</td>
                            <td>
                                <a href="{{ route('train_fare.edit', ['id' => $train_fare->id]) }}" class="btn btn-sm btn-default">Edit</a>
                                <form action="{{ route('train_fare.destroy', ['id' => $train_fare->id]) }}" method="POST" class="inline">
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
</div>
@endsection

