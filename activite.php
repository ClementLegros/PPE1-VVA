<?php
$user = $_SESSION['User'];
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
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
        $reponse = $bdd->query("SELECT * FROM ACTIVITE WHERE CODEANIM = $cdAnim ");
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    while ($ligne = $reponse->fetch()) {
        $noAct = $ligne['NOACT'];
        $codeAnim = $ligne['CODEANIM'];
        $codeEtatAct = $ligne['CODEETATACT'];
        $dateAct = $ligne['DATEACT'];
        $hrRdvAct = $ligne['HRRDVACT'];
        $hrDebutAct = $ligne['HRDEBUTACT'];
        $hrFinAct = $ligne['HRFINACT'];
        $dateAnulAct = $ligne['DATEANNULEACT'];
        $prenomResp = $ligne['PRENOMRESP'];
        $nomResp = $ligne['NOMRESP'];
        $tarifAct = $ligne['PRIXACT'];
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
                try {
                    $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
                    $reponse = $bdd->query("SELECT count(*) AS dejaInscrit FROM INSCRIPTION WHERE USER='$user' AND NOACT='$noAct'");
                    $donnees = $reponse->fetch();
                } catch (Exception $e) {
                    die('Erreur : ' . $e->getMessage());
                }
                if ($donnees['dejaInscrit'] == 1) {?>
                    <td><a href="index.php?page=desinscription&noAct=<?php echo $noAct ?>" class="btn btn-info">se désinscrire</a></td>
                    <?php
                }
                else{
                    ?>
                    <td><a href="index.php?page=inscription&noAct=<?php echo $noAct ?>" class="btn btn-info">Inscription</a></td>
                    <?php
                }
                $reponse->closeCursor();
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
    $reponse->closeCursor();
    ?>