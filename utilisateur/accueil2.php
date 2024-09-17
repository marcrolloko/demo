<?php
session_start();

if (!isset($_SESSION['user_ID'])) {
    header( 'Location:accueil2.php');
}

?>
<!doctype html>
<html lang="fr">

<head>
    <title>espace prestataire</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <style>
        .bg-orange {
            background-color: orange;
        }
    
        .btn-orange {
            background-color: orange;
        }

        .text-orange {
            color: orange;
        }
    </style>
</head>

<body>

    <header class="container-fluid bg-orange text-white p-2">
        <div class="container  mt-3">
            <img src="images/logo.cnps2.jpeg" class="rounded" alt="" width="80" height="80">
            <h1 class="text-white"><B>E-offre</B></h1>
        </div>
    </header>
    <style>
        .full-height {
            height: 100vh;
        }

        .container {
            display: inline-block;
            cursor: pointer;
        }

        .bar1,
        .bar2,
        .bar3 {
            width: 35px;
            height: 5px;
            background-color: white;
            margin: 6px 0;
            transition: 0.4s;
        }

        .change .bar1 {
            transform: translate(0, 11px) rotate(-45deg);
        }

        .change .bar2 {
            opacity: 0;
        }

        .change .bar3 {
            transform: translate(0, -11px) rotate(45deg);
        }
    </style>
    <div class="container-fluid">
        <div class="row full-height">
            <div class="col-md-2 bg-secondary text-white">
                <div class="container">
                            <p><a class="dropdown-item"  href="#">notifcations</a></p>
                            <p><a class="dropdown-item"  href="offre.php">offre</a></p>
                            <p><a class="dropdown-item"  href="securite2.php">securité</a></p>
                            <p><a class="dropdown-item"  href="deconnexion2.php">deconnexion</a></p>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
</body>

</html>