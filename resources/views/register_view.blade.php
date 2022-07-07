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
</head>
<style>
	* {
		font-family: "Inter", sans-serif;
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
</style>
<title>Registrasi Peserta</title>

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
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>