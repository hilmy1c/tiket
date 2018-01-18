@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Airplanes</div>

                <div class="panel-body">
                    <a href="{{ route('passenger.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

                   <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Book Detail</th>
                            <th>Name</th>
                            <th>Id Number</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($passengers as $passenger)
                            <tr>
                                <td>{{ $passenger->id }}</td>
                                <td>{{ $passenger->book_det }}</td>
                                <td>{{ $passenger->name }}</td>
                                <td>{{ $passenger->id_no }}</td>
                                <td>
                                    <a href="{{ route('passenger.edit', ['id' => $passenger->id]) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('passenger.destroy', ['id' => $passenger->id]) }}" method="POST">
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
