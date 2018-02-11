@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Tarif Penerbangan</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Kelas</th>
                    <th>No. Penerbangan</th>
                    <th>Tarif</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($flight_fares as $flight_fare)
                    <tr>
                        <td>{{ $flight_fare->id }}</td>
                        <td>{{ $flight_fare->class }}</td>
                        <td>{{ $flight_fare->flight->flight_number }}</td>
                        <td>Rp. {{ $flight_fare->fare }}</td>
                        <td>
                            <a href="{{ route('flight_fare.edit', ['id' => $flight_fare->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('flight_fare.destroy', ['id' => $flight_fare->id]) }}" method="POST" class="inline">
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
            
