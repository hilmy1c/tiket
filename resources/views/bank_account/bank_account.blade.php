@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Bank Accounts</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            <a href="{{ route('bank_account.create') }}" class="btn btn-default" style="margin-bottom: 15px">Create</a>

            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Owner</th>
                    <th>Account</th>
                    <th>Bank Name</th>
                    <th>Image</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @foreach ($bank_accounts as $bank_account)
                    <tr>
                        <td>{{ $bank_account->id }}</td>
                        <td>{{ $bank_account->owner }}</td>
                        <td>{{ $bank_account->account }}</td>
                        <td>{{ $bank_account->bank_name }}</td>
                        <td><img src="{{ Storage::url($bank_account->image) }}" alt="" width="80px"></td>
                        <td>
                            <a href="{{ route('bank_account.edit', ['id' => $bank_account->id]) }}" class="btn btn-sm btn-default">Edit</a>
                            <form action="{{ route('bank_account.destroy', ['id' => $bank_account->id]) }}" method="POST" class="inline">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
