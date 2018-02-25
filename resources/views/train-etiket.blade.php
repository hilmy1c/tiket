<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rajatiket</title>
    <style>
		@page {
			margin: 0;
		}
		
		body {
			font-family: 'Open Sans', sans-serif;
			font-size: 10px;
			max-width: 795px;
		}

		.my-background-img {
			position: absolute;
			right: 0;
			width: 150px;
			z-index: -99999;
		}

		.my-container {
			padding: 20px;
		}

		.title {
			font-weight: lighter;
		}

		.travel-detail-title {
			font-size: 15px;
			margin-top: 10px;
			font-weight: bold;
			margin-bottom: 10px;
		}
		
		.travel-name, .travel-destination {
			position: relative;
			min-height: 1px;
			padding-right: 15px;
			padding-left: 15px;
			float: left;
		}

		.travel-name {
			width: 20%;
		}

		.travel-destination {
			width: 40%;
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

		.travel-departure, .travel-arrival {
			position: relative;
			min-height: 50px;
		}

		.travel-arrival .travel-arrival-content {
			bottom: 0;
		}

		.travel-departure h2, .travel-arrival h2 {
			margin-bottom: 0;
		}

		.text-grey {
			color: #a4aaae;
		}

		.travel-content-time, .trave-content-place {
			position: relative;
			min-height: 1px;
			padding-right: 15px;
			padding-left: 15px;
			float: left;
		}

		.travel-content-time {
			width: 50%;
		}

		.clearfix {
			clear: both;
		}
    </style>
</head>
<body>
	<img src="{{ base_path() }}/public/img/logo_tiket.png" alt="" class="my-background-img">
	{{-- <img src="/img/logo_tiket.png" alt="" class="my-background-img"> --}}
	<div class="my-container">
		<img src="{{ base_path() }}/public/img/partners/pt_kai2.jpg" alt="" class="partner-logo"  style="margin-bottom: 20px; width: 180px">
		{{-- <img src="/img/partners/pt_kai2.jpg" alt="" class="partner-logo" style="margin-bottom: 20px"> --}}
		<h1 class="title" style="padding-bottom: 10px; border-bottom: 2px dotted #ddd">E-Tiket (Kereta Api)</h1>
		<div class="row">
			<div class="travel-name">
				<h2 class="travel-detail-title">{{ $booking->bookingDetail->trainJourney->trainRoute->train->name }}</h2>
				{{ ucwords($booking->bookingDetail->trainJourney->sub_class) }} ({{ $booking->bookingDetail->trainJourney->sub_class_code }})
			</div>
			<div class="travel-destination">
				<h2 class="travel-detail-title">{{ date('l, d F Y', strtotime($booking->bookingDetail->trainJourney->departure_time)) }}</h2>
				<div class="travel-destination-detail">
					<div class="travel-departure">
						<div class="travel-departure-content">
							<h2 class="travel-detail-title">{{ date('H:i', strtotime($booking->bookingDetail->trainJourney->trainRoute->departure_time)) }}</h2>
							<span class="text-grey">{{ date('d F', strtotime($booking->bookingDetail->trainJourney->departure_time)) }}</span>
						</div>
					</div>
					<div class="travel-arrival">
						<div class="travel-arrival-content">
							<h2 class="travel-detail-title">{{ date('H:i', strtotime($booking->bookingDetail->trainJourney->trainRoute->arrival_time)) }}</h2>
							<span class="text-grey">{{ date('d F', strtotime($booking->bookingDetail->trainJourney->arrival_time)) }}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>