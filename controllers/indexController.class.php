<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class indexController{
    public function indexAction($args){
        $v = new view();
        $v->setView("index");
        
        $actu = getActus();
        $v->assign("actu", $actu);
        $all_livres = getAllLivres();
        $v->assign("all_livres", $all_livres);
        $user_infos = getInfos_User_Courant($_COOKIE['cookie_users']);
        $v->assign("user_infos", $user_infos);
    }
}