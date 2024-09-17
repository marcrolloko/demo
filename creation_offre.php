<?php
include("system_appel/config.php");
$message = '';
if (isset($_POST['id']) && $_POST['id'] == '') {
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_limite = $_POST['date_limite'];
    $ID_type_ap = $_POST['libelle_AP'];
    $fichier=$_FILES['fichier']['name'];

    $dossier = 'offre/';
    $fichier = basename($_FILES['fichier']['name']);
   
    try {

        $stmt = $pdo->prepare(query: 'INSERT INTO appel_offre (titre,description,date_limite,ID_type_ap,fichier) values(:titre,:description,:date_limite ,:libelle_AP,:fichier)');
        if ($stmt->execute(params: ['titre' => $titre, 'description' => $description, 'date_limite' => $date_limite, 'libelle_AP' => $ID_type_ap, 'fichier' => $fichier])) {
            $message = "appel offre crée avec succès";
            if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                 $message='effectué avec succès !';
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                 $message= 'Echec de l\'upload !';
            }
        
        } else {
            $message = 'erreur de création';
            exit;
        }
    } catch (Exception $e) {
        $code = $e->getCode();
        if ($code == 23000) {
            $message = "Cet offre est deja crée";
        } else {
            $message = $e->getMessage();
        }
    }
}

//modification offre 
if (isset($_POST['id']) && $_POST['id'] != '') {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $date_limite = $_POST['date_limite'];
    $ID_type_ap = $_POST['libelle_AP'];
    $fichier=$_FILES['fichier']['name'];
    try {
        $stmt = $pdo->prepare(query: 'UPDATE appel_offre SET  titre=:titre,description=:description,date_limite=:date_limite,ID_type_ap=:libelle_AP,fichier=:fichier where ID=:ID');
        if ($stmt->execute(params: ['ID' => $id, 'titre' => $titre, 'description' => $description, 'date_limite' => $date_limite,'libelle_AP' => $ID_type_ap,'fichier' => $fichier])) {
            $message = 'offre modifié avec succès';
            header(header: 'Location: liste_offre.php');
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}


if (isset($_GET['a']) && $_GET['a'] == 'u') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare(query: 'select * FROM appel_offre where id=:id');
    $stmt->execute(params: ['id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $appel_offre = $stmt->fetch();
}

$stmt = $pdo->prepare(query: 'select*from type_ap');
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$type_aps = $stmt->fetchAll();


if (isset($_GET['a']) && $_GET['a'] == 'u') {
    $id = $_GET['id'];
}
?>

<!doctype html>
<html lang="fr">

<head>
    <title>créer offre</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
    <style>
        textarea {
            width: 100%;
            height: 200px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }
      
    </style>
</head>

<body>
            <div class="container-fluid">
                <div class="row full-height">
                    <?php include('briques/menu1.php'); ?>
                    <div class="col-md-10 bg-white text-white d-flex  justify-content-center">
                        <div class="container-fluid">
                            <div class="row justify-content-start">
                                <div class="mb-3 mt-3">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header justify-content-center">
                                            <?php if (isset($_GET['a']) && $_GET['a'] == 'u') {

                                            ?>
                                                <h3 class="fw-light my-4"><B>Modifier offre</B></h3>
                                            <?php     } else { ?>
                                                <h3 class="fw-light my-4"><B>Créer une offre</B></h3>
                                            <?php } ?>
                                            <a href="accueil.php" class="close-button"><i class="fas fa-arrow-right"></i></a>
                                        </div>
                                        <div class="card-body">
                                            <?php if (!empty($message)): ?>
                                                <p style="color:red"><?= $message ?></p>
                                            <?php endif; ?>
                                            <form action="creation_offre.php" method="POST" enctype="multipart/form-data">
                                                <div class="row gx-3">
                                                    <input type="hidden" name="id" value="<?php echo isset($appel_offre['ID']) ? $appel_offre['ID'] : '' ?>">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label class="small mb-1" for="nom">titre *:</label>
                                                            <input class="form-control" value="<?php echo isset($appel_offre['titre']) ? $appel_offre['titre'] : '' ?>" id="inputtitre" type="text" name="titre"
                                                                aria-describedby="titreHelp" required>
                                                        </div>
                                                    </div>
                                                    <div class="row gx-3">
                                                        <div class="col-md-6">
                                                            <div class="mb-5">
                                                                <label class="small mb-1" for="inputdescription">description *:</label>
                                                                <textarea class="form-control" placeholder="Entrez une description détaillée..." id="inputdescription" type="text" name="description"
                                                                    required> <?php echo isset($appel_offre['description']) ? $appel_offre['description'] : '' ?> </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="date">date limite*:</label>
                                                                <input class="form-control" value="<?php echo isset($appel_offre['date_limite']) ? $appel_offre['date_limite'] : '' ?>" type="date" id="date_limite"
                                                                    name="date_limite"
                                                                    required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">type offre*</label>
                                                                <select class="form-control" name="libelle_AP" id="libelle_AP">
                                                                    <option value="">selectionner une option</option>
                                                                    <?php
                                                                    $valeur = '';
                                                                    foreach ($type_aps as $type_ap) {
                                                                        if (isset($appel_offre['ID_type_ap']) && $appel_offre['ID_type_ap'] == $type_ap['ID']) {
                                                                            $valeur = 'selected';
                                                                        } else {
                                                                            $valeur = '';
                                                                        }
                                                                        echo '<option value="' . $type_ap['ID'] . '" ' . $valeur . '>' . $type_ap['libelle_AP'] . '</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                                <div class="col-md-6">
                                                                <div class="mb-3"> <?php echo "<a href='offre/<?php echo $row['fichier'] ?>" target="_blank"><?php echo $row["fichier"]; ?></a>"?> 
                                                                <label for="file_upload">Télécharger un fichier (offre) :</label>
                                                                <input   value="<?php echo isset($appel_offre['fichier']) ? $appel_offre['fichier'] : '' ?>" name="fichier"  type="file" id="fichier" accept=".pdf"   required>
                                                                
                                                            
                                                            </div>
                                                        </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input class="btn btn-success float-end" type="submit" value="soumettre">
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