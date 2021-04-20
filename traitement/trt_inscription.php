<?php
ini_set('display_errors', 'on');

/*Récupération des infos de la session*/
$user = $_SESSION['User'];
$noAct = $_GET['noAct'];

$bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');

/*Vérifier que l'utilisateur n'est pas déjà inscrit à cette activité*/
$reponse = $bdd->query("SELECT count(*) AS dejaInscrit FROM INSCRIPTION WHERE USER='$user' AND NOACT='$noAct'");
$donnees = $reponse->fetch();

if ($donnees['dejaInscrit'] == 1) {
    header('location:index.php');
} else {



    /*Récupération des infos de l'activitée*/
    $reponse = $bdd->query("SELECT * FROM ACTIVITE WHERE NOACT='$noAct'");
    $donnees = $reponse->fetch();
    $dateActuel = date("y.m.d");
    $dateActivité = $donnees['DATEACT'];
    $dateAnnulAct = $donnees['DATEANNULEACT'];

    $dtActuelle = strtotime($dateActuel);
    $dtActivite = strtotime($dateActivité);
    $dtAnnulAct = strtotime($dateAnnulAct);




    /*Récupération des infos de l'utilisateur*/
    $reponse = $bdd->query("SELECT * FROM COMPTE WHERE USER = '$user'");
    $donnees = $reponse->fetch();
    $dateDeFinDeSejour = $donnees['DATEFINSEJOUR'];




    /*Récupérer le place disponible pour l'activité*/
    $reponse = $bdd->query("SELECT NBREPLACEANIM FROM ANIMATION AN,ACTIVITE AC WHERE AC.CODEANIM = AN.CODEANIM AND AC.NOACT = '$noAct'");
    $donnees = $reponse->fetch();
    $nbrPlaceAnim = $donnees['NBREPLACEANIM'];


    /*Récupérer le nombre actuel de réservation pour cette activité*/

    $reponse = $bdd->query("SELECT count(*) AS nbInscrit FROM INSCRIPTION WHERE NOACT = '$noAct'");
    $donnees = $reponse->fetch();
    $nombreInscrit = $donnees['nbInscrit'];

    /*On vérifie qu'il reste assez de place pour que l'utilisateur puisse s'inscrire*/

    if ($nbrPlaceAnim < ($nombreInscrit + 1)) {
        header('location:index.php');
    } else {




        /*On vérifie si la date actuelle ne dépasse pas la date de l'activité et que la date de fin de séjour de l'utilisateur est avant la date de l'activité*/

        if ($dtActuelle > $dtActivite & $dtActivite > $dateDeFinDeSejour) {
            //header('location:index.php?page=InscriptionActChoixAnim');
        } else {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
                $sql = "INSERT INTO INSCRIPTION VALUES(NULL,'$user','$noAct','$dateActuel','$dateAnnulAct') ";
                $bdd->exec($sql);
                $reponse->closeCursor();
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
            header('location:index.php?page=consulterAnim&reussite=True');
        }
    }
}
