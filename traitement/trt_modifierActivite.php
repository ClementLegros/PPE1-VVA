<?php
ini_set('display_errors', 'on');
include '../fonction.php';
echo var_dump($_POST);
//On récupère les valeurs du $_POST
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


//Faire la vérification pour la clé primaire
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");
$req = "UPDATE ACTIVITE SET NOACT = '$noAct', CODEANIM='$cdAnim', CODEETATACT ='$cdEtatAct', DATEACT ='$dateActivite', HRRDVACT ='$heureRDV', PRIXACT ='$prixAct', HRDEBUTACT ='$heureDBT', HRFINACT='$heureFIN', DATEANNULEACT='$dtAnnulActivite', NOMRESP ='$nom', PRENOMRESP ='$prenom' WHERE NOACT = '$noAct' ";
if ($res = mysqli_query($bdd, $req)) {
    mysqli_close($bdd);
    header('location:../index.php?page=modifierActivite&reussite=True');
} else {
    mysqli_close($bdd);
    header('location:../index.php?page=modifierActivite&reussite=False');
}
