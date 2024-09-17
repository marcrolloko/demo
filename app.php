<?php
session_start();

if (!isset($_SESSION['user_ID'])) {
    header('Location: accueil.php');

}

?>
<!doctype html>
<html lang="fr">

<head>
    <title>acceuil</title>
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

        .text-orange {
            color: orange;
        }
    </style>
</head>

<body>

<?php include('briques/header.php');?>
    <div class="container-fluid">
        <div class="row full-height">
        <?php include('briques/menu.php');?>
            <div class="col-md-10 bg-secondary text-white d-flex  justify-content-center">
               
            </div>
        </div>
    </div>
    <?php include('briques/footer.php');?>
</body>

</html>