@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Airport</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('airport.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>City</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($airports as $airport)
                        <tr>
                            <td>{{ $airport->id }}</td>
                            <td>{{ $airport->name }}</td>
                            <td>{{ $airport->code }}</td>
                            <td>{{ $airport->city->city }}</td>
                            <td>
                                <a href="{{ route('airport.edit', ['id' => $airport->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('airport.destroy', ['id' => $airport->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">Delete</button>
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
