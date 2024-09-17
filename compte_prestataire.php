<?php
include("system_appel/config.php");

function motDePasse($longueur = 5)
{ // par défaut, on affiche un mot de passe de 5 caractères
    // chaine de caractères qui sera mis dans le désordre:
    $Chaine = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // 62 caractères au total
    // on mélange la chaine avec la fonction str_shuffle(), propre à PHP
    $Chaine = str_shuffle($Chaine);
    // ensuite on coupe à la longueur voulue avec la fonction substr(), propre à PHP aussi
    $Chaine = substr($Chaine, 0, $longueur);
    // ensuite on retourne notre chaine aléatoire de "longueur" caractères:
    return $Chaine;
}
function envoie_mail($destinataire, $objet, $message)
{

    // Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
    $expediteur = 'e_offre@fai.com';
    $copie = 'adresse@fai.com';
    $copie_cachee = 'marcolloko15@gmail.com';

    $headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
    $headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
    $headers .= 'From: "Nom_de_expediteur"<' . $expediteur . '>' . "\n"; // Expediteur
    $headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire
    $headers .= 'Cc: ' . $copie . "\n"; // Copie Cc
    $headers .= 'Bcc: ' . $copie_cachee . "\n\n"; // Copie cachée Bcc        

    if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
    {
        return true;
    } else // Non envoyé
    {
        return false;
    }
}
$message = '';
if (isset($_POST['id']) && $_POST['id'] == '') {

    $username = $_POST['username'];
    $password = motDePasse();
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $Adresse = $_POST['Adresse'];
    $telephone = $_POST['telephone'];
    $Email = $_POST['Email'];



    if (empty($username) || empty($nom) || empty($prenom) || empty($Adresse) || empty($telephone) || empty($Email)) {
        $message = "Tous les champs sont obligatoires.";
    }

    try {


        $stmt = $pdo->prepare("INSERT INTO utilisateur(username,Email,password,type_utilisateur) values(:username,:Email,:mpassword,2)");
        if ($stmt->execute(['username' => $username, 'Email' => $Email, 'mpassword' => $hash_password])) {


            $last_id = $pdo->lastInsertId();

            $stmt = $pdo->prepare("INSERT INTO prestataire(nom, prenom,Adresse,telephone,Email,id_utilisateur) values(:nom,:prenom,:Adresse,:telephone,:Email,:last_id)");
            if ($stmt->execute(['nom' => $nom, 'prenom' => $prenom, 'Adresse' => $Adresse, 'telephone' => $telephone, 'Email' => $Email, 'last_id' => $last_id])) {


                $objet = "ouverture de compte e_offre";
                $message = "crée avec succès, votre mot de passe est: $password";
                //envoie_mail($Email,$objet,$message);
            }
        } else {
            $message = "Une erreur est survenue lors de la création du compte.";
            exit;
        }
    } catch (Exception $e) {
        $code = $e->getCode();
        if ($code == 23000) {
            $message = "Cet utilisateur existe déjà";
        } else {
            $message = $e->getMessage();
        }
    }
}

// modification 
if (isset($_POST['id']) && $_POST['id'] != '') {

    $username = $_POST['username'];

    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $Adresse = $_POST['Adresse'];
    $telephone = $_POST['telephone'];
    $Email = $_POST['Email'];

    if (empty($username) || empty($nom) || empty($prenom) || empty($Adresse) || empty($telephone) || empty($Email)) {
        $message = "Tous les champs sont obligatoires.";
    }

    try {

        $stmt = $pdo->prepare('UPDATE prestataire SET  NOM= :NOM, Prenom= :prenom,Adresse= :Adresse,telephone= :telephone,Email= :Email WHERE ID=:ID ');
        if ($stmt->execute(['ID' => $id, 'NOM' => $nom, 'prenom' => $prenom, 'Adresse' => $Adresse, 'telephone' => $telephone, 'Email' => $Email])); {

            $message = "modifié avec succès";
            header('Location: liste_prestataire.php');
            //envoie_mail($Email,$objet,$message);
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}


if (isset($_GET['a']) && $_GET['a'] == 'u') {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("select * FROM prestataire where id=:id ");
    $stmt->execute(['id' => $id]);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $prestataire = $stmt->fetch();

    if (isset($prestataire['ID'])) {
        //recupérer le username
        $stmt = $pdo->prepare("select * FROM utilisateur where id=:id_utilisateur ");
        $stmt->execute(['id_utilisateur' => $prestataire['id_utilisateur']]);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $utilisateur = $stmt->fetch();
        //fin de la recupération du username
    }
}
//modification des données 
if (isset($_GET['a']) && $_GET['a'] == 'u') {
    $id = $_GET['id'];
    // $stmt = $pdo->prepare('udpate prestaire set `NOM`='[$nom]',`Prenom`='[value-3]',`Adresse`='[value-4]',`Telephone`='[value-5]',`Email`='[value-6]',`date`='[value-7]'');
}

?>

<!doctype html>
<html lang="fr">

<head>
    <?php if (isset($_GET['a']) && $_GET['a'] == 'u') {
    ?>
        <title>Modifier compte utilisateur</title>
    <?php     } else { ?>
        <title>créer un compte utilisateur</title>
    <?php } ?>
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
</head>

<body class="">
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
                                       <strong> <h3 class="fw-light my-4"><B>Modifier compte prestataire</B></h3></strong>
                                    <?php     } else { ?>
                                        <h3 class="fw-light my-4"><B>Créer un compte prestataire</B></h3>
                                    <?php } ?>
                                    <a href="accueil.php" class="close-button"><i class="fas fa-arrow-right"></i></a>
                                </div>
                                <div class="card-body">
                                    <?php if (!empty($message)): ?>
                                        <p style="color:red"><?= $message ?></p>
                                    <?php endif; ?>


                                    <form action="compte_prestataire.php" method="POST">
                                        <div class="row gx-3">
                                            <input type="hidden" name="id" value="<?php echo isset($prestataire) ? $prestataire['ID'] : '' ?>">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="small mb-1" for="inputusername">nom d'utilisateur *:</label>
                                                    <input class="form-control" value="<?php echo isset($utilisateur) ? $utilisateur['username'] : '' ?>" id="username" type="text" name="username"
                                                        placeholder="Entrer un nom" required>
                                                </div>
                                            </div>


                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputnom">nom *:</label>
                                                <input class="form-control" value="<?php echo isset($prestataire) ? $prestataire['NOM'] : '' ?>" id="inputnom" type="nom" name="nom"
                                                    aria-describedby="nomHelp" placeholder="Entrer un nom" required>

                                            </div>

                                            <div class="row gx-3">
                                                <div class="col-md-6">

                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPrenom">prenom *:</label>
                                                        <input class="form-control" value="<?php echo isset($prestataire) ? $prestataire['Prenom'] : '' ?>" id="inputPrenom" type="prenom" name="prenom"
                                                            placeholder="Entrer un prenom" required>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="mb-3">
                                                        <label for="Adresse">Adresse *:</label>
                                                        <input class="form-control" value="<?php echo isset($prestataire) ? $prestataire['Adresse'] : '' ?>" type="Adresse" id="Adresse" name="Adresse"
                                                            placeholder="Entrer une Adresse" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="telephone">Telephone *:</label>
                                                        <input class="form-control" value="<?php echo isset($prestataire) ? $prestataire['Telephone'] : '' ?>" type="telephone" id="telephone"
                                                            name="telephone" placeholder="Entrer un numéro de telephone"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="telephone">Email *:</label>
                                                        <input class="form-control" value="<?php echo isset($prestataire) ? $prestataire['Email'] : '' ?>" type="Email" id="Email" name="Email"
                                                            placeholder="Entrer un mail" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <input class="btn btn-success float-end" type="submit" value="enregistrer">
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