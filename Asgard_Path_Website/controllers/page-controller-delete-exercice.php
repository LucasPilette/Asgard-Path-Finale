<?php

session_start();
require_once(dirname(__FILE__).'/../models/Exercices.php');


$id = trim(filter_input(INPUT_GET,'id',FILTER_SANITIZE_SPECIAL_CHARS));
$exercice = new Exercices();
$exercice->deleteExercice($id);
header('location: /exercices');