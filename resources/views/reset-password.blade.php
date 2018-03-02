@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <h4 class="booking-sub-title"><strong>Akun Saya</strong></h4>
    <div class="row">
        <div class="col-md-4">
            <ul class="user-sidebar-menu">
                <li>
                    <a href="{{ route('user.account', ['id' => Auth::id()]) }}" class="active">
                    	<img src="/img/icons/user.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Ubah Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.booking_history', ['id' => Auth::id()]) }}">
                    	<img src="/img/icons/sidebar/purchase-order.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Pesanan Saya
                    </a>
                </li>
                <li>
                    <a href="">
                    	<img src="/img/icons/logout.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Logout
                    </a>
                </li>
            </ul>
    	</div>
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="header-account">
                        <a href="{{ route('user.account', ['id' => Auth::id()]) }}" class="booking-sub-title text-primary" id="heading1"><strong>Login ID</strong></a>
                        <a href="" class="booking-sub-title text-primary active" id="heading2"><strong>Ganti Password</strong></a>
                    </div>
                    <div class="change-password">
                        @if (session('success'))
                            <div class="alert alert-success" style="position: relative">
                                <div class="row">
                                    <img src="/img/icons/checkmark.png" alt="" class="my-icon" style="position: absolute; top: 50%; transform: translateY(-50%); left: 22px">
                                    <div class="col-md-11 pull-right">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('user.reset', ['id' => Auth::id()]) }}" method="POST">
                            {{ csrf_field() }}

                            <i style="margin-bottom: 15px; display: inline-block;">Gunakan password yang belum pernah Anda pakai di situs web lain</i>
                            <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                                <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}" style="margin: 0">
                                    <small>Password Lama</small><br>
                                    <input type="password" class="input-hidden" name="old_password" autofocus>

                                    @if ($errors->has('old_password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}" style="margin: 0">
                                    <small>Password Baru</small><br>
                                    <input type="password" class="input-hidden" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                                <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" style="margin: 0">
                                    <small>Konfirmasi Password</small><br>
                                    <input type="password" class="input-hidden" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning bold editpassword-btn">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection