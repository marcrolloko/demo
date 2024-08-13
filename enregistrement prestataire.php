
<?php

include("system_appel/config.php");

$message = '';

if (isset($_POST['nom']) && isset($_POST['prenom'])  && isset($_POST['Adresse'])&& isset($_POST['telephone']) && isset($_POST['Email']) ) {
    $username = $_POST['username'];
  
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $Adresse = $_POST['Adresse'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
  

    $sql = "INSERT INTO prestataire (nom,prenom,Adresse,telephone,Email) VALUES (:nom, :prenom,:Adresse,:telephone,:Eamil)";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute(['nom' => $nom,'prenom' => $prenom,'Adresse' => $Adresse,'telephone' => $telephone,'Email' => $Email,  ]);

    if ($result) {
        $message = 'Inscription réussie!';
        header('Location: login.php');
    } else {
        $message = 'Erreur lors de l\'inscription.';
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
  <title>enregistrer prestataire</title>
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
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">s'enregistrer </h3></div>
                                    <div class="card-body">
                                        
                                        <form>
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                  
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputFirstName">nom</label>
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Entrer un nom">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                               
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputLastName">prenom</label>
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Entrer un prenom">
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Entrer un addresse mail">
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                              </div>
                                      
                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                   
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputAdresse">Adresse </label>
                                                        <input class="form-control" id="inputAdresse" type="Adresse" placeholder="Entrer une Adresse">
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                      </div>
                                                </div>
                                                <div class="col-md-6">
                                             
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputnumber">téléphone</label>
                                                        <input class="form-control" id="inputnumber" type="number" placeholder="entrer un numéro de téléphone">
                                                        <div class="invalid-feedback">Please fill out this field.</div>
                                                      </div>
                                                </div>
                                            </div>
                                   
                                            <a class="btn btn-success btn-block" href="auth-login-basic.html">enregistrer</a>
                                            <a class="btn btn-success float-end" href="index.php" class="previous"> quitter</a>

                                        </form>
                                    </div>
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