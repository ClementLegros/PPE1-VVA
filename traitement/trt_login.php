<?php
    ini_set('display_errors', 'on');
    //On récupère les valeurs du $_POST

    $login = $_POST['login'];
    $mdp = $_POST['password'];

    $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
    $reponse = $bdd->query("SELECT USER, MDP, TYPEPROFIL FROM COMPTE WHERE USER = '$login' AND MDP = '$mdp' ");
    $donnees = $reponse->fetch();

    if($donnees == NULL)
    {
        header('location:connection.htm');
        $reponse->closeCursor();
    }
    else
    {
        session_start();
        $_SESSION['TypeUser'] = NULL;
        $_SESSION['User'] = $login;
        $typeUser = $donnees['TYPEPROFIL'];
        $_SESSION['TypeUser'] = $typeUser;
        $reponse->closeCursor();
        header('location:../index.php');
    }