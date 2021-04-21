<?php

$noAct = $_POST['noAct'];
$cdAct = $_POST['cdAnim'];
$cdEtatAct = $_POST['cdEtatAct'];
$dateActivite = $_POST['dateActivite'];
$heureRDV = $_POST['heureRDV'];
$prixAct = $_POST['prixAct'];
$heureDBT = $_POST['heureDBT'];
$heureFIN = $_POST['dtAnnulActivite'];
$nom = $_POST['nomResponsable'];
$prenom = $_POST['prenomResponsable'];

$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");

$req = "SELECT COUNT(*) as nbAct FROM ACTIVITE WHERE";
$res = mysqli_query($bdd, $req);
$donnees = mysqli_fetch_assoc($res);

?>