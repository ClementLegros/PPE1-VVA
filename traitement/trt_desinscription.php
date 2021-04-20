<?php
ini_set('display_errors', 'on');
var_dump($_GET);
//récupération des variables
$noAct = $_GET['noAct'];
$user = $_SESSION['User'];

$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
$sql = "DELETE INSCRIPTION WHERE USER = '$user' AND NOACT = '$noAct' ";
$step = $bdd->prepare($sql);
$step->execute();
