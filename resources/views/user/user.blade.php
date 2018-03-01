@extends('layouts.admin-app')

@section('title', 'User')

@section('content')
<div class="col-md-9">
    <h4><strong>User</strong></h4>
    <div class="panel panel-default">
        
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success" style="position: relative"`>
                    <div class="row">
                        <img src="/img/icons/checkmark.png" alt="" class="my-icon" style="position: absolute; top: 50%; transform: translateY(-50%); left: 22px">
                        <div class="col-md-11 pull-right">
                            {{ session('status') }}
                        </div>
                    </div>
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>E-mail</th>
                    <th>Telepon</th>
                    <th class="text-center">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <form action="{{ route('user.destroy', ['id' => $user->id]) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger">Delete</a>
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
