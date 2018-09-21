<div class="big_half">
    <div class="little_half"></div>

    <div class="all_page_index">
        <div class="top_lane">
            <div class="whatsuponeupheme">
                Quoi de neuf sur Eupheme ?
            </div>
            <div class="added_books">
                Livres récents
            </div>
            <div class="marketplace">
                Bibliothèque
            </div>
        </div>
        <div class="containers container_posts">
            <?php
            foreach ($actu as $kk => $vv) {
                $type_notif = "";
                $type_element = "";
                $value = "";
                if ($vv['ecrit'] == 0) {
                    $type_notif = "aimé";
                } else {
                    $type_notif = "écrit";
                }
                if ($vv['id_type'] == 1) {
                    $type_element = "livre";
                } else {
                    $type_element = "commentaire";
                }
                if ($vv['id_type'] == 1 && $vv['ecrit'] == 0) {
                    $value = $vv['titre'];
                } else {
                    $value = $vv['value'];
                }
                ?>

                <div class="un_post">
                    <div class="image_nom_post">
                        <img src="images/user_images/profile_pictures/<?php echo $vv['image_profile'] ?>" alt="" class="img_profile_post" post-id="<?php echo $vv['id_user_notifiant'] ?>">
                        <p><?php echo $vv['nom_user'] . " " . $vv['prenom_user'] ?> a <?php echo $type_notif ?>
                            <?php 
                            if ($vv['id_type'] == 1) {?>
                    le <?php echo $type_element ?>
               <?php }
                            ?>
                             : "<?php echo $value ?>"</p>
                    </div>
                    <?php
//            var_dump($vv);
//            die();
                    ?>
                    <a href="http://localhost/myproject/livres?post_id_livre=<?php echo $vv['id_type_element'] ?>">
                        <div class="content_post">
                            <p>Ce livre a été posté</p>
                            <img src="images/livres_images/<?php echo $vv['image']; ?>" alt="" class="img_post">
                        </div>
                    </a>

                </div>

            <?php } ?>
        </div>
        <div class="containers container_livres">
            <?php foreach ($all_livres as $key => $value) { ?>

                <div class="un_livre">
                    <div class="image_nom_post">
                        <img src="images/user_images/profile_pictures/<?php echo $value['image_profile'] ?>" alt="" class="img_profile_post" post-id="<?php echo $value['id_user'] ?>">
                        <p><?php echo $value['nom_user'] . " " . $value['prenom_user'] ?> a ajouté : "<?php echo $value['titre'] ?>"</p>
                    </div>
                    <a href="http://localhost/myproject/livres?post_id_livre=<?php echo $value['id'] ?>">
                        <div class="content_post">
                            <img src="images/livres_images/<?php echo $value['image']; ?>" alt="" class="img_post">
                        </div>
                    </a>
                </div>

            <?php } ?>
        </div>

    </div>

    <div class="little_half"></div>
</div>