<?php
$image = "";
foreach ($un_user_infos as $key => $value) {
//    var_dump($un_user_infos);
//    die();
    $image = $value['image_profile'];
    ?>
    <input type="hidden" class="bg_conteneur_img_profile_val" value="<?php echo $global_url_src ?>/images/user_images/baneers/<?php echo $value['image_background_profile']; ?>">
    <div class="conteneur_img_profile" style="background: url('<?php echo $global_url_src ?>/images/user_images/baneers/<?php echo $value['image_background_profile']; ?>'); background-position-x: 100%; background-position-y: <?php echo $changebackground['bg_pos_y'] . "%"; ?>">
        <div class="overlay_conteneur_profile"></div>
    </div>
<?php } ?>
<div class="conteneur0_img_profile">
        <!--<p class="nom_user_profile_conteneur"><?php // echo $_SESSION['user']['nom_user'];       ?></p>-->
    <div class="cadre_img_profile">
        <?php if (!empty($value['image_profile'])) { ?>
            <img src="<?php echo $global_url_src ?>/images/user_images/profile_pictures/<?php echo $value['image_profile'] ?>" class="header_img">
            <p class='nom_profile'><span><?php echo $value['prenom_user']." ".$value['nom_user'] ?></span></p>
        <?php } ?>
        <div class="modifier_img_profile">
            <p>Modifier ma photo</p>
        </div>
    </div>
    <!--<p class="nom_user_profile_conteneur"><?php // echo $_SESSION['user']['prenom_user'];       ?></p>-->
</div>

