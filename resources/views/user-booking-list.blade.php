@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <div class="row">
    	<div class="col-md-4">
		    <h4 class="booking-sub-title"><strong>Akun Saya</strong></h4>
    		<nav class="sidebar-menu-container">
                <ul class="sidebar-menu">
                    <li>
                        <a href=""><img src="/img/icons/user.png" class="my-icon" alt="">Akun Saya</a>
                    </li>
                    <li>
                        <a href=""><img src="/img/icons/sidebar/purchase-order.png" class="my-icon" alt="">Pesanan Saya</a>
                    </li>
                    <li>
                        <a href=""><img src="/img/icons/logout.png" class="my-icon" alt="">Logout</a>
                    </li>
                </ul>
            </nav>
    	</div>
		<div class="col-md-8">
			<h4 class="booking-sub-title"><strong>Pesanan Saya</strong></h4>
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
							<div class="label label-danger my-label">
								<strong>WAKTU PEMESANAN HABIS</strong>
							</div>
						</div>
						<div class="col-md-6"></div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
    </div>
</div>
@endsection