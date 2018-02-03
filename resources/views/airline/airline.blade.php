@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Airlines</div>

                <div class="panel-body">
                    <a href="{{ route('airline.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

                    <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($airlines as $airline)
                            <tr>
                                <td>{{ $airline->id }}</td>
                                <td>{{ $airline->code }}</td>
                                <td>{{ $airline->name }}</td>
                                <td class="text-center"><img src="{{ Storage::url($airline->image) }}" alt="" width="80px"></td>
                                <td>
                                    <a href="{{ route('airline.edit', ['id' => $airline->id]) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('airline.destroy', ['id' => $airline->id]) }}" method="POST">
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
