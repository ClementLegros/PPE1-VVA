<?php

include '../fonction.php';

    $cdAnim = $_GET['cdAnim'];
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query("SELECT count(*) as relie FROM ACTIVITE WHERE CODEANIM = '$cdAnim'");
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
        $reponse = $bdd->query("DELETE FROM ANIMATION WHERE CODEANIM = '$cdAnim'");
        $donnees = $reponse->fetch();
        $reponse->closeCursor();
        header('location:index.php?page=animation&reussite=True');
    } else {
        header('location:index.php?page=animation&reussite=False');
    }
    ?>
?>