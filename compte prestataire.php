<?php
include("system_appel/config.php");

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hacher le mot de passe
    $Email = $_POST['Email'];

    $sql = "INSERT INTO utilisateur (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $password, $Email);

    if ($stmt->execute()) {
        echo "Inscription réussie";
    } else {echo "Erreur : " . $sql . "<br>" . $conn->error;
    }

  
}


?>

<!doctype.html>
<html lang="fr">
<head>
  <title>page formulaire prestataire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
  <body class="d-flex justify-content-center align-items-start vh-100">
  <div class="container-fluid p-3 bg-secondary text-white text-start">
<div class="container-fluid">
<div class="row justify-content-start">
  <div class="mb-3 mt-3">
  <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Créer un compte prestataire</h3></div>
                                    <div class="card-body">
                                        
                                        <form class=" float-start">

                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                  
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputusername">nom d'utilisateur</label>
                                                        <input class="form-control" id="username" type="text" placeholder="Entrer un nom">
                                                    </div>
                                                </div>
        
                                        
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmail">Email</label>
                                                <input class="form-control" id="inputEmail" type="email" aria-describedby="emailHelp" placeholder="Entrer un addresse mail">
                                                <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                                              </div>
                                      
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                   
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPassword">mot de passe </label>
                                                        <input class="form-control" id="inputPassword" type="password" placeholder="Entrer mot de passe">
                                                        <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                             
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirme mot de passe </label>
                                                        <input class="form-control" id="inputConfirmPassword" type="password" placeholder="Confirme mot de passe">
                                                        <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                                                      </div>
                                                </div>
                                            </div>
                                            </div>
                                            <button class="btn btn-primary" type="button">enregistrer</button>
                                           <a class="btn btn-primary float-end" href="acceuil.php">quitter</a>
                                        </form>
                                  
                                    <div class="card-footer text-center">
    </div>
    </div>
    </div>

  </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>