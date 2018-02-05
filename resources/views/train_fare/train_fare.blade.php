@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading">Train Fares</div>

        <div class="panel-body">
            <a href="{{ route('train_fare.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <th>Id</th>
                        <th>Class</th>
                        <th>Train Number</th>
                        <th>Fare</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($train_fares as $train_fare)
                        <tr>
                            <td>{{ $train_fare->id }}</td>
                            <td>{{ $train_fare->class }}</td>
                            <td>{{ $train_fare->train_number }}</td>
                            <td>{{ $train_fare->fare }}</td>
                            <td>
                                <a href="{{ route('train_fare.edit', ['id' => $train_fare->id]) }}" class="btn btn-default">Edit</a>
                                <form action="{{ route('train_fare.destroy', ['id' => $train_fare->id]) }}" method="POST">
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
@endsection

