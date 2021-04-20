<?php
    //Inclusion des fonctions
    include '../fonction.php';
    //On récupère les valeurs du $_POST
    $login = $_POST['login'];
    $mdp = $_POST['password'];

    //Connection à la base de donnée
    $bdd = bddConnect();
    mysqli_set_charset($bdd, "utf8");
    $req = "SELECT* FROM COMPTE WHERE USER = '$login' AND MDP = '$mdp'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);

    if($donnees == NULL)
    {
        header('location:../index.php?page=connect');
        mysqli_close($bdd);
    }
    else
    {
        session_start();
        $_SESSION['TypeUser'] = NULL;
        $_SESSION['User'] = $login;
        $typeUser = $donnees['TYPEPROFIL'];
        $_SESSION['TypeUser'] = $typeUser;
        mysqli_close($bdd);
        header('location:../index.php');
    }