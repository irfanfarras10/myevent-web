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
                height: 100%;
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
                padding-bottom: 10px;
            }
            .btn {
                width: 100%;
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
                    <img
                        class="activator"
                        src="https://myevent-android-api.herokuapp.com/api/events/image/5ddbcee3-9903-4f1d-9c35-cd1285afdd0f_3Jul2022105409GMT_1656845649035"
                    />
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col s12">
                            <span
                                class="card-title activator grey-text text-darken-4"
                                >Webinar Data Analytics
                            </span>
                            <p class="event-category">Webinar</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s8">
                            <p class="card-title event-description-title">
                                Deskripsi Event
                            </p>
                            <p class="event-description">
                                I am a very simple card. I am good at containing
                                small bits of information. I am convenient
                                because I require little markup to use
                                effectively.
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
