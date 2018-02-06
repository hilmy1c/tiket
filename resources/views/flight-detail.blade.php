@extends('layouts.app')

@section('content')
<div class="banner" style="margin-bottom: 20px">
	<div class="my-container">
		<div class="panel panel-default" style="margin-bottom: 0">
			<div class="panel-body">
				<h3 style="color: #000; font-weight: bold; margin-top: 0">Penerbangan dari {{ $flight->fromAirport->city->city }} ke {{ $flight->destinationAirport->city->city }}</h3>
				<span>{{ date('l, d F Y', strtotime($date)) }}</span>
				<div class="flight-detail">
		            <img src="/img/icons/airplane_grey.png" class="my-icon" alt=""> {{ $flight->fromAirport->city->city }} ({{ $flight->fromAirport->code }}) <img src="/img/icons/swipe_right.png" class="my-icon" alt=""> {{ $flight->destinationAirport->city->city }} ({{ $flight->destinationAirport->code }}) | {{ $adult_number }} Dewasa, {{ $child_number }} Anak, {{ $baby_number }} Bayi | {{ $class }}
		        </div>	
			</div>
		</div>
	</div>
</div>
<div class="my-container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>{{ $flight->fromAirport->city->city }} ({{ $flight->fromAirport->code }}) <img src="/img/icons/swipe_right.png" class="my-icon" alt=""> {{ $flight->destinationAirport->city->city }} ({{ $flight->destinationAirport->code }})</strong>
				</div>
				<div class="panel-body">
					<h4><strong>{{ date('l, d F Y', strtotime($date)) }}</strong></h4>
					<div class="airplane-airline">
						<img src="{{ Storage::url($flight->airplane->airline->image) }}" alt="" width="100px" style="margin-right: 20px;">
						<p style="display: inline-block;">
							<strong>{{ $flight->airplane->airline->name .' '. $flight->flight_number }}</strong><br>
							<small class="text-grey">{{ $class }}</small>
						</p>
					</div>
					<div class="detail-list">
						<h4><strong>{{ date('H:i', strtotime($flight->arrival_time)) }}</strong></h4>
                		<small class="text-grey">{{ $flight->fromAirport->city->city }} ({{ $flight->fromAirport->code }})</small>
					</div>
					<div class="detail-list" style="transform: translateY(-50%);">
						&rarr;
					</div>
					<div class="detail-list">
						<h4><strong>{{ date('H:i', strtotime($flight->departure_time)) }}</strong></h4>
                		<small class="text-grey">{{ $flight->destinationAirport->city->city }} ({{ $flight->destinationAirport->code }})</small>
					</div>
					<div class="detail-list">
						<h4><strong>{{ $timeRange }}</strong></h4>
	                    <small class="text-grey">langsung</small>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Summary</strong>
				</div>
				<div class="panel-body" style="padding-bottom: 0">
					<div class="row">
						@if ($adult_fare != 0)
						<div class="col-md-7 list-harga">
							{{ $flight->airplane->airline->name }} (Dewasa) x{{ $adult_number }}
						</div>
						<div class="col-md-5 list-harga">Rp. {{ $adult_fare }}</div>
						@endif
						
						@if ($child_fare != 0)
						<div class="col-md-7 list-harga">
							{{ $flight->airplane->airline->name }} (Anak) x{{ $child_number }}
						</div>
						<div class="col-md-5 list-harga">Rp. {{ $child_fare }}</div>
						@endif

						@if ($baby_fare != 0)
						<div class="col-md-7 list-harga">
							{{ $flight->airplane->airline->name }} (Bayi) x{{ $baby_number }}
						</div>
						<div class="col-md-5 list-harga">Rp. {{ $baby_fare }}</div>
						@endif
					</div>
					<div class="row" style="background-color: #f7f7f7; padding-bottom: 15px">
						<div class="harga-total">
							<div class="col-md-7">
								Harga yang Anda bayar
							</div>
							<div class="col-md-5">
									Rp. {{ $fare }}
							</div>
						</div>
					</div>
				</div>
			</div>

			<form action="{{ route('booking.create', ['id' => $flight->id]) }}" method="GET">
				{{ csrf_field() }}

				<input type="hidden" name="flight_id" value="{{ $flight->id }}">
				<input type="hidden" name="class" value="{{ $class }}">
				<input type="hidden" name="adult_number" value="{{ $adult_number }}">
                <input type="hidden" name="child_number" value="{{ $child_number }}">
                <input type="hidden" name="baby_number" value="{{ $baby_number }}">

				<button type="submit" class="btn btn-warning col-md-12" style="margin-bottom: 20px;">Lanjut Pembayaran</button>
			</form>
		</div>
	</div>
</div>
@endsection