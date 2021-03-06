@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <div class="row">
    	<div class="col-md-4">
		    <h4 class="booking-sub-title"><strong>Akun Saya</strong></h4>
            <ul class="user-sidebar-menu">
                <li>
                    <a href="{{ route('user.account', ['id' => Auth::id()]) }}">
                        <img src="/img/icons/user.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Ubah Profil
                    </a>
                </li>
                <li>
                    <a href="{{ route('user.booking_history', ['id' => Auth::id()]) }}" class="active">
                        <img src="/img/icons/sidebar/purchase-order.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Pesanan Saya
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="/img/icons/logout.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Logout
                    </a>
                </li>
            </ul>
    	</div>
		<div class="col-md-8">
            <a href="{{ URL::previous() }}" class="bold" style="display: inline-block; margin-bottom: 15px; text-decoration: none">&#10094;&nbsp; Kembali ke Daftar Pemesanan</a>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong class="text-black booking-sub-title">Detail Pesanan</strong>
                </div>
                <div class="panel-body">
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-4">
                            <small class="bold text-grey">Dipesan Oleh</small><br>
                            <span class="text-black bold">{{ $booking->bookingDetail->customer_name }}</span>
                        </div>
                        <div class="col-md-4">
                            <small class="bold text-grey">Tanggal Pesanan</small><br>
                            <span class="text-black bold">{{ date('d F Y', strtotime($booking->created_at)) }}</span>
                        </div>
                        <div class="col-md-4" style="margin-bottom: 15px">
                            <small class="bold text-grey">No. Pesanan</small><br>
                            <span class="text-black bold">{{ $booking->id }}</span>
                        </div>
                        <div class="col-md-12">
                            <div class="horizontal-line"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <small class="bold text-grey">Status Pembayaran</small><br>
                            <div class="label {{ ($booking->payment_status == 'Belum Dibayar') ? 'label-danger' : (($booking->payment_status == 'Menunggu Konfirmasi') ? 'label-warning' : 'label-success') }} bold">{{ strtoupper($booking->payment_status) }}</div>
                        </div>
                        <div class="col-md-8">
                            <br>
                            <a href="{{ route('booking.upload_pembayaran', ['id' => $booking->id]) }}" class="text-primary bold" style="text-decoration: none">{{ ($booking->payment_status == 'Menunggu Konfirmasi' && $booking->image == null) ? 'Upload Bukti Pembayaran' : '' }}</a>
                        </div>
                    </div>
                </div>  
            </div>
			<div class="panel panel-default">
                <div class="panel-heading">
                    <strong class="text-black booking-sub-title">Detail Penerbangan</strong>
                </div>
                <div class="panel-body" style="padding-top: 0">
                    <div class="row bg-default" style="margin-bottom: 15px">
                        <div class="col-md-8">
                            <img src="{{ Storage::url($booking->bookingDetail->flight->airplane->airline->image) }}" alt="" width="70px" style="vertical-align: middle;">&nbsp;&nbsp;{{ $booking->bookingDetail->flight->airplane->airline->name }} {{ $booking->bookingDetail->flight->flight_number }}
                        </div>
                        <div class="col-md-4 text-right" style="margin-bottom: 15px">
                            Kode Booking <strong class="text-black booking-price-total">{{ $booking->booking_code }}</strong>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-3">
                            <strong class="text-black">{{ $booking->bookingDetail->flight->fromAirport->city->city }} ({{ $booking->bookingDetail->flight->fromAirport->code }})</strong><br>
                            {{ $booking->bookingDetail->flight->fromAirport->name }} Airport
                        </div>
                        <div class="col-md-1 vertical-middle">
                            &rarr;
                        </div>
                        <div class="col-md-3">
                            <strong class="text-black">{{ $booking->bookingDetail->flight->destinationAirport->city->city }} ({{ $booking->bookingDetail->flight->destinationAirport->code }})</strong><br>
                            {{ $booking->bookingDetail->flight->destinationAirport->name }} Airport
                        </div>
                        <div class="col-md-5" style="border-left: 1px solid #ddd">
                            <strong class="text-black">Jadwal Penerbangan</strong><br>
                            {{ date('d M Y H:i', strtotime($booking->bookingDetail->flight->departure_time)) . ' - ' . date('d M Y H:i', strtotime($booking->bookingDetail->flight->arrival_time)) }}
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-12">
                            <div class="horizontal-line"></div>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 15px">
                        <div class="col-md-12">
                            <strong class="text-black">Daftar Penumpang</strong><br>
                        </div>
                    </div>
                    <?php $i = 1 ?>
                    @foreach ($booking->passengers as $passenger)
                    <div class="row booking-passenger-list">
                        <div class="col-md-12">
                            {{ $i }}. <strong>{{ $passenger->appellation .' '. $passenger->name }}</strong>  
                        </div>
                    </div>
                    <?php $i++ ?>
                    @endforeach
                </div>         
            </div>
        </div>
    </div>
</div>
@endsection