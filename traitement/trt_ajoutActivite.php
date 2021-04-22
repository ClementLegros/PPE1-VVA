<?php
echo var_dump($_POST);
ini_set('display_errors', 'on');
include '../fonction.php';

$noAct = $_POST['noAct'];
$cdAnim = $_POST['cdAnim'];
$cdEtatAct = $_POST['cdEtatAct'];
$dateActivite = $_POST['dateActivite'];
$heureRDV = $_POST['heureRDV'];
$prixAct = $_POST['prixAct'];
$heureDBT = $_POST['heureDBT'];
$heureFIN = $_POST['heureFIN'];
$nom = $_POST['nomResponsable'];
$prenom = $_POST['prenomResponsable'];
$dtAnnulActivite = $_POST['dtAnnulActivite'];
echo $heureRDV , $heureDBT, $heureFIN;
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");


//On vérifie si il n'y a pas une activité déjà enregistrer le même jour
$req = "SELECT COUNT(*) as nbACT FROM ACTIVITE WHERE CODEANIM='$cdAnim' AND DATEACT = '$dateActivite'";
$res = mysqli_query($bdd, $req);
$donnees = mysqli_fetch_assoc($res);

if($donnees['nbACT'] == 1)
{
    header('location:../index.php?page=ajoutActivite&reussite=False');
    mysqli_close($bdd);
}


$req = "INSERT INTO ACTIVITE VALUES('$noAct','$cdAnim','$cdEtatAct','$dateActivite','$heureRDV','$prixAct','$heureDBT','$heureFIN', '$dtAnnulActivite', '$nom', '$prenom')";

if ($res = mysqli_query($bdd, $req)) {
    header('location:../index.php?page=ajoutActivite&reussite=True');
    mysqli_close($bdd);
} else {

    header('location:../index.php?page=ajoutActivite&reussite=False');
    mysqli_close($bdd);
}
