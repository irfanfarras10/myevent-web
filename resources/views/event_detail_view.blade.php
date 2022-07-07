<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link
            href="https://fonts.googleapis.com/icon?family=Material+Icons"
            rel="stylesheet"
        />
        <!--Import materialize.css-->
        <!-- Compiled and minified CSS -->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"
        />

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap"
            rel="stylesheet"
        />

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
            .event-description-title {
                padding-top: 10px;
            }
            .event-description {
                padding-bottom: 50px;
            }
            .event-date {
                padding-bottom: 50px;
            }
            #button {
                color: black;
            }
        </style>
    </head>

    <title>Detail Event</title>

    <body>
        <div class="container">
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src={{ $data["bannerPhoto"] }}
                    />
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col m12 s12">
                            <span
                                class="card-title activator grey-text text-darken-4"
                                >{{ $data["name"] }}
                            </span>
                            <p class="event-category">
                                {{ $data["eventCategory"]["name"] }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col m8 s12">
                            <p class="card-title event-description-title">
                                Deskripsi Event
                            </p>
                            <p class="event-description">
                                {{ $data["description"] }}
                            </p>
                            <p class="card-title">Tanggal dan Waktu Event</p>
                            <p class="event-date">
                                {{
                                    \Carbon\Carbon::parse(date("Y-m-d H:i:s", substr($data["dateEventStart"], 0, 10)))->isoFormat('dddd, D MMMM Y')
                                }}
                            </p>
                        </div>
                        <div class="col s4">
                            <a
                                class="waves-effect waves-light btn amber"
                                id="button"
                                >Daftarkan Diri</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>
