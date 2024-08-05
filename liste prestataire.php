<!doctype html>
<html lang="fr">
<head>
  <title>page formulaire prestataire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
</style>
</head>
<body class="bg-secondary">
<header class="container-fluid  text-white p-3">
            <div class="container float-start  mt-3">
                
<img  src="images/logo.cnps2.jpeg" class="rounded" alt="" width="100" height="100">
</div>
<div class="container-center mt-3">
<a class="btn btn-success btn-block"   href="enregistrement prestataire.php">ajouter</a>
</div>
<form class="float-end" action="/liste prestataire.php">
<input type="text" placeholder="recherche" name="recherche">
<button class="btn bg-primary text-white">recherche</button>
</form>
 </div>
 </div>
 </header>
<div class="container-center mt-3">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">téléphone</th>
                    <th scope="col">Email</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody class="clearfix">
                <tr>
              <th  scope="row" class="text-center">1</th>
                    <td>olloko</td>
                    <td>marc-roland n'douba</td>
                    <td>yopougon niangon villa 527</td>
                    <td>769291720</td>
                    <td>marcolloko@gmail.com</td>
                    <td> <button class="btn bg-success text-white"><i class="fa fa-trash">supprimer</i></button></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">2</th>
                    <td>olloko</td>
                    <td>emmanuel aimée</td>
                    <td>cocody angre star8</td>
                    <td>540503820</td>
                    <td>emmanuelolloko@gmail.com</td>
                    <td> <button class="btn bg-success text-white"><i class="fa fa-trash">supprimer</i></button></td>
                </tr>
                <tr>
                    <th scope="row" class="text-center">3</th>
                    <td>kouame</td>
                    <td>franck ciriac</td>
                    <td>plateau sud</td>
                    <td>100044466</td>
                    <td>ciriac@cnps.ci</td>
                    <td> <button class="btn bg-success text-white"><i class="fa fa-trash">supprimer</i></button></td>
                </tr>
            </tbody>
        </table>
        
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 
