<?php
ini_set('display_errors', 'on');

/*Récupération des infos de la session*/
$user = $_SESSION['User'];
$noAct = $_GET['noAct'];
echo var_dump($_GET);
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");

/*Vérifier que l'utilisateur n'est pas déjà inscrit à cette activité*/
$req = "SELECT count(*) AS dejaInscrit FROM INSCRIPTION WHERE USER='$user' AND NOACT='$noAct'";
$res = mysqli_query($bdd, $req);
$donnees = mysqli_fetch_assoc($res);

if ($donnees['dejaInscrit'] == 1) {
    header('location:index.php');
} else {

    /*Récupération des infos de l'activitée*/
    $req = "SELECT * FROM ACTIVITE WHERE NOACT='$noAct'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);

    $dateActuel = date("y.m.d");
    $dateActivité = $donnees['DATEACT'];
    $dateAnnulAct = $donnees['DATEANNULEACT'];

    $dtActuelle = strtotime($dateActuel);
    $dtActivite = strtotime($dateActivité);
    $dtAnnulAct = strtotime($dateAnnulAct);




    /* Récupération des infos de l'utilisateur */

    $req = "SELECT * FROM COMPTE WHERE USER = '$user'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);
    $dateDeFinDeSejour = $donnees['DATEFINSEJOUR'];

    /*Récupérer le place disponible pour l'activité*/
    $req = "SELECT NBREPLACEANIM FROM ANIMATION AN,ACTIVITE AC WHERE AC.CODEANIM = AN.CODEANIM AND AC.NOACT = '$noAct'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);

    $nbrPlaceAnim = $donnees['NBREPLACEANIM'];

    /*Récupérer le nombre actuel de réservation pour cette activité*/
    $req = "SELECT count(*) AS nbInscrit FROM INSCRIPTION WHERE NOACT = '$noAct'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);

    $nombreInscrit = $donnees['nbInscrit'];

    /*On vérifie qu'il reste assez de place pour que l'utilisateur puisse s'inscrire*/

    if ($nbrPlaceAnim < ($nombreInscrit + 1)) {
        header('location:index.php?page=animation&reussite=False');
    } else {
        /*On vérifie si la date actuelle ne dépasse pas la date de l'activité et que la date de fin de séjour de l'utilisateur est avant la date de l'activité*/

        if ($dtActuelle > $dtActivite & $dtActivite > $dateDeFinDeSejour) {
            header('location:index.php?page=animation&reussite=False');
        } else {
            $req = "INSERT INTO INSCRIPTION VALUES(NULL,'$user','$noAct','$dateActuel','$dateAnnulAct') ";
            $res = mysqli_query($bdd, $req);
            session_start();
            $_SESSION['noInscrit'] = mysqli_insert_id($bdd);
            header('location:index.php?page=animation&reussite=True');
        }
    }
}
mysqli_close($bdd);
