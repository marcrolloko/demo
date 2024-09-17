
<?php

include("system_appel/config.php");


if (isset($_POST['Email']) && isset($_POST['password'])) {

    $Email = $_POST['Email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateur WHERE Email = :Email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['Email' => $Email]);
    $stmt->bindParam(':Email', $Email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC,);
    

        if (isset($user) && $password==$user['password']) {

            session_start();
            $_SESSION['user_ID'] = $user['ID'];

            //var_dump("je suis icic");exit;

            header('Location: accueil.php');

        }else {
            echo 'Email ou mot de passe incorrect.';
        }
}
?>

<!doctype html>
<html lang="fr">
<head>
  <title>connexion </title>
  <meta charset="utf-8">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
  <body class="bg-secondary d-flex justify-content-center align-items-center vh-100">
  <div class="container mt-5">
  <div class="row justify-content-center">
  <div class="mb-3 mt-3">
    <img src="images/logo.cnps2.jpeg" class="img-thumbnail" alt="" width="200" height="200">
  </div>
  <div class="row justify-content-center">
  <div class="mb-3 mt-3">
  <div class="container-fluid p-8  text-warring text-center">
  
  <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                            
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">se connecter</h3></div>
                                    <div class="card-body">
                                    
                                    <form method="POST" action="login.php">
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmail">Email</label>
                                                <input class="form-control"   id="Email" name="Email" type="Email" placeholder="Enter email address" required>
                                            </div>
                                          
                                            <div class="mb-3">
                                            <label class="small mb-1" for="inputpassword">mot de passe </label>
                                            <input class="form-control"   id="password" name="password" type="password" placeholder="Enter mot de passe" required>
                                            </div>
                               
                                            <div class="mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="">
                                                    <label class="form-check-label" for="rememberPasswordCheck">souviens toi de moi</label>
                                                </div>
                                            </div>
                                       
                                            <div class="btn-end">
                                            
                                            <input  type="submit"  class="btn btn-success" float-end value="connexion">
                                           
                                            </div>
                                           
                                        </form>
                                    </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Droits d'auteur © Votre site Web 2025</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
</Form>
</body>
</html>