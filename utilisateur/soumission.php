<?php
include("system_appel/config.php");
$message="";

?>
<!doctype html>
<html lang="fr">

<head>
    <title>soumission</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Lien vers Font Awesome -->

<style>
     .close-button {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .close-button:hover {
            color: red;
        }
</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row full-height">
            <div class="col-md-10 bg-white text-white d-flex  justify-content-center">
                <div class="container-fluid">
                    <div class="row justify-content-start">
                        <div class="mb-3 mt-3">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h1>entrez vos coordonnées pour le paiement </h1>
                                    <a href="offre.php" class="close-button"><i class="fas fa-arrow-right"></i></a>
                                </div>

                                <div class="card-body">
                                    <form action="soumission.php" method="POST" enctype="multipart/form-data">
                                        <div class="row gx-3">
                                            <div class="col-md-6">
                                                <div class="mb-5">

                                                    <label for="card_name">Nom sur la carte:*</label>
                                                    <input class="form-control" type="text" id="card_name" name="card_name" required>

                                                    <label for="card_number">Numéro de carte :</label>
                                                    <input class="form-control" type="text" id="card_number" name="card_number" required>

                                                    <label for="expiration_date">Date d'expiration :</label>
                                                    <input class="form-control" type="text" id="expiration_date" name="expiration_date" placeholder="MM/AA" required>

                                                    <label class="form-control" for="cvv">CVV :</label>
                                                    <input class="form-control" type="text" id="cvv" name="cvv" required>

                                                    <label for="card_number">montant :</label>
                                                    <input class="form-control" type="text" id="montant" name="montant" required>

                                                    <label for="file_upload">Télécharger un fichier (dossier prestataire) :</label>
                                                    <input  value="<?php echo isset($appel_offre['fichier']) ? $appel_offre['fichier'] : '' ?>"  type="file" id="fichier" name="fichier" accept=".pdf" required>

                                                    <input class="btn btn-success" type="submit" value="payer">
                                    </form>
                                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
                                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta2/js/bootstrap.min.js"></script>
</body>
</html>