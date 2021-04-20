<?php

include '../fonction.php';

/* L'encadrant vérifie toutes les données de l'activité et vérifie que l'activité peut être annulé */
$noAct = $_GET['noAct'];
try {
    $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse = $bdd->query("SELECT count(*) as relie FROM INSCRIPTION WHERE NOACT = '$noAct'");
$donnees = $reponse->fetch();

if ($donnees['relie'] >= 1) {
    $peutEtreSupr = false;
} else {
    $peutEtreSupr = true;
}

if ($peutEtreSupr) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query("DELETE FROM ACTIVITE WHERE NOACT = '$noAct'");
    $donnees = $reponse->fetch();
    $reponse->closeCursor();
    header('location:index.php?page=consulterAnim&reussite=True');
} else {
    header('location:index.php?page=consulterAnim&reussite=False');
}
?>