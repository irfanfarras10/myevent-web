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

    .spacer {
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

    /* label focus color */
    .input-field input[type=text]:focus+label {
        color: #ffc107 !important;
    }

    /* label focus color */
    .input-field input[type=text] {
        border-bottom: 1px solid black !important;
        box-shadow: 0 1px 0 0 black !important;
    }

    /* label underline focus color */
    .input-field input[type=text]:focus {
        border-bottom: 1px solid #ffc107 !important;
        box-shadow: 0 1px 0 0 #ffc107 !important;
    }

    /* label focus color */
    .input-field input[type=email]:focus+label {
        color: #ffc107 !important;
    }

    /* label focus color */
    .input-field input[type=email] {
        border-bottom: 1px solid black !important;
        box-shadow: 0 1px 0 0 black !important;
    }

    /* label underline focus color */
    .input-field input[type=email]:focus {
        border-bottom: 1px solid #ffc107 !important;
        box-shadow: 0 1px 0 0 #ffc107 !important;
    }

    /* label focus color */
    .input-field input[type=tel]:focus+label {
        color: #ffc107 !important;
    }

    /* label focus color */
    .input-field input[type=tel] {
        border-bottom: 1px solid black !important;
        box-shadow: 0 1px 0 0 black !important;
    }

    /* label underline focus color */
    .input-field input[type=tel]:focus {
        border-bottom: 1px solid #ffc107 !important;
        box-shadow: 0 1px 0 0 #ffc107 !important;
    }

    label {
        color: black !important;
    }


    ul.dropdown-content.select-dropdown li span {
        color: black;
    }
</style>
<title>Registrasi Peserta</title>

<body>
    @if (strtotime(Carbon\Carbon::now()) * 1000 > $data['dateTimeRegistrationEnd'])
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col">
                            <h5 class="center-align">
                                Mohon maaf, pendaftaran untuk event
                                <b>{{ $data['name'] }}</b>
                                telah ditutup
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif (strtotime(Carbon\Carbon::now()) * 1000 < $data['dateTimeRegistrationStart'])
        <div class="container">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <div class="col">
                            <h5 class="center-align">
                                Mohon maaf, pendaftaran untuk event
                                <b>{{ $data['name'] }}</b>
                                belum dibuka
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <table class="center-align">
                                <tbody>
                                    <tr>
                                        <td>Tanggal Pembukaan Pendaftaran: </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', substr($data['dateTimeRegistrationStart'], 0, 10)))->isoFormat(
                                                'dddd, D MMMM Y',
                                            ) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Penutupan Pendaftaran: </td>
                                        <td>
                                            {{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', substr($data['dateTimeRegistrationEnd'], 0, 10)))->isoFormat(
                                                'dddd, D MMMM Y',
                                            ) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src={{ $data['bannerPhoto'] }} />
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col m8 s12">

                            <a href="{{ url('event/' . $data['id']) }}"
                                class="card-title activator grey-text text-darken-4">{{ $data['name'] }}</a>

                            <p class="event-category">
                                {{ $data['eventCategory']['name'] }}
                            </p>
                            <div class="spacer"></div>

                            <form action="{{ url('event/' . $data['id'] . '/confirm/') }}" method="post"
                                enctype="multipart/form-data">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                <input type="hidden" name="eventPaymentCategory"
                                    value="{{ $data['eventPaymentCategory']['id'] }}">
                                <input type="hidden" name="eventId" value="{{ $data['id'] }}">
                                <div class="input-field col s12">
                                    <input id="fullname" type="text" class="validate" name="name" required>
                                    <label for="fullname">Nama Lengkap</label>
                                    @error('name')
                                        <div class="red-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    <input id="email" type="email" class="validate" name="email" required>
                                    <label for="email">Email</label>
                                    @error('email')
                                        <div class="red-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-field col s12">
                                    <input id="phoneNumber" type="tel" class="validate" name="phoneNumber" required>
                                    <label for="phoneNumber">Nomor HP</label>
                                    @error('phoneNumber')
                                        <div class="red-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if ($data['ticket'][0]['quotaPerDay'] > 0)
                                    <div class="input-field col s12">
                                        <select name="eventDate" required>
                                            <option value="" disabled selected>Pilih Tanggal</option>
                                            @foreach ($eventDate['localDates'] as $date)
                                                <option value="<?= $date ?>">{{ $date }}</option>
                                            @endforeach
                                        </select>
                                        @error('eventDate')
                                            <div class="red-text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @endif
                                <div class="input-field col s12">
                                    <select name="ticketId" required>
                                        <option value="" disabled selected>Pilih Tiket</option>
                                        @foreach ($data['ticket'] as $ticket)
                                            @if ($ticket['quotaTotal'] == 0)
                                                <option value="<?= $ticket['id'] . '|' . $ticket['name'] ?>" disabled>
                                                    {{ $ticket['name'] . ' ' . '(Tiket Sudah Habis)' }}
                                                </option>
                                            @else
                                                <option value="<?= $ticket['id'] . '|' . $ticket['name'] ?>">
                                                    {{ $ticket['name'] }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('ticketId')
                                        <div class="red-text">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if ($data['ticket'][0]['price'] > 0)

                                    <div class="input-field col s12">
                                        <select name="paymentId" required>
                                            <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                                            @foreach ($data['eventPayment'] as $payment)
                                                <option value="<?= $payment['id'] . '|' . $payment['type'] ?>">
                                                    {{ $payment['type'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('paymentId')
                                            <div class="red-text">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="file-field input-field col s12">
                                        <div class="file-field input-field">
                                            <div class="btn amber black-text">
                                                <span>Unggah Bukti Pembayaran</span>
                                                <input type="file" name="paymentPhoto" required>
                                            </div>
                                            <div class="file-path-wrapper">
                                                <input class="file-path validate" type="text" required>
                                            </div>
                                            @error('paymentPhoto')
                                                <div class="red-text">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                @endif
                                <div class="input-field col s12">
                                    <!-- <a class="waves-effect waves-light btn modal-trigger" href="#confirmationModal">Daftar</a> -->
                                    <input type="submit" value="Daftar" class="btn col s12 amber black-text">
                                </div>
                            </form>

                            <div id="confirmationModal" class="modal">
                                <div class="modal-content">
                                    <h4>Modal Header</h4>
                                    <p>A bunch of text</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
                                </div>
                            </div>
                        </div>
                        <div class="col m4 s12">
                            @if ($data['eventPayment'] != null)
                                <p class="card-title">Info Pembayaran</p>
                                <table>
                                    @foreach ($data['eventPayment'] as $payment)
                                        <div class="contact-person">
                                            <p>{{ $payment['type'] }}</p>
                                            <p>{{ $payment['information'] }}</p>
                                        </div>
                                    @endforeach
                                    <div class="spacer"></div>
                                </table>
                            @endif
                            <p class="card-title">Organized By</p>
                            {{ $data['eventOrganizer']['organizerName'] }}
                            <div class="spacer"></div>
                            <p class="card-title">Deskripsi Event</p>
                            {{ $data['description'] }}
                            <div class="spacer"></div>
                            <p class="card-title">Tanggal dan Waktu Event</p>
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', substr($data['dateEventStart'], 0, 10)))->isoFormat(
                                                'dddd, D MMMM Y',
                                            ) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse(date('Y-m-d H:i:s', substr($data['timeEventStart'], 0, 10)))->isoFormat('HH:mm') }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="spacer"></div>
                            <p class="card-title event-description-title">
                                Lokasi Event
                            </p>
                            {{ $location }}
                            @if ($data['eventVenueCategory']['id'] == 1)
                                <div style="width: 100%">
                                    <iframe scrolling="no" marginheight="0" marginwidth="0"
                                        src="https://maps.google.com/maps?width=100%&amp;height=200&amp;hl=en&amp;q={{ $location }}, Indonesia (Lokasi)&amp;t=&amp;z=17&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
                                        width="100%" height="200" frameborder="0">
                                    </iframe>
                                </div>
                            @endif
                            <div class="spacer"></div>
                            <p class="card-title">Contact Person</p>
                            <table>
                                @foreach ($data['eventContactPerson'] as $contactPerson)
                                    <div class="contact-person">
                                        <p>{{ $contactPerson['name'] }}</p>
                                        <p>{{ $contactPerson['eventSocialMedia']['name'] }} :
                                            {{ $contactPerson['contact'] }}</p>
                                    </div>
                                @endforeach
                            </table>
                            <div class="spacer"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
        M.AutoInit();
    </script>
</body>

</html>
