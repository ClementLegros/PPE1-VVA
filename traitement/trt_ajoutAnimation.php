<?php
ini_set('display_errors', 'on');
include '../fonction.php';
echo var_dump($_POST);
//On récupère les valeurs du $_POST
$cdAnim = $_POST['cdAnim'];
$cdTypeAnim = $_POST['cdTypeAnim'];
$nomAnimation = htmlspecialchars($_POST['nomAnimation'], ENT_QUOTES);
$dateCreationAnimation = $_POST['dateCreationAnimation'];
$dateValiditeAnimation = $_POST['dateValiditeAnimation'];
$dureeAnimation = $_POST['dureeAnimation'];
$limiteAge = $_POST['limiteAge'];
$tarifAnimation = $_POST['tarifAnimation'];
$nbrPlaceAnimation = $_POST['nbrPlaceAnimation'];
$descriptionAnimation = htmlspecialchars($_POST['descriptionAnimation'], ENT_QUOTES);
$commentaireAnimation = htmlspecialchars($_POST['commentaireAnimation'], ENT_QUOTES);
$difficulteAnimation = htmlspecialchars($_POST['difficulteAnimation'], ENT_QUOTES);



//Faire la vérification pour la clé primaire
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");
$req = "INSERT INTO ANIMATION VALUES('$cdAnim','$cdTypeAnim','$nomAnimation','$dateCreationAnimation','$dateValiditeAnimation', '$dureeAnimation','$limiteAge','$tarifAnimation','$nbrPlaceAnimation','$descriptionAnimation','$commentaireAnimation','$difficulteAnimation') ";
if ($res = mysqli_query($bdd, $req)) {
    header('location:../index.php?page=ajoutAnimation&reussite=True');
} else {
    header('location:../index.php?page=ajoutAnimation&reussite=False');
}
