@extends('layouts.app')

@section('content')

<div class="banner" style="height: 300px; overflow: visible;">
    <div class="my-container" style="position: relative;">
        <h2 class="welcome-message">Bergabung jadi member Rajatiket dan nikmati beragam keuntungannya!</h2>
        <p class="welcome-message">Daftar via registrasi yang mudah dan aman</p>
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 class="panel-title">Gabung Jadi Member Rajatiket!</h3>
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">E-Mail</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @else
                                <span class="help-block"><strong>Data Anda dilindungi dan tidak akan disebarluaskan.</strong></span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone">Phone</label>
                            <input id="phone" type="number" class="form-control" name="phone" value="{{ old('phone') }}">

                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-warning col-md-12">Daftar</button>
                        </div>
                    </form>
                    <p class="text-center" style="margin-top: 70px">Sudah memiliki akun? <a href="#">Log in</a></p>
                </div>
            </div>
            <p class="text-center">Dengan melakukan pendaftaran, saya setuju dengan Kebijakan Privasi dan Syarat & Ketentuan Rajatiket.</p>
            <span class="panel-sign">&copy; {{ date('Y') }} Rajatiket</span>
        </div>
    </div>
</div>
<div class="bg-default" style="height: 535px">
</div>
@endsection
