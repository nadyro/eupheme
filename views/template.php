<!DOCTYPE html>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/myproject/" . "models/Headersentence.class.php";
require $_SERVER['DOCUMENT_ROOT'] . "/myproject/" . "Mobile_Detect/Mobile_Detect.php";
$detect = new Mobile_Detect;
global $global_url_src;
$global_url_src = "http://" . $_SERVER["HTTP_HOST"] . "/myproject";
$header_sentence_text = getHeaderSentence();
$user_infos = getInfos_User_Courant($_COOKIE['cookie_users']);
foreach ($user_infos as $key => $value) {
    $image = $value['image_profile'];
}
$explode_request_uri = explode("/", $_SERVER['REQUEST_URI']);
?>
<html lang="fr">
    <head>
        <link rel="shortcut icon" href="<?php echo $global_url_src ?>/images/logo_eupheme.ico" />
        <meta charset="UTF-8">
        <title>Euphème</title>
        <meta name="description" content="Et l'enchanteur, maître des mots et des fleurs, naquit. Enfant sage au milieu des tumultes.">
        <?php if (!$detect->isMobile() && !$detect->isTablet()) { ?>
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/style_template.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/index_index.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/user_profile.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/suggestions.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/livres.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/connexion_inscription_header.css" />
            <link rel="stylesheet" href="<?php echo $global_url_src ?>/styles/range.css" />
        <?php } ?>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/header_text.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/connexion_inscription_header.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/userprofile.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/suggestions.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/livres.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/functions.js"></script>
        <script type="text/javascript" src="<?php echo $global_url_src ?>/scripts/index.js"></script>
        <!--<link href="https://fonts.googleapis.com/css?family=Yatra+One" rel="stylesheet">-->
        <!--<link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">-->

    </head>
    <body>
        <header class="header_template" <?php if ($explode_request_uri[2] == "userprofile") { ?>  <?php } ?>>
            <!--style="background: url(<?php //echo $global_url_src    ?>/images/leslivres.jpg)"-->
            <h1><a href="<?php echo $global_url_src; ?>">Euphème</a></h1>
            <div class="header_buttons">
                <?php if (empty($_SESSION)) { ?>
                    <div class="connexion_header">
                        <p>Connexion</p>
                    </div>
                <?php } ?>
                <?php if (empty($_SESSION)) { ?>
                    <div class="inscription_header">
                        <p>Inscription</p>
                    </div>
                <?php } ?>
                <?php if (!empty($_SESSION)) { ?>
                    <div class="notification">
                        <p>N<span class="nb_notification"></span></p>
                    </div>
                    <div class="notification_close">
                        <p>N<span class="nb_notification"></span></p>
                    </div>
                    <div class="deconnexion_header">
                        <p>Déconnexion</p>
                    </div>
                    <a href="<?php echo $global_url_src . "/userprofile"; ?>">
                        <div class="user_header">
                            <div class="img_pp_template">
                                <?php if (!empty($image)) { ?>
                                    <img src="<?php echo $global_url_src ?>/images/user_images/profile_pictures/<?php echo $image ?>">
                                <?php } ?>
                            </div>
                            <p> <?php echo $_SESSION['user']['prenom_user'] . " " . $_SESSION['user']['nom_user'] ?> </p>
                        </div>
                    </a>
                <?php } ?>
                <div class="renseigner_header_sentence">
                    <p>New Sentence</p>
                </div>
            </div>
            <div class="les_notifications">
                <div class="une_notif"> 
                </div>
            </div>

            <div class="header_text"></div>
            <?php foreach ($header_sentence_text as $key => $value) { ?>
                <input type="hidden" value="<?php echo $value['text'] ?>" class="header_text_all header_text_<?php echo $key ?>">
            <?php } ?>

            <div class="all_panels">
                <!--Connexion-->
                <div class="connexion_header_panel">
                    <p class="mdp_incorrect">
                        Mot de passe incorrect
                    </p>
                    <p class="connexion_header_panel_text_title">
                        Email
                    </p>
                    <input type="text" placeholder="Email" class="email_connexion_header">
                    <p class="connexion_header_panel_text_title">
                        Mot de passe
                    </p>
                    <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription connexion_header_panel_erreur_password">
                    <input type="password" placeholder="Mot de passe" class="password_connexion_header">
                    <button class="submit_connexion_header">Connexion</button>
                    <button class="cancel_connexion_header">Annuler</button>
                </div>
                <!--Email inexistant-->
                <div class="email_inexistant_message">
                    <p>
                        Email inexistant.<br> Pourquoi ne vous inscrivez-vous pas ? :)
                    </p>
                    <button class="cacher_email_inexistant_message">Fermer</button>
                </div>
                <!--Inscription-->
                <div class="inscription_header_panel">
                    <div class="array_errors">
                        <ul><p class="array_errors_text"></p></ul>

                    </div>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Nom
                        </p>
                        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_nom">
                    </div>
                    <input type="text" placeholder="Nom" class="nom_inscription_header">

                    <p class="errors_inscription nom_error">
                        La longueur du nom doit être comprise entre 1 et 20 caractères.
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Prénom
                        </p>
                        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_prenom">
                    </div>
    <!--                <p class="errors_inscription inscription_header_panel_erreur_prenom">
                        La longueur du prénom doit être comprise entre 1 et 20 caractères.
                    </p>-->
                    <input type="text" placeholder="Prénom" class="prenom_inscription_header">
                    <p class="errors_inscription prenom_error">
                        La longueur du prenom doit être comprise entre 1 et 20 caractères.
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Email
                        </p>
                        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_email">
                    </div>
    <!--                <p class="errors_inscription inscription_header_panel_erreur_email">
                        Vérifiez votre email.
                    </p>-->
                    <input type="text" placeholder="Email" class="email_inscription_header">
                    <p class="errors_inscription email_error">
                        Vérifiez votre email.
                    </p>
                    <p class="errors_inscription email_error error_email_exist">
                        L'Email est déjà utilisé.
                        <input type="hidden" value="" class="email_exists_error">
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Date de naissance
                        </p>
                        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_birth">
                    </div>
                    <input type="date" placeholder="Date de naissance" class="birth_inscription_header">
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Mot de passe
                        </p>
                        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_password">
                    </div>
    <!--                <p class="errors_inscription inscription_header_panel_erreur_password">
                        La longueur du mot de passe doit être comprise entre 8 et 12 caractères.
                    </p>-->
                    <input type="password" placeholder="Mot de passe" class="password_inscription_header">
                    <p class="errors_inscription password_error">
                        La longueur du mot de passe doit être comprise entre 8 et 16 caractères
                    </p>
                    <div class="error_and_name">
                        <p class="inscription_header_panel_text_title">
                            Confirmation du mot de passe
                        </p>
                        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription inscription_header_panel_erreur_password_confirmation">
                    </div>
                    <input type="password" placeholder="Mot de passe" class="password_confirmation_inscription_header">
                    <p class="errors_inscription password_confirmation_error">
                        Le mot de passe de confirmation et le mot de passe doivent être identiques.
                    </p>
                    <button class="submit_inscription_header">Inscription</button>
                    <button class="cancel_inscription_header">Annuler</button> 
                </div>
                <!--new sentence-->
                <div class="renseigner_header_sentence_panel">
                    <p class="renseigner_header_sentence_panel_text_title">
                        Partage ton inspiration
                    </p>
                    <textarea class="renseigner_header_sentence_text"></textarea>
                    <div class="container_buttons">
                        <input type="button" class="renseigner_header_sentence_submit" value="Valider">
                        <input type="button" class="renseigner_header_sentence_cancel" value="Annuler">
                    </div>
                </div>
            </div>
        </header>
        <div class="validation_inscription">
            <img src="<?php echo $global_url_src ?>/images/fermer.png" class="bouton_fermer">
            <p>Vous êtes maintenant inscrit ! :) </p>
        </div>
        <div class="confirmation_deconnexion">
            <p>
                Etes-vous sûr(e) de vouloir vous déconnecter ?
            </p>
            <div class="buttons_confirmation_deconnexion">
                <button class="deconnexion_oui" value="0">Oui</button>
                <button class="deconnexion_non" value="1">Non</button>
            </div>
        </div>
        <div class="validation_connexion">
            <img src="<?php echo $global_url_src ?>/images/fermer.png" class="bouton_fermer">
            <p>

            </p>
        </div>
        <ul class="liste_header_template">
            <li>
                <a href="<?php echo $global_url_src . "/suggestions/index" ?>"><img src="http://localhost/myproject/images/suggestions.png"></a> 
            </li>
            <?php
            if (!empty($_SESSION)) {
                ?>
                <li>
                    <a href="<?php echo $global_url_src . "/livres/ajouterlivres" ?>"><img src="http://localhost/myproject/images/add_book.png"></a>
                </li>
                <?php } ?>
            </ul>
            <div class="all">
                <?php include $this->view; ?>	
        </div>
    </body>
</html>