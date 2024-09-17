<?php
session_start();

if (!isset($_SESSION['user_ID'])) {
    header('Location: accueil.php');
}

?>
<!doctype html>
<html lang="fr">

<head>
    <title>espace gestionnaire</title>
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
            <img src="images/logo.cnps2.jpeg" class="rounded" alt="cnps.ci" width="80" height="80">
            <h1 class="text-white"><B>E-offre</B></h1>
        </div>
    </header>
    <style>
        .full-height {
            height: 100vh;
        }
    </style>
    <div class="container-fluid">
        <div class="row full-height">
            <div class="col-md-2 bg-secondary text-white">
            <div class="container ">
                    <nav>
                        <div class="menu">
                            <a class="nav-link" href="login.html">


                                <span>tableau de bord</span></a>
                            <div class="dropdown">

                                <button type="button" class="btn btn-orange dropdown-toggle" data-bs-toggle="dropdown">
                                    prestataire
                                </button>
                                <div class="dropdown-menu">
                                    <a href="compte_prestataire.php" class="dropdown-item text-orange">créer compte prestataire</a>
                                    <a class="dropdown-item text-orange" href="liste_prestataire.php">liste des prestataires</a></li>

                                </div>

                                <button type="button" class="btn btn-orange dropdown-toggle" data-bs-toggle="dropdown">
                                    offre
                                </button>
                                <div class="dropdown-menu">
                                    <a href="creation_offre.php" class="dropdown-item">créer une offre</a>
                                    <a class="dropdown-item" href="liste_offre.php">liste des offres</a></li>
                                </div>
                                <div>
                                <p><a class="dropdown-item" class="text-white" href="#notifications">Notifications</a></p>
                                    <p><a  class="dropdown-item" href="" class="text-white">soumissionnaire</></p>
                                    <p><a class="dropdown-item" href="securite.php" class="text-white">sécurité</a></p>
                                    <p><a class="dropdown-item" href="deconnexion.php" class="text-white">deconnexion</a></p>
                                    </svg></i-feather>
                                    </button>
                                </div>

                    </nav>
                </div>
            </div>
            <div class="col-md-10 bg-white text-white d-flex align-items-center justify-content-center">
                <p></p>
            </div>
        </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
</body>

</html>