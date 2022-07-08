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
            <form action="{{ url('event/' . $data['eventId'] . '/register') }}" method="post">
                @csrf
                <input type="hidden" name="eventPaymentCategory" value="{{ $data['eventPaymentCategory'] }}">
                <input type="hidden" name="eventId" value="{{ $data['eventId'] }}">
                <input type="hidden" name="name" value="{{ $data['name'] }}">
                <input type="hidden" name="email" value="{{ $data['email'] }}">
                <input type="hidden" name="phoneNumber" value="{{ $data['phoneNumber'] }}">
                <input type="hidden" name="eventDate" value="{{ $data['eventDate'] }}">
                <input type="hidden" name="ticketId" value="{{ explode('|', $data['ticketId'])[0] }}">
                @if($data["eventPaymentCategory"] == 2)
                <input type="hidden" name="paymentId" value="{{explode('|',  $data['paymentId'])[0] }}">
                <input type="hidden" name="paymentPhoto" value="{{ $paymentPhoto }}">
                @endif
                <div class="card-content">
                    <div class="row">
                        <div class="col s12 center-align">
                            <p class="card-title activator grey-text text-darken-4">Konfirmasi Pendaftaran</p>
                        </div>
                        <div class="spacer"></div>
                        <div class="col s12">
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>{{ $data['name'] }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $data['email'] }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td>{{ $data['phoneNumber'] }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{ $data['eventDate'] }}</td>
                                </tr>
                                <tr>
                                    <td>Tiket</td>
                                    <td>{{ explode('|', $data['ticketId'])[1] }}</td>
                                </tr>
                                @if($data["eventPaymentCategory"] == 2)
                                <tr>
                                    <td>Pembayaran</td>
                                    <td>{{ explode('|', $data['paymentId'])[1] }}</td>
                                </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col s12 center-align">
                            <div class="spacer"></div>
                            <h5>Apakah Anda ingin mendaftar dengan data diri di atas?</h5>
                        </div>
                        <div class="col s6 right-align">
                            <div class="spacer"></div>
                            <a href="{{ url()->previous() }}"
                                class="waves-effect waves-light btn black-text btn-flat">Tidak
                            </a>
                        </div>
                        <div class="col s6 left-align">
                            <div class="spacer"></div>
                            <input type="submit" class="waves-effect waves-light btn amber black-text" value="Ya">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        M.AutoInit();
    </script>
</body>

</html>