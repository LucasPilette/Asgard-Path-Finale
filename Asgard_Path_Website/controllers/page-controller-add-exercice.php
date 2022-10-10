<?php 

session_start();
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__).'/../models/Exercices.php');
require_once(dirname(__FILE__) . '/../config/constForm.php');

if(($_SESSION['id_roles'] == 1 || $_SESSION['id_roles'] == 3) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        // NOM
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($name)) {
            $errors['name'] = 'Veuillez saisir votre nom';
        } else {
            $checkedname = filter_var(
                $name,
                FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
            );
            if (!$checkedname) {
                $errors['name'] = 'Veuillez saisir un nom valide';
            }
        }
        // DESCRIPTION
        $description = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($description)) {
            $errors['description'] = 'Veuillez saisir une description';
        } else {
            $checkedDescription = filter_var(
                $description,
                FILTER_VALIDATE_REGEXP,
                array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
            );
            if (!$checkedDescription) {
                $errors['description'] = 'Veuillez saisir une description valide';
            }
        }

        if (empty($errors)) {
            $exercice = new Exercices($name,$description);
            $exercice->add($_SESSION['user_id']);
            header('location: /exercices');}
}

include(dirname(__FILE__) .'/../views/templates/headerInscription.php');
include(dirname(__FILE__) .'/../views/add-exercice.php');
include(dirname(__FILE__) .'/../views/templates/footer.php');