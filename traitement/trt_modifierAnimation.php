<?php
      ini_set('display_errors', 'on');
    echo var_dump($_POST);
    //On récupère les valeurs du $_POST
    $cdAnim = $_POST['cdAnim'];
    $cdTypeAnim = $_POST['cdTypeAnim'];
    $nomAnimation = $_POST['nomAnimation'];
    $dateCreationAnimation = $_POST['dateCreationAnimation'];
    $dateValiditeAnimation = $_POST['dateValiditeAnimation'];
    $dureeAnimation = $_POST['dureeAnimation'];
    $limiteAge = $_POST['limiteAge'];
    $tarifAnimation = $_POST['tarifAnimation'];
    $nbrPlaceAnimation = $_POST['nbrPlaceAnimation'];
    $descriptionAnimation = $_POST['descriptionAnimation'];
    $commentaireAnimation = $_POST['commentaireAnimation'];
    $difficulteAnimation = $_POST['difficulteAnimation'];

    $data = [
        'codeAnim' => $cdAnim,
        'codeTypeAnim' => $cdTypeAnim,
        'nomAnimation' => $nomAnimation,
        'dateCreationAnimation' => $dateCreationAnimation,
        'dateValiditeAnimation' => $dateValiditeAnimation,
        'dureeAnimation' => $dureeAnimation,
        'limiteAge' => $limiteAge,
        'tarifAnimation' => $tarifAnimation,
        'nbrPlaceAnimation' => $nbrPlaceAnimation,
        'descriptionAnimation' => $descriptionAnimation,
        'commentaireAnimation' => $commentaireAnimation,
        'difficulteAnimation' => $difficulteAnimation,
    ];
    //Faire la vérification pour la clé primaire

        $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
        $sql = "UPDATE ANIMATION SET CODEANIM=:codeAnim,CODETYPEANIME=:codeTypeAnim,NOMANIM=:nomAnimation,DATECREATIONANIM=:dateCreationAnimation,DATEVALIDITEANIM=:dateValiditeAnimation,DUREEANIM=:dureeAnimation,LIMITEAGE=:limiteAge,TARIFANIM=:tarifAnimation,NBREPLACEANIM=:nbrPlaceAnimation,DESCRIPTANIM=:descriptionAnimation,COMMENTANIM=:commentaireAnimation, DIFFICULTEANIM=:difficulteAnimation WHERE CODEANIM=:codeAnim";
        $stmt= $bdd->prepare($sql);
        $stmt->execute($data);
?>