@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Train Stations</div>

                <div class="panel-body">
                    <a href="{{ route('train_station.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

                    <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>City</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($train_stations as $train_station)
                            <tr>
                                <td>{{ $train_station->id }}</td>
                                <td>{{ $train_station->name }}</td>
                                <td>{{ $train_station->code }}</td>
                                <td>{{ $train_station->city }}</td>
                                <td>
                                    <a href="{{ route('train_station.edit', ['id' => $train_station->id]) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('train_station.destroy', ['id' => $train_station->id]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="btn btn-danger">Delete</a>
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
</div>
@endsection
