@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <div class="row">
    	<div class="col-md-4">
		    <h4 class="booking-sub-title"><strong>Akun Saya</strong></h4>
            <ul class="user-sidebar-menu">
                <li>
                    <a href=""><img src="/img/icons/user.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Akun Saya</a>
                </li>
                <li>
                    <a href="{{ route('user.booking_history', ['id' => Auth::id()]) }}" class="active"><img src="/img/icons/sidebar/purchase-order.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Pesanan Saya</a>
                </li>
                <li>
                    <a href=""><img src="/img/icons/logout.png" class="my-icon" alt="">&nbsp;&nbsp;&nbsp;Logout</a>
                </li>
            </ul>
    	</div>
		<div class="col-md-8">
			@foreach ($user->bookings as $booking)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" style="border-left: 3px solid #2196f3; padding-left: 12px;">
						<h4 class="text-black" style="margin-top: 10px; margin-bottom: 10px"><strong>{{ $booking->bookingDetail->flight->fromAirport->city->city }} ({{ $booking->bookingDetail->flight->fromAirport->code }}) &rarr; {{ $booking->bookingDetail->flight->destinationAirport->city->city }} ({{ $booking->bookingDetail->flight->destinationAirport->code }})</strong></h4>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col-md-6">
							{{ $booking->bookingDetail->flight->airplane->airline->name }}&nbsp;&nbsp;
							<img src="{{ Storage::url($booking->bookingDetail->flight->airplane->airline->image) }}" class="my-icon" alt="">
						</div>
						<div class="col-md-6 text-right">
							No. Pesanan <strong class="text-black">{{ $booking->id }}</strong>
						</div>
					</div>
					<div class="row bg-default" style="margin-top: 10px">
						<div class="col-md-4">
							<small class="text-grey bold">JADWAL PENERBANGAN</small><br>
							<small class="text-black">
								<strong>{{ date('d F Y', strtotime($booking->bookingDetail->flight->departure_time)) }} &bullet; {{ date('H:i', strtotime($booking->bookingDetail->flight->departure_time)) }}</strong>
							</small>
						</div>
						<div class="col-md-8">
							<small class="text-grey bold">BANDARA ASAL</small><br>
							<small class="text-black">
								<strong>{{ $booking->bookingDetail->flight->fromAirport->name }}</strong>
							</small>
						</div>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col-md-6">
							<div class="label {{ ($booking->payment_status == 'Belum Dibayar') ? 'label-danger' : (($booking->payment_status == 'Menunggu Konfirmasi') ? 'label-warning' : 'label-success') }} my-label">
								<strong>{{ strtoupper($booking->payment_status) }}</strong>
							</div>
						</div>
						<div class="col-md-6 text-right">
							<a href="{{ route('user.history_detail', ['id' => $booking->id]) }}" class="text-primary bold" style="text-decoration: none">Lihat Detail</a>
							@if ($booking->payment_status == 'Belum Dibayar')
							<a href="javascript:" data-toggle="popover" data-content="<a href='{{ route('booking.bank_account', ['id' => $booking->id]) }}?bank_id={{ $booking->bank_account_id }}' class='popover-text bold text-black'>Lanjutkan ke Pembayaran</a><br><a href='{{ route('booking.delete', ['id' => $booking->id]) }}' class='popover-text bold text-danger'>Batalkan Pesanan</a>" style="margin-left: 15px">
								<img src="/img/icons/more.png" class="my-icon" alt="">
							</a>
							@elseif($booking->payment_status == 'Sudah Dibayar')
							<a href="javascript:" data-toggle="popover" data-content="<a href='{{ route('booking.cetak_tiket', ['id' => $booking->id]) }}' class='popover-text bold text-black'>Cetak Tiket</a>" style="margin-left: 15px">
								<img src="/img/icons/more.png" class="my-icon" alt="">
							</a>
							@endif
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
    </div>
</div>
@endsection