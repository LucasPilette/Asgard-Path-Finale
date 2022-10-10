<?php 

session_start();
require_once(dirname(__FILE__).'/../models/User.php');


if($_SESSION['user_id'] == $_GET['id']){
    $user = User::getOne($_SESSION['user_id']);
    $statut = $user->id_roles;
    if($statut == '1'){
        $userList = User::getAll();
    } elseif ( $statut == '3'){
        $userList = User::getAllUsers();
    }
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_destroy();
    header('location: /accueil');
    exit();
}



include(dirname(__FILE__) .'/../views/templates/headerInscription.php');
include(dirname(__FILE__) .'/../views/profile.php');
include(dirname(__FILE__) .'/../views/templates/footer.php');


