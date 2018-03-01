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
			<h4 class="booking-sub-title">
				<img src="/img/icons/airplane_grey.png" alt="" class="my-icon">&nbsp;&nbsp;&nbsp;<strong>Penerbangan ({{ count($flight_bookings) }})</strong>
			</h4>
			
			@if (count($flight_bookings) == 0)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">
							<img src="/img/icons/empty_box.png" alt="" width="80px">
						</div>
						<div class="col-md-10">
							<h4 class="bold">Belum Ada Pesanan</h4>
							<h5>Seluruh pesanan Anda akan muncul di sini, tapi kini Anda belum punya satu pun. Mari buat pesanan via homepage!</h5>
						</div>
					</div>
				</div>
			</div>
			@endif

			@foreach ($flight_bookings as $booking)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" style="border-left: 3px solid #2196f3; padding-left: 12px; padding-right: 12px;">
						<h4 class="text-black" style="margin-top: 10px; margin-bottom: 10px">
							<strong>
								{{ $booking->bookingDetail->flight->fromAirport->city->city }} ({{ $booking->bookingDetail->flight->fromAirport->code }}) &rarr; {{ $booking->bookingDetail->flight->destinationAirport->city->city }} ({{ $booking->bookingDetail->flight->destinationAirport->code }})
								<span class="pull-right">Rp. {{ $booking->bookingDetail->flight_fare_total }}</span>
							</strong>
						</h4>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col-md-6">
							{{ $booking->bookingDetail->flight->airplane->airline->name }} <img src="{{ Storage::url($booking->bookingDetail->flight->airplane->airline->image) }}" alt="" height="30px">
						</div>
						<div class="col-md-6 text-right">
							No. Pesanan <strong class="text-black">{{ $booking->id }}</strong>
						</div>
					</div>
					<div class="row bg-default" style="margin-top: 10px">
						<div class="col-md-4">
							<small class="text-grey bold">JADWAL PENERBANGAN</small><br>
							<small class="text-black">
								<strong>{{ date('l, d F Y', strtotime($booking->bookingDetail->flight->departure_time)) }} &bullet; {{ date('H:i', strtotime($booking->bookingDetail->flight->departure_time)) }}</strong>
							</small>
						</div>
						<div class="col-md-8">
							<small class="text-grey bold">BANDARA ASAL</small><br>
							<small class="text-black">
								<strong>{{ $booking->bookingDetail->flight->fromAirport->name }} Airport</strong>
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
							<a href="{{ route('user.history_detail', ['id' => $booking->id]) }}" class="text-primary bold" style="text-decoration: none">Lihat Detail @if ($booking->payment_status == 'Menunggu Konfirmasi' && $booking->image == null) <span class="circle-notif"></span> @endif</a>
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

			<h4 class="booking-sub-title"><img src="/img/icons/train_grey.png" alt="" class="my-icon">&nbsp;&nbsp;&nbsp;<strong>Perjalanan Kereta ({{ count($train_bookings) }})</strong></h4>

			@if (count($train_bookings) == 0)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-2">
							<img src="/img/icons/empty_box.png" alt="" width="80px">
						</div>
						<div class="col-md-10">
							<h4 class="bold">Belum Ada Pesanan</h4>
							<h5>Seluruh pesanan Anda akan muncul di sini, tapi kini Anda belum punya satu pun. Mari buat pesanan via homepage!</h5>
						</div>
					</div>
				</div>
			</div>
			@endif

			@foreach ($train_bookings as $booking)
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row" style="border-left: 3px solid #ffa000; padding-left: 12px; padding-right: 12px;">
						<h4 class="text-black" style="margin-top: 10px; margin-bottom: 10px">
							<strong>
								{{ $booking->bookingDetail->trainJourney->startStation->city->city }} ({{ $booking->bookingDetail->trainJourney->startStation->code }}) &rarr; {{ $booking->bookingDetail->trainJourney->endStation->city->city }} ({{ $booking->bookingDetail->trainJourney->endStation->code }})
								<span class="pull-right">Rp. {{ $booking->bookingDetail->train_fare_total }}</span>
							</strong>
						</h4>
					</div>
					<div class="row" style="margin-top: 10px">
						<div class="col-md-6">
							{{ $booking->bookingDetail->trainJourney->trainRoute->train->name }}
						</div>
						<div class="col-md-6 text-right">
							No. Pesanan <strong class="text-black">{{ $booking->id }}</strong>
						</div>
					</div>
					<div class="row bg-default" style="margin-top: 10px">
						<div class="col-md-12">
							<small class="text-grey bold">JADWAL KEBERANGKATAN</small><br>
							<small class="text-black">
								<strong>{{ date('l, d F Y', strtotime($booking->bookingDetail->trainJourney->departure_time)) }} &bullet; {{ date('H:i', strtotime($booking->bookingDetail->trainJourney->trainRoute->departure_time)) }}</strong>
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
							<a href="{{ route('user.train_history_detail', ['id' => $booking->id]) }}" class="text-primary bold" style="text-decoration: none">Lihat Detail @if ($booking->payment_status == 'Menunggu Konfirmasi' && $booking->image == null) <span class="circle-notif"></span> @endif</a>
							@if ($booking->payment_status == 'Belum Dibayar')
							<a href="javascript:" data-toggle="popover" data-content="<a href='{{ route('booking.train_bank_account', ['id' => $booking->id]) }}?bank_id={{ $booking->bank_account_id }}' class='popover-text bold text-black'>Lanjutkan ke Pembayaran</a><br><a href='{{ route('booking.delete', ['id' => $booking->id]) }}' class='popover-text bold text-danger'>Batalkan Pesanan</a>" style="margin-left: 15px">
								<img src="/img/icons/more.png" class="my-icon" alt="">
							</a>
							@elseif($booking->payment_status == 'Sudah Dibayar')
							<a href="javascript:" data-toggle="popover" data-content="<a href='{{ route('booking.train_cetak_tiket', ['id' => $booking->id]) }}' class='popover-text bold text-black'>Cetak Tiket</a>" style="margin-left: 15px">
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