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
                <div class="panel-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection