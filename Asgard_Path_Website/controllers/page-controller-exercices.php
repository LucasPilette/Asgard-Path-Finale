<?php 

session_start();
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Exercices.php');

if($_SESSION['id_roles'] == 1 || $_SESSION['id_roles'] == 3){
    $exercicesList = Exercices::getAll();
    $usersList = User::getAll();
}

include(dirname(__FILE__) .'/../views/templates/headerInscription.php');
include(dirname(__FILE__) .'/../views/exercices.php');
include(dirname(__FILE__) .'/../views/templates/footer.php');