@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Penumpang</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Kode Booking</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($passengers as $passenger)
                    <tr>
                        <td>{{ $passenger->id }}</td>
                        <td>{{ $passenger->name }}</td>
                        <td>{{ $passenger->status }}</td>
                        <td></td>
                        <td>
                            <a href="{{ route('passenger.edit', ['id' => $passenger->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('passenger.destroy', ['id' => $passenger->id]) }}" method="POST" class="inline">
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
            
