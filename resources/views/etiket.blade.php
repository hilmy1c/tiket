<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rajatiket</title>
    <style>
    	body {
    		max-width: 896px;
    		position: relative;
    		font-family: "Open Sans", sans-serif;
    	}

    	.border-bottom-dotted {
    		border-bottom: 3px dotted #ddd;
    	}
		
		.my-container {
			padding: 20px;
		}

    	.bold {
    		font-weight: bold;
    	}

    	.booking-detail-title {
    		font-weight: bold;
    		font-size: 16px;
    		margin: 0;
    	}

    	.text-blue {
    		color: #2196f3;
    	}

    	.row:before, .row:after {
    		display: table;
			content: " ";
    	}

    	.row:after {
    		clear: both;
    	}

    	.row {
			margin-right: -15px;
			margin-left: -15px;
		}

    	.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
			float: left;
		}
		.col-md-12 {
			width: 100%;
		}
		.col-md-11 {
			width: 91.66666667%;
		}
		.col-md-10 {
			width: 83.33333333%;
		}
		.col-md-9 {
			width: 75%;
		}
		.col-md-8 {
			width: 66.66666667%;
		}
		.col-md-7 {
			width: 58.33333333%;
		}
		.col-md-6 {
			width: 50%;
		}
		.col-md-5 {
			width: 41.66666667%;
		}
		.col-md-4 {
			width: 33.33333333%;
		}
		.col-md-3 {
			width: 25%;
		}
		.col-md-2 {
			width: 16.66666667%;
		}
		.col-md-1 {
			width: 8.33333333%;
		}

		.text-grey {
			color: #a4aaae;
		}

		.separator-range-time {
			height: 65%;
			position: absolute;
			top: 20%;
			transform: translateY(-20%);
			left: 30%;
		}

		.my-container {
			padding-right: 20px;
			padding-left: 20px;
		}

		.background-image {
			width: 130px;
			position: absolute;
			z-index: -99999;
			top: 0;
			right: 0;
		}

		.border-bottom-solid {
			border-bottom: 2px solid #ddd;
		}

		.my-table {
			width: 100%;
			border-spacing: 0;
		}

		.my-table thead {
			background-color: #ddd;
		}

		.my-table th, .my-table td {
			padding: 10px 20px 10px 20px;
			text-align: left;
		}
    </style>
</head>
<body>
	<img src="{{ base_path() }}/public/img/logo_tiket.png" alt="" class="background-image">
	{{-- <img src="/img/logo_tiket.png" alt="" class="background-image"> --}}
	<div class="my-container">
		{{-- Judul --}}
		<div class="row">
			<div class="col-md-12">
				{{-- <img src="/img/partners/pt_kai2.jpg" alt="" width="190px" style="margin-bottom: 15px"> --}}
				<h2 class="border-bottom-dotted" style="padding-bottom: 15px; font-weight: lighter">E-Tiket (Pesawat)</h2>
			</div>
		</div>

		{{-- Booking Detail --}}
		<div class="row border-bottom-solid" style="margin-bottom: 20px">
			<div class="col-md-4">
				<img src="{{ base_path() }}/public/{{ Storage::url($booking->bookingDetail->flight->airplane->airline->image) }}" alt="" width="180px" style="margin-bottom: 15px">
				<h4 class="booking-detail-title">{{ $booking->bookingDetail->flight->airplane->airline->name }}</h4>
				<h4 class="booking-detail-title">{{ $booking->bookingDetail->flight->flight_number }}</h4>
				<small>{{ ucwords($class) }}</small>
			</div>
			<div class="col-md-4" style="margin-bottom: 20px;">
				<h4 class="booking-detail-title">{{ date('l, d F Y', strtotime($booking->bookingDetail->flight->departure_time)) }}</h4>
				<div class="col-md-12" style="position: relative">
					<img src="{{ base_path() }}/public/img/range.png" alt="" height="80px" class="separator-range-time">
					<div class="col-md-12" style="margin-bottom: 25px">
						<div class="col-md-5">
							<h4 class="booking-detail-title">{{ date('H:i', strtotime($booking->bookingDetail->flight->departure_time)) }}</h4>
							<small class="text-grey">{{ date('d F', strtotime($booking->bookingDetail->flight->departure_time)) }}</small>
						</div>
						<div class="col-md-7">
							<h4 class="booking-detail-title">{{ $booking->bookingDetail->flight->fromAirport->city->city }}</h4>
							<small class="text-grey">Bandara {{ $booking->bookingDetail->flight->fromAirport->name }}</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="col-md-5">
							<h4 class="booking-detail-title">{{ date('H:i', strtotime($booking->bookingDetail->flight->arrival_time)) }}</h4>
							<small class="text-grey">{{ date('d F', strtotime($booking->bookingDetail->flight->arrival_time)) }}</small>
						</div>
						<div class="col-md-7">
							<h4 class="booking-detail-title">{{ $booking->bookingDetail->flight->destinationAirport->city->city }}</h4>
							<small class="text-grey">Bandara {{ $booking->bookingDetail->flight->destinationAirport->name }}</small>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12" style="margin-bottom: 20px">
					<small>Kode Booking</small>
					<h2 class="text-blue bold" style="margin: 0">{{ $booking->booking_code }}</h2>
				</div>
				<div class="col-md-12">
					<small>No. Pesanan Rajatiket</small><br>
					<strong>{{ $booking->id }}</strong>
				</div>
			</div>
		</div>

		{{-- Info --}}
		<div class="row border-bottom-solid" style="padding-bottom: 20px; margin-bottom: 20px">
			<h4 class="booking-detail-title" style="margin-bottom: 20px">HAL PENTING TERKAIT KEBERANGKATAN</h4>
			<div class="col-md-4">
				<div class="col-md-2">
					<img src="{{ base_path() }}/public/img/icons/read.png" alt="" width="40px">
				</div>
				<div class="col-md-10">
					Tunjukkan e-tiket dan identitas para penumpang kepada petugas.
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2">
					<img src="{{ base_path() }}/public/img/icons/smart_card.png" alt="" width="40px">
				</div>
				<div class="col-md-10">
					Bawa tanda pengenal resmi yang sesuai digunakan saat memesan.
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2">
					<img src="{{ base_path() }}/public/img/icons/clock.png" alt="" width="40px">
				</div>
				<div class="col-md-10">
					Tibalah di stasun setidaknya 60 menit sebelum keberangkatan.
				</div>
			</div>
		</div>
		<div class="row">
			<table class="my-table">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
						<th>Tipe Penumpang</th>
						<th>Kelas</th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1 ?>
					@foreach ($booking->passengers as $passenger)
					<tr>
						<td>{{ $i }}</td>
						<td>{{ $passenger->appellation }} {{ $passenger->name }}</td>
						<td>{{ $passenger->status }}</td>
						<td>{{ ucwords($class) }}</td>
					</tr>
					<?php $i++ ?>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>