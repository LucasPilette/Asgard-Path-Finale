<?php

session_start();
require_once(dirname(__FILE__).'/../models/User.php');


$id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
$user = new User();
$user->deleteUser($id);
header('location: /profile?id='.$_SESSION['user_id']);