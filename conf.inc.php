<?php/* * To change this license header, choose License Headers in Project Properties. * To change this template file, choose Tools | Templates * and open the template in the editor. */	if (session_status() == PHP_SESSION_NONE) {            session_start();        }define("BDD_DRIVER", "mysql");define("DBHOST", "localhost");define("DBNAME", "eupheme");define("DBUSER", "root");define("DBPWD", "");define("PATH_URL", "");define("BASE_URL",dirname(__FILE__) . "/");define("ADMIN_URL", "/admin");define("HOME_URL", "");define("FRONT_URL", "/");define("DIRECTORY_URL", dirname(__FILE__) . "/");// token md5 unique id + email + url// access token en db (user) => inactif (0/1) flog / accesstken char 32// mail avec url// /user/validation/sjndsnf// vérif en base user avec access_token + param en get si oui status 1 redirect connexion sinon message d'erreur + regénérer access token// fucntion (generate access token) (param: mail)// connect user pass + regenerate access token stocké en session