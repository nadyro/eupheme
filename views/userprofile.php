<?php if ($explode_request_uri[2] == "userprofile") { ?> 
    <!--<div class="conteneur_img_profile">-->
    <!--<div class="conteneur_conteneur">-->
    <?php
    $image = "";
    foreach ($user_infos as $key => $value) {
        
        $image = $value['image_profile'];
        ?>
        <input type="hidden" class="bg_conteneur_img_profile_val" value="<?php echo $global_url_src ?>/images/user_images/baneers/<?php echo $value['image_background_profile']; ?>">
        <div class="conteneur_img_profile" style="background: url('<?php echo $global_url_src ?>/images/user_images/baneers/<?php echo $value['image_background_profile']; ?>'); background-position-x: 100%; background-position-y: <?php echo $changebackground['bg_pos_y'] . "%"; ?>">
            <div class="resizer_bg">
                <input type="range" value="<?php echo!empty($changebackground['bg_pos_y']) ? $changebackground['bg_pos_y'] : 50 ?>" class="range_bg">
            </div>
            <div class="banneer_traitement">
                <div class="change_baneer" post-id="0">
                    <p>Changer la bannière</p>
                </div>
                <div class="change_baneer_valid">
                    <p>Valider</p>
                </div>
            </div>
            <form action="<?php echo $global_url_src . '/userprofile/changebackground' ?>" method="post" style="display:none;" class="form_bg_profile" enctype="multipart/form-data">
                <input type="file" name="bg_image_profile" id="bg_image_profile" post-id="0" value="">
                <input type="button" value="ok" class="valid_bg_change">
            </form>
            <div class="overlay_conteneur_profile"></div>

                                <!--<img src="<?php //echo $global_url_src            ?>/images/user_images/<?php //echo $value['image_profile']            ?>" class="header_img">-->
        </div>
    <?php } ?>
    <!--</div>-->
    <!--</div>-->
    <div class="conteneur0_img_profile">
        <!--<p class="nom_user_profile_conteneur"><?php // echo $_SESSION['user']['nom_user'];     ?></p>-->
        <div class="cadre_img_profile">
            <?php if(!empty($value['image_profile'])){ ?>
            <img src="<?php echo $global_url_src ?>/images/user_images/profile_pictures/<?php echo $value['image_profile'] ?>" class="header_img">
            <?php } ?>
            <div class="modifier_img_profile">
                <p>Modifier ma photo</p>
            </div>
        </div>
        <!--<p class="nom_user_profile_conteneur"><?php // echo $_SESSION['user']['prenom_user'];     ?></p>-->
    </div>
<?php } ?>
<div class="all_little_half"></div>
<div class="all_first_half">
    <div class="titre_first_half">
        <p>Informations personnelles</p>
    </div>
    <form action="<?php echo $global_url_src . '/userprofile' ?>" method="post" class="form_user_profile"  enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $_SESSION['user']['id']; ?>" name="id_user_profile">
        <input type="hidden" value="<?php echo $_SESSION['user']['date_inscription_user']; ?>" name="date_inscription_user_profile">
        <input type="hidden" class="nom_user_profile" name="nom_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['nom_user'] : ""; ?>" placeholder="<?php echo!empty($_SESSION) ? $_SESSION['user']['nom_user'] : ""; ?>">
        <input type="hidden" class="prenom_user_profile" name="prenom_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['prenom_user'] : ""; ?>" placeholder="<?php echo!empty($_SESSION) ? $_SESSION['user']['prenom_user'] : ""; ?>">
        <p>Email</p>
        <input type="text" class="email_user_profile" name="email_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['email_user'] : "" ?>" placeholder="<?php echo!empty($_SESSION) ? $_SESSION['user']['email_user'] : "" ?>">
        <input type="hidden" class="birth_date_user_profile" name="birth_date_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['birth_date_user'] : "" ?>">
        <p>Mot de passe</p>
        <p class="message_mot_de_passe_invalide_profile_0 msg_error_profile">Mot de passe invalide</p>
        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription img_error_profile image_mot_de_passe_invalide_profile_0">
        <input type="password" class="password_user_profile" name="password_user_profile" value="<?php echo!empty($_SESSION) ? $_SESSION['user']['password_user'] : "" ?>">
        <p>Nouveau mot de passe</p>
        <input type="password" class="new_password_user_profile" name="new_password_user_profile" placeholder="Nouveau mot de passe">
        <p>Confirmez le nouveau mot de passe</p>
        <p class="message_mot_de_passe_invalide_profile_1 msg_error_profile">Le mot de passe de confirmation doit être identique au nouveau mot de passe</p>
        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error errors_inscription img_error_profile image_mot_de_passe_invalide_profile_1">
        <input type="password" class="new_confirmation_password_user_profile" name="new_confirmation_password_user_profile" placeholder="Nouveau mot de passe de confirmation">
        <p>Photo de profil</p>
        <img src="<?php echo $global_url_src ?>/images/error.png" class="img_error error_livre_vue error_img_img_livre">
        <div class="errors_img">
            <p class="error_error_img_livre error_text_livre_vue">Une erreur sur l'image est survenue.</p>
            <p class="error_type_img_livre error_text_livre_vue">Le type de l'image doit être au format JPG.</p>
            <p class="error_size_img_livre error_text_livre_vue">La taille de l'image doit être inférieurn à 5Mo.</p>
        </div>
        <?php if (empty($image)) { ?>
        <div class='conteneur_label_text_livre <?php echo !empty($image) ? "overlay_img_livre" : "" ?>' post-id='0'>
                <label for="image_profile" class="label_text_livre" post-id='0'>Sélectionnez une image</label>
            </div>
        <?php } else { ?>
            <div class='conteneur_label_image_profile'>
                <label for="image_profile" class='label_img_livre'
                       style="background: url('<?php echo $global_url_src ?>/images/user_images/profile_pictures/<?php echo $image; ?>') no-repeat;
                       background-size: 100% 100%;">
                </label>
                <div class='overlay_img_livre' post-id='<?php echo $image; ?>'>
                    <p>Changer d'image</p>
                </div>
            </div>
        <?php } ?>
        <?php if(!empty($value['image_background_profile'])){ ?>
        <input type="hidden" value="<?php echo $value['image_background_profile'] ?>" name="bg_image_profile">
        <?php } ?>
        <input type='hidden' value='<?php echo $image; ?>' name="image_profile_hidden">
        <input type="file" name="image_profile" id="img_livre"  post-id="<?php echo !empty($image) ? $image : 0; ?>" title="Test" value="<?php echo $image; ?>" style="display:none;">
        <input type="submit" value="Valider" class="submit_user_profile">

    </form>
</div>
<div class="all_second_half">
    <div class="titre_second_half">
        <p>Dernières activités</p>
    </div>
    <div class="dernieres_activites">
        <?php foreach ($notifications as $key1 => $value1) { ?>
            <div class="activite_<?php echo $value1['id'] ?> une_activite">
                <a href="<?php echo $global_url_src ?>/livres?post_id_livre=<?php echo $value1['id_type_element'] ?>" >
                    <?php if ($value1['id_type'] == 2 && $value1['ecrit'] == 1) { ?>
                        <?php
                        echo "Vous avez écrit "
                        . "'<span class='commentaire_notification'>" . $value1['value'] . "</span>' "
                        . "sur la publication de <span class='notification_user'>" . $value1['nom_user'] . " " . $value1['prenom_user'] . "</span>";
                        ?>
                    <?php } elseif ($value1['id_type'] == 2 && $value1['ecrit'] == 0) { ?>
                        <?php
                        echo "Vous avez aimé le commentaire "
                        . "'<span class='commentaire_notification'>" . $value1['value'] . "</span>' "
                        . "de <span class='notification_user'>" . $value1['nom_user'] . " " . $value1['prenom_user'] . "</span> sur sa publication.";
                        ?>
                    <?php } else { ?>
                        <?php
                        echo "Vous avez aimé "
                        . "'<span class='livre_notification'>" . $value1['value'] . "</span>' "
                        . "de <span class='notification_user'>" . $value1['nom_user'] . " " . $value1['prenom_user'] . "</span>";
                        ?>
                    <?php } ?>
                </a>
            </div>
        <?php }
        ?>

    </div>
    <div class="livres_activites">
        <p class="titre_livres_activites">Mes livres</p>
        <div class="mes_livres">
            <p>Mes livres</p>
        </div>
        <div class="livres_aimes">
            <p>Les livres que vous aimez</p>
        </div>
    </div>
</div>
<div class="all_little_half"></div>