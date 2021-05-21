<?php
$user = $_SESSION['User']; // On récupère l'utilisateur
$cdAnim = $_GET['cdAnim'];
$mois = $_POST['moisEntrer'];

$noMois = 0;

switch($mois)
{
    case "janvier":
        $noMois = 1;
        break;
    case "février":
        $noMois = 2;
        break;
    case "mars";
        $noMois = 3;
        break;
    case "avril":
        $noMois = 4;
        break;
    case "mai":
        $noMois = 5;
        break;
    case "juin";
        $noMois = 6;
        break;
    case "juillet":
        $noMois = 7;
        break;
    case "aout":
        $noMois = 8;
        break;
    case "septembre":
        $noMois = 9;
        break;
    case "octobre":
        $noMois = 10;
        break;
    case "novembre":
        $noMois = 11;
        break;
    case "décembre":
        $noMois = 12;
        break;
}

ini_set('display_errors', 'on');
$bdd = bddConnect();
    mysqli_set_charset($bdd, "utf8");
if ($_SESSION['TypeUser'] == "AD") {
    //Calcul du taux globale


    

    //Calcul du total de nbPlace
    $req = "SELECT SUM(animation.NBREPLACEANIM) as totalPlace FROM animation,activite WHERE animation.CODEANIM = activite.CODEANIM AND animation.CODEANIM = '$cdAnim'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);

    $nbTotalPlace = $donnees['totalPlace'];

    //Calcul du total du nbInscrit
    $req = "SELECT COUNT(*) as nbTotalInscrit FROM activite, inscription WHERE activite.NOACT = inscription.NOACT  AND activite.CODEANIM = '$cdAnim'";
    $res = mysqli_query($bdd, $req);
    $donnees = mysqli_fetch_assoc($res);

    $nbTotalInscrit = $donnees['nbTotalInscrit'];

    $tauxDeRemplisageGlobal = round(($nbTotalInscrit / $nbTotalPlace) * 100);

    echo "Le taux global est de : " . $tauxDeRemplisageGlobal . " pourcent";
}



?>
<table class='table'>
    <thead class='thead-dark'>
        <tr>
            <th scope='col'>N° Activité:</th>
            <th scope='col'>Code Animation:</th>
            <th scope='col'>Code Etat Ativité:</th>
            <th scope='col'>Date Activité:</th>
            <th scope='col'>Heure Rdv Activité</th>
            <th scope='col'>Prix Activité</th>
            <th scope='col'>Heure Début Act</th>
            <th scope='col'>Heure Fin Act</th>
            <th scope='col'>Date Anul Act</th>
            <th scope='col'>Responsable</th>
            <th scope='col'>Place libre</th>
            <th scope='col'>Inscription</th>
            <?php
            if ($_SESSION['TypeUser'] == "AD") { ?>
                <th scope='col'>Taux de remplissage</th>
                <th scope='col'>Modification</th>
                <th scope='col'>Supression</th>
                <th scope='col'>Lister les Inscrits</th>
            <?php
            }
            ?>
        </tr>
    </thead>

    <?php

    $req = "SELECT *  FROM ACTIVITE ACT, ETAT_ACT ETACT WHERE ACT.CODEETATACT= ETACT.CODEETATACT AND ACT.CODEANIM='$cdAnim' AND ETACT.NOMETATACT = 'Disponible' AND MONTH(ACT.DATEACT) = '$noMois'";
    //$req = "SELECT * FROM ACTIVITE WHERE CODEANIM='$cdAnim' ";
    $res = mysqli_query($bdd, $req);
    while ($donnees = mysqli_fetch_assoc($res)) {
        $noAct = $donnees['NOACT'];
        $codeAnim = $donnees['CODEANIM'];
        $codeEtatAct = $donnees['CODEETATACT'];
        $dateAct = $donnees['DATEACT'];
        $hrRdvAct = $donnees['HRRDVACT'];
        $hrDebutAct = $donnees['HRDEBUTACT'];
        $hrFinAct = $donnees['HRFINACT'];
        $dateAnulAct = $donnees['DATEANNULEACT'];
        $prenomResp = $donnees['PRENOMRESP'];
        $nomResp = $donnees['NOMRESP'];
        $tarifAct = $donnees['PRIXACT'];
    ?>
        <tbody>
            <tr>
                <td><?php echo $noAct ?></td>
                <td><?php echo $codeAnim ?></td>
                <td><?php echo $codeEtatAct ?></td>
                <td><?php echo $dateAct ?></td>
                <td><?php echo $hrRdvAct ?></td>
                <td><?php echo $tarifAct ?></td>
                <td><?php echo $hrDebutAct ?></td>
                <td><?php echo $hrFinAct ?></td>
                <td><?php echo $dateAnulAct ?></td>
                <td><?php echo $prenomResp, " ", $nomResp ?></td>
                <?php

                $nbrePlace = $_GET['nbrePlace'];
                $reqdeux = "SELECT count(*) AS nbInscrit FROM INSCRIPTION WHERE NOACT='$noAct'"; // On récupère les nombres d'inscrit à l'activité
                $resdeux = mysqli_query($bdd, $reqdeux);
                $donneesdeux = mysqli_fetch_assoc($resdeux);

                //On crée le taux de remplissage
                $nbInscritSimpleSalarie = $donneesdeux['nbInscrit'];
                $tauxRemplissage = $donneesdeux['nbInscrit'] / $nbrePlace;
                $tauxRemplissage = $tauxRemplissage * 100;

                if ($donneesdeux['nbInscrit'] == $nbrePlace) {
                    $nbrePlace = "Complet";
                } else {
                    $nbrePlace = $nbrePlace - $donneesdeux['nbInscrit'];
                }

                ?>
                <td><?php echo $nbrePlace ?></td>
                <?php

                $reqtrois = "SELECT count(*) AS dejaInscrit FROM INSCRIPTION WHERE USER='$user' AND NOACT='$noAct'"; // On regarde si l'utilisateur est déjà inscrit
                $restrois = mysqli_query($bdd, $reqtrois);
                $donneestrois = mysqli_fetch_assoc($restrois);

                if ($donneestrois['dejaInscrit'] == 1) {
                    echo "<td> Inscrit </td>";
                } else {
                ?>
                    <td><a href="index.php?page=inscription&noAct=<?php echo $noAct ?>" class="btn btn-info">Inscription</a></td>
                <?php

                }

                if ($_SESSION['TypeUser'] == "AD") { ?>

                    <td> <?php echo $tauxRemplissage . "%" ?> </td>
                    <td><a href="index.php?page=modifierActivite&noAct=<?php echo $noAct ?>" class="btn btn-info">Modifier activité</a></td>
                    <td><a href="index.php?page=supprimerActivite&noAct=<?php echo $noAct ?>" class="btn btn-info">Suprimmer activité</a></td>
                    <td><a href="index.php?page=listerInscrit&noAct=<?php echo $noAct ?>" class="btn btn-info">Lister les inscrits</a></td>
                <?php
                }
                ?>
            </tr>
        </tbody>
    <?php
    }
    ?>