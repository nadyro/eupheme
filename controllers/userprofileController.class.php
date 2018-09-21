<?php

class userprofileController {

    public function indexAction($args) {
        $v = new view();
        $v->setView("userprofile");
//        var_dump($_COOKIE);
        $notifications = getNotification($_COOKIE['cookie_users'], "1");
        $changebackground = getchangebackground($_COOKIE['cookie_users']);
        $v->assign("changebackground", $changebackground);
        $v->assign("notifications", $notifications);
        $user_infos = getInfos_User_Courant($_COOKIE['cookie_users']);
        $v->assign("user_infos", $user_infos);

        if (!empty($_POST)) {
            $user_infos = getUser("", $_POST['id_user_profile']);
            if (!empty($user_infos)) {
                $user = new User();
                if ($user_infos[0]['password_user'] == $_POST['password_user_profile']) {
                    if (!empty($_POST['new_password_user_profile'])) {
                        if ($_POST['new_password_user_profile'] == $_POST['new_confirmation_password_user_profile']) {
                            $user->setPassword($_POST['new_password_user_profile']);
                        }
                    } else {
                        $user->setPassword($user_infos[0]['password_user']);
                        echo "<input type='hidden' value='1' class='new_mdp_conf_new_mdp_not_equal'>";
                    }

                    if (!empty($_FILES['image_profile']['name'])) {
                        if ($_FILES['image_profile']['error'] != 0) {
                            echo "<input type='hidden' value='5' class='error_livre error_error_img_livre'>";
                            $validation_form = false;
                            $msg_error = array("7" => "img img error");
                        }
                        if ($_FILES['image_profile']['size'] > 5120000) {
                            echo "<input type='hidden' value='6' class='error_livre error_size_img_livre'>";
                            $validation_form = false;
                            $msg_error = array("8" => "img size error");
                        }
                        if ($_FILES['image_profile']['type'] != "image/jpeg") {
                            echo "<input type='hidden' value='7' class='error_livre error_type_img_livre'>";
                            $validation_form = false;
                            $msg_error = array("9" => "img type error");
                        }
                        $nom_img_md5 = md5($_FILES['image_profile']['name']);
                        $img_md5 = "images/user_images/profile_pictures/" . $nom_img_md5 . ".jpg";

                        if (move_uploaded_file($_FILES['image_profile']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                            
                        } else {
                            
                        }
                    }
                    $user->setId($_POST['id_user_profile']);
                    $user->setNom($_POST['nom_user_profile']);
                    $user->setPrenom($_POST['prenom_user_profile']);
                    $user->setEmail($_POST['email_user_profile']);
                    $user->setDate_de_naissance($_POST['birth_date_user_profile']);
                    $user->setDate_inscription_user($_POST['date_inscription_user_profile']);
                    if (!empty($_FILES['image_profile']['name']))
                        $user->setImage_profile($nom_img_md5 . ".jpg");
                    else
                        $user->setImage_profile($_POST['image_profile_hidden']);
                    if (!empty($_POST['bg_image_profile']))
                        $user->setImage_background_profile($_POST['bg_image_profile']);
                    $user->save();
                    header("Refresh:0");
                } else {
                    echo "<input type='hidden' value='0' class='mot_de_passe_invalide_profile'>";
                }
            }
        }
    }

    public function changebackgroundAction() {
        if (!empty($_GET['bg_pos_y'])) {
            changebackground($_COOKIE['cookie_users'], $_GET['bg_pos_y']);
        }
        if (!empty($_FILES['bg_image_profile']['name'])) {
            if ($_FILES['bg_image_profile']['error'] != 0) {
                echo "<input type='hidden' value='5' class='error_livre error_error_img_livre'>";
                $validation_form = false;
                $msg_error = array("7" => "img img error");
            }
            if ($_FILES['bg_image_profile']['size'] > 5120000) {
                echo "<input type='hidden' value='6' class='error_livre error_size_img_livre'>";
                $validation_form = false;
                $msg_error = array("8" => "img size error");
            }
            if ($_FILES['bg_image_profile']['type'] != "image/jpeg") {
                echo "<input type='hidden' value='7' class='error_livre error_type_img_livre'>";
                $validation_form = false;
                $msg_error = array("9" => "img type error");
            }
            $nom_img_md5 = md5($_FILES['bg_image_profile']['name']);
            $img_md5 = "images/user_images/baneers/" . $nom_img_md5 . ".jpg";

            if (move_uploaded_file($_FILES['bg_image_profile']['tmp_name'], DIRECTORY_URL . $img_md5)) {
                
            } else {
                
            }
        }
        $user_background = new User();
        if (!empty($_FILES['bg_image_profile']['name'])) {
            updateUserBackground($_COOKIE['cookie_users'], $nom_img_md5 . ".jpg");
            header("Location:http://localhost/myproject/userprofile");
        }
    }

    public function viewprofileAction($args) {
        $v = new view();
        $v->setView("viewprofile");
        $un_user_infos = getInfos_User_Courant($_GET['id_user']);
        $v->assign("un_user_infos", $un_user_infos);
        $changebackground = getchangebackground($_GET['id_user']);
        $v->assign("changebackground", $changebackground);
    }

}
