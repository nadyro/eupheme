<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author Nadir
 */
class User extends Base_SQL {

    public $id;
    public $nom_user;
    public $prenom_user;
    public $email_user;
    public $password_user;
    public $birth_date_user;
    public $date_inscription_user;
    public $image_profile;
    public $image_background_profile;

    function getId() {
        return $this->id;
    }

    function getNom() {
        return $this->nom_user;
    }

    function getPrenom() {
        return $this->prenom_user;
    }

    function getEmail() {
        return $this->email_user;
    }

    function getPassword() {
        return $this->password_user;
    }

    function getDate_de_naissance() {
        return $this->birth_date_user;
    }

    function getDate_inscription_user() {
        return $this->date_inscription_user;
    }

    function getImage_profile() {
        return $this->image_profile;
    }

    function getImage_background_profile() {
        return $this->image_background_profile;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNom($nom_user) {
        $this->nom_user = $nom_user;
    }

    function setPrenom($prenom_user) {
        $this->prenom_user = $prenom_user;
    }

    function setEmail($email_user) {
        $this->email_user = $email_user;
    }

    function setPassword($password_user) {
        $this->password_user = $password_user;
    }

    function setDate_de_naissance($birth_date_user) {
        $this->birth_date_user = $birth_date_user;
    }

    function setDate_inscription_user($date_inscription_user) {
        $this->date_inscription_user = $date_inscription_user;
    }

    function setImage_profile($image_profile) {
        $this->image_profile = $image_profile;
    }

    function setImage_background_profile($image_background_profile) {
        $this->image_background_profile = $image_background_profile;
    }

}
