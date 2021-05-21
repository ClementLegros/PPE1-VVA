<table class="table">
    <thead>
        <tr>
            <th scope="col">Numéro d'inscription</th>
            <th scope="col">Date d'inscription</th>
            <th scope="col">Date d'annulation</th>
            <th scope="col">Possibilité d'annulation</th>
        </tr>
    </thead>


    <tbody>

        <?php

        $idInscription = $_POST['noInscription'];
        $user = $_SESSION['User'];
        $peutDesinscrire = true;

        $bdd = bddConnect();
        mysqli_set_charset($bdd, "utf8");
        /*Récupération des infos sur l'inscription*/

        $req = "SELECT * FROM INSCRIPTION WHERE NOINSCRIP='$idInscription' AND USER = '$user'";
        $res = mysqli_query($bdd, $req);
        $donnees = mysqli_fetch_assoc($res);

        $dateActuel = date("y.m.d");
        $dateAnnulAct = $donnees['DATEANNULE'];

        $dateInscription = $donnees['DATEINSCRIP'];
        $noAct = $donnees['NOACT'];
        $dtActuelle = strtotime($dateActuel);
        $dateAnnul = strtotime($dateAnnulAct);

        if ($dtActuelle > $dateAnnul) {
            $peutDesinscrire = false;
        }

        echo "
        <tr>
            <th scope='row'>$idInscription</th>
            <td>$dateInscription</td>
            <td>$dateAnnulAct</td>";
        if ($peutDesinscrire) {
        ?><td><a href="index.php?page=desinscriptiontrt&noAct=<?php echo $noAct ?>" class="btn btn-info">se désinscrire</a></td><?php
                                                                                                                            } else {
                                                                                                                                echo "<td> Désinscription impossible</td>";
                                                                                                                            }
                                                                                                                            echo "</tr>";

                                                                                                                            mysqli_close($bdd);

                                                                                                                                ?>
    </tbody>
</table>