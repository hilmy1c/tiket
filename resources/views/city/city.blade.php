@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Cities</div>

                <div class="panel-body">
                    <a href="{{ route('city.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

                    <table class="table table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Island</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($cities as $city)
                            <tr>
                                <td>{{ $city->id }}</td>
                                <td>{{ $city->city }}</td>
                                <td>{{ $city->province }}</td>
                                <td>{{ $city->island }}</td>
                                <td>
                                    <a href="{{ route('city.edit', ['id' => $city->id]) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('city.destroy', ['id' => $city->id]) }}" method="POST">
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
