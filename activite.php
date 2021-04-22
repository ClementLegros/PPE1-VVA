<?php
$user = $_SESSION['User']; // On récupère l'utilisateur
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
                <th scope='col'>Modification</th>
                <th scope='col'>Supression</th>
                <th scope='col'>Lister les Inscrits</th>
            <?php
            }
            ?>
        </tr>
    </thead>

    <?php
    $cdAnim = $_GET['cdAnim'];
    ini_set('display_errors', 'on');

    $bdd = bddConnect();
    mysqli_set_charset($bdd, "utf8");
    $req = "SELECT *  FROM ACTIVITE ACT, ETAT_ACT ETACT WHERE ACT.CODEETATACT= ETACT.CODEETATACT AND ACT.CODEANIM='$cdAnim' AND ETACT.NOMETATACT = 'Disponible'"; //On recupère les animations
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
                $req = "SELECT count(*) AS nbInscrit FROM INSCRIPTION WHERE NOACT='$noAct'"; // On récupère les nombres d'inscrit à l'activité
                $res = mysqli_query($bdd, $req);
                $donnees = mysqli_fetch_assoc($res);
                if ($donnees['nbInscrit'] == $nbrePlace) {
                    $nbrePlace = "Complet";
                } else {
                    $nbrePlace = $nbrePlace - $donnees['nbInscrit'];
                }

                ?>
                <td><?php echo $nbrePlace ?></td>
                <?php

                $req = "SELECT count(*) AS dejaInscrit FROM INSCRIPTION WHERE USER='$user' AND NOACT='$noAct'"; // On regarde si l'utilisateur est déjà inscrit
                $res = mysqli_query($bdd, $req);
                $donnees = mysqli_fetch_assoc($res);

                if ($donnees['dejaInscrit'] == 1) { ?>
                    <td><a href="index.php?page=desinscription&noAct=<?php echo $noAct ?>" class="btn btn-info">se désinscrire</a></td>
                <?php
                } else {
                ?>
                    <td><a href="index.php?page=inscription&noAct=<?php echo $noAct ?>" class="btn btn-info">Inscription</a></td>
                <?php
                }

                if ($_SESSION['TypeUser'] == "AD") { ?>
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
    mysqli_close($bdd);
    ?>