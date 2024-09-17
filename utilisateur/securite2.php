<!doctype html>
<html lang="fr">

<head>
    <title>page de connexion </title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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


<body class="bg-secondary">
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                <div class="container-xl px-4">
                    <div class="page-header-content">
                        <div class="row align-items-center justify-content-between pt-3">
                            <div class="col-auto mb-3">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg></div>
                                    Paramètres du compte - Sécurité
                                </h1>
                                <a href="accueil2.php" class="close-button"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container-xl px-4 mt-4 text-white">

                <nav class="nav nav-borders">
                    <a class="nav-link ms-0 text-white" href="account-profile.html">Profil</a>
                    <a href="securite.php" class="nav-link active text-white">Sécurité</a>
                    <a class="nav-link text-white" href="account-notifications.html">Notifications</a>
                </nav>
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-lg-8">

                        <div class="card mb-4">
                            <div class="card-header">Changer votre mot de passe</div>
                            <div class="card-body float-center">
                                <form>
                                    <div class="mb-3">
                                        <label class="small mb-1" for="currentPassword">Mot de passe actuel</label>
                                        <input class="form-control" id="currentPassword" type="password" placeholder="Enter current password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="newPassword">nouveau mot de passe </label>
                                        <input class="form-control" id="newPassword" type="password" placeholder="Enter new password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="small mb-1" for="confirmPassword">confirmer le mot de passe </label>
                                        <input class="form-control" id="confirmPassword" type="password" placeholder="Confirm new password">
                                    </div>
                                    <button class="btn btn-primary" type="button">Sauvegarder</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="col-lg-4">
        <!-- Two factor authentication card-->
        <div class="card  mb-4">
            <div class="card-header">Authentification à deux facteurs</div>
            <div class="card-body">
                <p>Ajoutez un autre niveau de sécurité à votre compte en activant l'authentification à deux facteurs. Nous vous enverrons un message texte pour vérifier vos tentatives de connexion sur des appareils et navigateurs non reconnus.</p>
                <form>
                    <div class="form-check">
                        <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="">
                        <label class="form-check-label" for="twoFactorOn">On</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor">
                        <label class="form-check-label" for="twoFactorOff">Off</label>
                    </div>
                    <div class="mt-3">
                        <label class="small mb-1" for="twoFactorSMS">numero sms</label>
                        <input class="form-contr" id="twoFactorSMS" type="tel" placeholder="Enter a phone number" value="555-123-4567">
                    </div>
                </form>
            </div>
        </div>
        <!-- Delete account card-->
        <div class="card mb-4">
            <div class="card-header">supprimer le compte</div>
            <div class="card-body">
                <p>La suppression de votre compte est une action permanente et irréversible. Si vous êtes sûr de vouloir supprimer votre compte, sélectionnez le bouton ci-dessous.</p>
                <button class="btn btn-danger-soft text-danger" type="button">supprimer mon compte</button>
            </div>
        </div>
    </div>
    </div>
    </div>
    </main>
    <footer class="footer-admin mt-auto footer-light">
        <div class="container-xl px-4">
            <div class="row">
                <div class="col-md-6 small"></div>
                <div class="col-md-6 text-md-end small">
                    <a href="#!"></a>
                    ·
                    <a href="#!"></a>
                </div>
            </div>
        </div>
    </footer>
    </div>
</body>
</html>