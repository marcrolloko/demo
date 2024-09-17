<?php
include("system_appel/config.php");
$stmt = $pdo->prepare("SELECT appel_offre.ID,titre,description,date_limite,libelle_AP,fichier from appel_offre join type_ap on appel_offre.ID_type_ap=type_ap.ID ");
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$appel_offres = $stmt->fetchAll();


//suppression offre 
$message = "";
if (isset($_GET['a']) && $_GET['a'] == 'd') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM appel_offre WHERE ID = $id");
    $stmt->execute();
    $message = 'suppression effectuée';
}

?>
<!doctype html>
<html lang="fr">

<head>
    <title>liste des offres</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            max-width: 150px;
            /* Limite la largeur de la cellule */
            word-wrap: break-word;
            /* Casse les mots trop longs */
            overflow: hidden;
            /* Cache le texte qui dépasse la limite */
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>

<body>
    <?php include('briques/header.php'); ?>
    <?php if (!empty($message)): ?>
        <p style="color:red"><?= $message ?></p>
    <?php endif; ?>
    <div class="container-fluid">
        <di class="row full-height">
            <?php include('briques/menu.php'); ?>
            <div class="col-md-10 bg-white text-white d-flex  justify-content-center">
                <table class="table  table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">Numéro</th>
                            <th scope="col">titre</th>
                            <th scope="col">description</th>
                            <th scope="col">date limite </th>
                            <th scope="col">type d'offre</th>
                            <th scope="col">fichier</th>
                            <th scope="col">action</th>

                        </tr>
                    </thead>
                    <tbody class="clearfix">
                        <?php

                        $i = 0;
                        foreach ($appel_offres as $row) {
                            $i = $i + 1;
                        ?>
                            <tr>
                                <th scope="row" class="text-center"><?php echo $i; ?></th>
                                <td> <?php echo $row["titre"]; ?></td>
                                <td><?php echo $row["description"]; ?></td>
                                <td><?php echo $row["date_limite"]; ?></td>
                                <td><?php echo $row["libelle_AP"]; ?></td>
                                <td><a href="offre/<?php echo $row['fichier'] ?>" target="_blank"><?php echo $row["fichier"]; ?></a></td>
                                <td> <a href="?a=d&id=<?php echo $row["ID"]; ?>" disabled id="deleteButton" class="btn bg-success text-white" name="supprimer"><i class="fa fa-trash"></i></a>
                                    <a href="creation_offre.php?a=u&id=<?php echo $row["ID"]; ?>" class="btn bg-success text-white" type="submit" name="modifier">
                                        <i class="fas fa-pen"></i></a>
                                </td>
                            </tr>
                        <?php }   ?>
                    </tbody>
                </table>
            </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>