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

    .spacer {
        padding-bottom: 50px;
    }
</style>
<title>Registrasi Peserta</title>

<body>
    <div class="container">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <div class="col s12 center-align">
                        <p class="card-title activator grey-text text-darken-4">Berhasil Mendaftar</p>
                    </div>
                    <div class="col s12 center-align">
                        <h3>Pendaftaran Anda berhasil. Silahkan tunggu email konfirmasi pembayaran dari penyelenggara.
                        </h3>
                        <a href="{{ url('event/' . $eventId) }}"
                            class="waves-effect waves-light btn amber black-text">OK
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        M.AutoInit();
    </script>
</body>

</html>