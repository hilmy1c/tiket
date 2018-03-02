@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <h4><strong>Petunjuk Pembayaran Transfer</strong></h4>
	<div class="row">
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-body">
					<h4 class="booking-sub-title">
						<span class="num-payment-guide">1</span>
						<strong>Selesaikan Pembayaran Sebelum</strong>
					</h4>
					<div class="alert alert-default" style="color: #777">
						<h4 class="booking-sub-title"><strong>Hari ini {{ date('H:i') }}</strong></h4>
						Selesaikan pembayaran dalam <span id="countdown"></span>

					</div>
					<h4 class="booking-sub-title">
						<span class="num-payment-guide">2</span>
						<strong>Mohon Transfer ke:</strong>
					</h4>
					<div class="alert alert-default" style="padding-top: 0; color: #777;">
						<div class="row bg-default" style="margin-bottom: 10px">
							<h4 class="booking-sub-title col-md-8"><strong>{{ $booking->bankAccount->bank_name }}</strong></h4>
							<div class="col-md-4 text-right"><img src="{{ Storage::url($booking->bankAccount->image) }}" alt="" width="50px" style="vertical-align: middle;"></div>
						</div>
						<div class="row bank-account-row">
							<div class="col-md-4">Nomor Rekening:</div>
							<div class="col-md-8 text-left booking-price-total text-black">
								<strong>{{ $booking->bankAccount->account }}</strong>
							</div>
						</div>
						<div class="row bank-account-row">
							<div class="col-md-4">Nama Penerima:</div>
							<div class="col-md-8 text-left booking-price-total text-black">
								<strong>{{ $booking->bankAccount->owner }}</strong>
							</div>
						</div>
						<div class="row bank-account-row"><div class="horizontal-line"></div></div>
						<div class="row bank-account-row">
							<div class="col-md-4">Jumlah Transfer:</div>
							<div class="col-md-8 text-left booking-price-total text-black">
								<strong>Rp. {{ $booking->bookingDetail->flight_fare_total }}</strong>
							</div>
						</div>
					</div>
					<h4 class="booking-sub-title">
						<span class="num-payment-guide">3</span>
						<strong>Anda Sudah Membayar?</strong>
					</h4>
					<div class="alert alert-default" style="color: #777;">
						<p style="line-height: 30px">Setelah pembayaran Anda dikonfirmasi, kami akan mengirim e-tiket penerbangan ke alamat email Anda.</p>
						<form action="{{ route('booking.update_payment', ['id' => $booking->id]) }}" method="POST">
							{{ csrf_field() }}
							{{ method_field('PUT') }}

							<button type="submit" class="btn custom-grey-btn" style="padding: 10px 20px 10px 20px; margin-top: 10px">Saya Sudah Bayar</button>
            			</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
        		<div class="panel-body">
        			<strong class="text-grey booking-sub-title2">NO. PESANAN</strong><br>
        			<strong>{{ $booking->id }}</strong>
        			<div class="row" style="margin-top: 15px; margin-bottom: 15px"><div class="horizontal-line"></div></div>
        			<strong class="text-grey" style="margin-bottom: 10px; display: inline-block;">YOUR TRIP</strong><br>
        			<div class="row" style="border-left: 3px solid #931682; padding-left: 12px;">
	        			<strong>Flight</strong><br>
        			</div>
        			<span class="text-grey booking-sub-title2">{{ date('d F Y', strtotime($booking->bookingDetail->flight->departure_time)) }}</span>
        			<li>{{ $booking->bookingDetail->flight->fromAirport->city->city }} ({{ $booking->bookingDetail->flight->fromAirport->code }}) &rarr; {{ $booking->bookingDetail->flight->destinationAirport->city->city }} ({{ $booking->bookingDetail->flight->destinationAirport->code }})</li>
        			<div class="row" style="margin-top: 15px; margin-bottom: 15px"><div class="horizontal-line"></div></div>
        			<strong class="text-grey booking-sub-title2">DAFTAR PENUMPANG</strong><br>
					@foreach ($booking->passengers as $passenger)
						<div class="row booking-passenger-list">
							<div class="col-md-8">
								{{ $passenger->appellation . " " . $passenger->name }}
							</div>
							<div class="col-md-4 text-right">
								{{ $passenger->status }}
							</div>
						</div>
					@endforeach
        		</div>
        	</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function () {
		$("#now").text(moment().format('hh:mm'));
	});
</script>
@endsection