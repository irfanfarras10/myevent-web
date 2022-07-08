<!DOCTYPE html>
<html>

<head>
	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<!--Import materialize.css-->
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet" />
	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<style>
		* {
			font-family: "Inter", sans-serif;
		}

		.event-image,
		img {
			width: 100%;
		}

		.event-category {
			background-color: #3b3838;
			color: white;
			padding-left: 20px;
			padding-top: 10px;
			padding-right: 20px;
			padding-bottom: 10px;
			display: inline-block;
			border-radius: 5px;
		}

		.content {
			padding-bottom: 50px;
		}

		.contact-person {
			padding-left: 20px;
			padding-top: 10px;
			padding-right: 20px;
			padding-bottom: 10px;
			background-color: #e8e8e8;
			margin-bottom: 20px;
			border-radius: 5px;
		}
	</style>
</head>
<title>Detail Event</title>

<body>
	<div class="container">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src={{ $data["bannerPhoto"] }} />
			</div>
			<div class="card-content">
				<div class="row">
					<div class="col m8 s12">
						<span class="card-title activator grey-text text-darken-4">
							{{ $data["name"] }}
						</span>
						<p class="event-category">
							{{ $data["eventCategory"]["name"] }}
						</p>
						<div class="content"></div>
						<p class="card-title event-description-title">
							Deskripsi Event
						</p>
						<p class="content">
							{{ $data["description"] }}
						</p>
						<p class="card-title">Tanggal dan Waktu Event</p>
						<table>
							<tbody>
								<tr>
									<td>Tanggal</td>
									<td>
										{{
										\Carbon\Carbon::parse(date("Y-m-d H:i:s", substr($data["dateEventStart"], 0,
										10)))->isoFormat('dddd, D MMMM Y')
										}}
									</td>
								</tr>
								<tr>
									<td>Waktu</td>
									<td>
										{{
										\Carbon\Carbon::parse(date("Y-m-d H:i:s", substr($data["timeEventStart"], 0,
										10)))->isoFormat('HH:mm')
										}}
									</td>
								</tr>
							</tbody>
						</table>
						<div class="content"></div>
						<p class="card-title event-description-title">
							Lokasi Event
						</p>
						{{ $location }}
						@if($data["eventVenueCategory"]["id"] == 1)
						<div style="width: 100%">
							<iframe scrolling="no" marginheight="0" marginwidth="0"
								src="https://maps.google.com/maps?width=100%&amp;height=500&amp;hl=en&amp;q={{ $location }}, Indonesia (Lokasi)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
								width="100%" height="500" frameborder="0">
							</iframe>
						</div>
						@endif
					</div>
					<div class="col m4 s12">
						<a class="waves-effect waves-light btn amber col s12 black-text" id="button"
							href="{{ url('/event/' . $data['id'] . '/register') }}">Daftarkan Diri</a>
						<div class="content"></div>
						<p class="card-title">Tiket</p>
						<table>
							@foreach ($data["ticket"] as $ticket)
							<tr>
								<td>{{ $ticket["name"] }}</td>
								<td>@currency($ticket["price"])</td>
							</tr>
							@endforeach
						</table>
						@if($data["eventPayment"] != null)
						<div class="content"></div>
						<p class="card-title">Info Pembayaran</p>
						<table>
							@foreach ($data["eventPayment"] as $payment)
							<div class="contact-person">
								<p>{{ $payment["type"] }}</p>
								<p>{{ $payment["information"]}}</p>
							</div>
							@endforeach
						</table>
						@endif
						<div class="content"></div>
						<p class="card-title">Contact Person</p>
						<table>
							@foreach ($data["eventContactPerson"] as $contactPerson)
							<div class="contact-person">
								<p>{{ $contactPerson["name"] }}</p>
								<p>{{ $contactPerson["eventSocialMedia"]["name"]}} : {{$contactPerson["contact"]}}</p>
							</div>
							@endforeach
						</table>

						<div class="content"></div>
						<p class="card-title">Organized By</p>
						{{ $data["eventOrganizer"]["organizerName"] }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>