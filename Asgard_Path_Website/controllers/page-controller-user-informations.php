<?php 

session_start();
require_once(dirname(__FILE__).'/../models/User.php');
require_once(dirname(__FILE__) . '/../config/constForm.php');

if(!empty($_GET)){
    $id = intval(filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT));
    $user = User::getOne($id);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    // EMAIL
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $errors['email'] = 'Veuillez saisir votre email';
    } else {
        $checkedEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$checkedEmail) {
            $errors['email'] = 'Veuillez saisir un email valide';
        }
    }

    // PRENOM
    $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($firstname)) {
        $errors['firstname'] = 'Veuillez saisir votre prénom';
    } else {
        $checkedFirstname = filter_var(
            $firstname,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
        );
        if (!$checkedFirstname) {
            $errors['firstname'] = 'Veuillez saisir un prénom valide';
        }
    }

    // NOM
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($lastname)) {
        $errors['lastname'] = 'Veuillez saisir votre nom';
    } else {
        $checkedLastname = filter_var(
            $lastname,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_NAME . '/'))
        );
        if (!$checkedLastname) {
            $errors['lastname'] = 'Veuillez saisir un nom valide';
        }
    }


    // Identifiant

    $login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));
    if (empty($login)) {
        $errors['login'] = 'Veuillez saisir votre identifiant';
    } else {
        $checkedLogin = filter_var(
            $login,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REG_EXP_LOGIN . '/'))
        );
        if (!$checkedLogin) {
            $errors['login'] = 'Veuillez saisir un identifiant valide';
        }
    }

}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($errors)) {
    $id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
    $user = new User($lastname,$firstname,$email,$login,);
    $user->modifyOne($id);
    header('location: /profile?id='.$_SESSION['user_id']);
}

include(dirname(__FILE__) .'/../views/templates/headerInscription.php');
include(dirname(__FILE__) .'/../views/userInformations.php');
include(dirname(__FILE__) .'/../views/templates/footer.php');