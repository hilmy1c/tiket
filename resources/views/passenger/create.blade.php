@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('passenger.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="book_det" class="col-md-4 control-label">Book Detail</label>
                            <div class="col-md-6">
                                <input id="book_det" type="text" class="form-control" name="book_det" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_no" class="col-md-4 control-label">Id Number</label>
                            <div class="col-md-6">
                                <input id="id_no" type="number" class="form-control" name="id_no" required autofocus> 
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
