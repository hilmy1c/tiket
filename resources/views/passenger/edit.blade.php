@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit</div>
                
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('passenger.update', ['id' => $passenger->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="book_det" class="col-md-4 control-label">Book Detail</label>
                            <div class="col-md-6">
                                <input id="book_det" type="text" class="form-control" name="book_det" value="{{ $passenger->book_det }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $passenger->name }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_no" class="col-md-4 control-label">Id Number</label>
                            <div class="col-md-6">
                                <input id="id_no" type="text" class="form-control" name="id_no" value="{{ $passenger->id_no }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
