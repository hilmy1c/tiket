@extends('layouts.app')

@section('content')
<div class="my-container" style="margin-top: 20px">
	<h4><strong>Unggah Bukti Pembayaran</strong></h4>
    <div class="row">
        <div class="col-md-8">
        	<div class="panel panel-default">
        		<div class="panel-body" style="padding: 30px">
        			<div class="alert alert-default text-center" style="margin-bottom: 0">
        				<img src="/img/icons/image_file.png" alt="">
        				<p style="margin: 0 auto; width: 450px; margin-bottom: 15px">Unggah bukti pembayaran anda untuk mempercepat proses verifikasi pesananan Anda.</p>
        				<p style="margin: 0 auto; width: 450px; margin-bottom: 15px">Anda hanya bisa mengunggah hingga 1MB dalam format JPG, PNG atau JPEG.</p>
        				<form action="{{ route('booking.simpan_file', ['id' => $booking->id]) }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}

		    				<div class="form-group" style="margin: 0 auto; width: 450px">
		    					<div class="input-group">
									<input type="file" name="image" class="form-control">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="submit">
											<img src="/img/icons/upload.png" alt="" class="my-icon-sm">
										</button>
									</span>
							    </div>
		    				</div>
        				</form>
        			</div>
        		</div>
        	</div>
        </div>
		<div class="col-md-4">
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
@endsection