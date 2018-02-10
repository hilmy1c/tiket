@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
    <h4><strong>Pembayaran</strong></h4>
	<div class="row">
        <div class="col-md-7">
            <div class="panel panel-default">
            	<div class="panel-heading text-center" style="background-color: #E3F2FD; border-color: #E3F2FD">
            		<strong class="text-primary">Selesaikan pembayaran dalam 00:42:34</strong>
            	</div>
            	<div class="panel-body">
                    <form action="{{ route('booking.bank_account', ['id' => $booking->id]) }}" method="GET">
                        {{ csrf_field() }}

                		<div class="alert alert-info" style="position: relative">
                			<div class="row">
    	            			<img src="/img/icons/info-blue.png" alt="" class="my-icon" style="position: absolute; top: 50%; transform: translateY(-50%); left: 22px">
    	            			<div class="col-md-11 pull-right">
    		            			Anda bisa transfer dari layanan perbankan apapun (m-banking, SMS banking atau ATM).
    	            			</div>
    	            		</div>
                		</div>
                		<h4 class="booking-sub-title">Pilih Rekening Tujuan</h4>
                        @foreach ($bank_accounts as $bank_account)
                		<div class="alert alert-default alert-list">
    						<input type="radio" name="bank_id" value="{{ $bank_account->id }}" class="radio-bank">&nbsp;&nbsp;&nbsp;{{ $bank_account->bank_name }} <img src="{{ Storage::url($bank_account->image) }}" alt="" class="bank-icon pull-right">
                		</div>
                        @endforeach
                		<div class="row bg-default" style="border-top: 1px solid #ddd; border-bottom: 1px solid #ddd; margin-bottom: 10px">
                			<div class="col-md-12" style="margin-bottom: 15px">
                				<h4 class="booking-sub-title">Rincian Harga</h4>
                			</div>
                			@if ($booking->bookingDetail->adult_number != 0)
                			<div class="col-md-12 booking-price-list">
                				{{ $booking->bookingDetail->flight->airplane->airline->name }} (Dewasa) x{{ $booking->bookingDetail->adult_number }}
                				<span class="pull-right">Rp {{ $booking->bookingDetail->adult_fare }}</span>
                			</div>
                			@endif
                			@if ($booking->bookingDetail->child_number != 0)
                			<div class="col-md-12 booking-price-list">
                				{{ $booking->bookingDetail->flight->airplane->airline->name }} (Anak) x{{ $booking->bookingDetail->child_number }}
                				<span class="pull-right">Rp {{ $booking->bookingDetail->child_fare }}</span>
                			</div>
                			@endif
                			@if ($booking->bookingDetail->baby_number != 0)
                			<div class="col-md-12 booking-price-list">
                				{{ $booking->bookingDetail->flight->airplane->airline->name }} (Bayi) x{{ $booking->bookingDetail->baby_number }}
                				<span class="pull-right">Rp {{ $booking->bookingDetail->baby_fare }}</span>
                			</div>
                			@endif
    						<div class="col-md-12" style="height: auto"><div class="horizontal-line"></div></div>
    						<div class="col-md-12 booking-price-list" style="padding-top: 25px">
    							Harga Total <strong class="pull-right booking-price-total">Rp {{ $booking->bookingDetail->flight_fare_total }}</strong>
    						</div>
                		</div>
                		<div class="row">
    	            		<div class="col-md-12">
    	            			<p class="text-right" style="line-height: 30px">Dengan mengklik tombol berikut, Anda menyetujui Syarat & Ketentuan dan Kebijakan Privasi Rajatiket.</p>
    	            			<button type="submit" class="btn btn-warning pull-right" style="padding-left: 30px; padding-right: 30px">
    	            				<strong>Bayar</strong>
    	            			</button>
    	            		</div>
                		</div>
                    </form>
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
    $(".radio-bank").eq(0).prop('checked', true);
</script>
@endsection

