<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classic Restaurant</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Background div */
        .background {
            background: url("/image/Banner1.jpg") no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            position: relative;
            overflow: hidden;
            height: 100vh;
        }

        /* Overlay div */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7); /* Darken the background */
        }

        header {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            text-align: center;
            color: #fff;
            position: relative;
            z-index: 1; /* Ensure the header is above the overlay */
        }

        section {
            text-align: center;
            position: relative;
            z-index: 1; /* Ensure the content is above the overlay */
            padding: 50px;
        }

        h2 {
            font-size: 3em;
            margin-bottom: 20px;
            color: #f8f9fa; /* Light color for the heading */
        }

        p {
            font-size: 1.5em;
            margin-bottom: 30px;
            color: #ced4da; /* Light color for the text */
        }

        .btn-primary {
            background-color: #343a40;
            color: #fff;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.5em;
        }

        .btn-signin {
            background-color: #f8f9fa;
            color: #343a40;
            border-radius: 5px;
            font-weight: bold;
            padding: 15px 30px;
            font-size: 1.5em;
            margin-top: 20px;
        }

        .btn-signin:hover {
            background-color: #343a40;
            color: #f8f9fa;
        }

        footer {
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            padding: 10px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 1; /* Ensure the footer is above the overlay */
        }
    </style>
</head>

<body>
    <div class="background">
        <div class="overlay">

        </div>

        <section class="container">
            <div class="row">
                <div class="col-md-12 pt-3">
                    <h2><span style="color: #ffc107; font-weight: 700;">Classic</span> Restaurant</h2>
                    <p>Indulge in the <span style="font-weight: 700;">exceptional flavors</span> and
                        <span style="color: #ffc107; font-weight: 700;">elegant ambiance </span> and the harmony </p>
                    <p> of our <span style="color: #ffc107; font-weight: 700;"> Classic</span> restaurant <a href="/index" class="btn btn-light" style="color: #ffc107; font-weight: 700">Explore More</a> of our exceptional cuisine</p>
                </div>
            </div>
        </section>

        <footer>
            &copy; 2023 Classic Restaurant
        </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-U6z4eU4IHlB8a7Q1OISZf5YBfQjZUCdA3/A6M5Pm8nPt7XVRb5+SBgBEx5XjqjIl"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
