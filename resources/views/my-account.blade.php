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
                        <a href="javascript:void(0)" class="booking-sub-title text-primary active" id="heading1"><strong>Login ID</strong></a>
                        <a href="javascript:void(0)" class="booking-sub-title text-primary" id="heading2"><strong>Ganti Password</strong></a>
                    </div>
                    <div class="loginid">
                        <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                            <small>Nama Lengkap</small><br>
                            <input type="text" class="input-hidden" name="name" value="{{ Auth::user()->name }}" readonly>
                            <a href="javascript:void(0)" class="pull-right text-primary edit">Ubah</a>
                        </div>
                        <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                            <small>Alamat Email</small><br>
                            <input type="text" class="input-hidden" name="email" value="{{ Auth::user()->email }}" readonly>
                            <a href="javascript:void(0)" class="pull-right text-primary edit">Ubah</a>
                        </div>
                        <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                            <small>Password</small><br>
                            <input type="password" class="input-hidden" value="{{ Auth::user()->password }}" readonly>
                            <a href="javascript:void(0)" class="pull-right text-primary" id="ubahPassword">Ubah</a>
                        </div>
                    </div>
                    <div class="change-password" style="display: none;">
                        <form action="{{ route('user.reset_password', ['id' => Auth::id()]) }}">
                            {{ csrf_field() }}

                            <i style="margin-bottom: 15px; display: inline-block;">Gunakan password yang belum pernah Anda pakai di situs web lain</i>
                            <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                                <small>Password Lama</small><br>
                                <input type="password" class="input-hidden" name="old_password" autofocus>
                            </div>
                            <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                                <small>Password Baru</small><br>
                                <input type="password" class="input-hidden" name="new_password">
                            </div>
                            <div class="alert alert-default" style="padding: 10px 20px 10px 20px; margin-bottom: 15px">
                                <small>Konfirmasi Password</small><br>
                                <input type="password" class="input-hidden" name="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-warning bold editpassword-btn">Ganti Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var id = "{{ Auth::id() }}";

    $("#heading1").click(function(event) {
        $(this).addClass('active');
        $("#heading2").removeClass('active');
        $(".loginid").css('display', 'block');
        $(".change-password").css('display', 'none');
    });

    $("#heading2").click(function(event) {
        $(this).addClass('active');
        $("#heading1").removeClass('active');
        $(".change-password").css('display', 'block');
        $(".loginid").css('display', 'none');
    });

    $("#ubahPassword").click(function(event) {
        $("#heading2").addClass('active');
        $("#heading1").removeClass('active');
        $(".change-password").css('display', 'block');
        $(".loginid").css('display', 'none');
    });

    $(".edit").click(function(event) {
        var field = $(this).closest('.alert').find('.input-hidden');

        if ($(this).text() == 'Ubah') {
            field.prop('readonly', false).focus();
            $(this).text('Simpan');
        } else {
            var data = {};
            data[field.attr('name')] = field.val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ url('user/update_profile') . '/' }}" + id,
                type: "POST",
                dataType: "json",
                data: data,
                success: function (res) {
                    console.log("Sip");
                }
            });

            $(this).closest('.alert').find('.input-hidden').prop('readonly', true);
            $(this).text('Ubah');
        }
    });
</script>
@endsection