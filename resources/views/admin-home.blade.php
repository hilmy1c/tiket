@extends('layouts.admin-app')

@section('content')
<div class="col-md-9">
    <h4><strong>Dashboard Admin</strong></h4>
    <div class="panel panel-default">
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>
</div>
@endsection
