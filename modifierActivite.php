<?php
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");
if (isset($_GET['reussite'])) {
    $rps = $_GET['reussite'];
    if ($rps == "True") {
        echo '<script type="text/javascript">';
        echo ' alert("Réussite")';
        echo '</script>';
    } else {
        $messageErreur = $_SESSION['erreur'];
        echo '<script type="text/javascript">';
        echo ' alert("Echec : Une activité est peut être déjà existante sur cette journée, ou un champs à mal été remplis, ou une activité à déjà la même clé primaire !")';
        echo '</script>';
    }
}

//Récupération des variables

$noAct = $_GET['noAct'];
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");
$req = "SELECT * FROM ACTIVITE WHERE NOACT = $noAct";
$res = mysqli_query($bdd, $req);
$donnees = mysqli_fetch_assoc($res);

$cdAnim = $donnees['CODEANIM'];
$cdEtatAct = $donnees['CODEETATACT'];
$dtAct = $donnees['DATEACT'];
$heureRdvAct = $donnees['HRRDVACT'];
$prixAct = $donnees['PRIXACT'];
$heureDebutAct = $donnees['HRDEBUTACT'];
$heureFinAct = $donnees['HRFINACT'];
$dateAnulAct = $donnees['DATEANNULEACT'];
$nomResp = $donnees['NOMRESP'];
$prenomResp = $donnees['PRENOMRESP'];

?>
<form action="traitement/trt_modifierActivite.php" method="post">

    <div class="form-group">
        <label for="exampleFormControlInput1">Numéro de l'activité</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez un numéro d'activité" name="noAct" value="<?php echo $noAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Code animation</label>
        <select class='form-control' id='exampleFormControlSelect1' name='cdAnim'>
            <?php
            $req = "SELECT * FROM ANIMATION";
            $res = mysqli_query($bdd, $req);
            while ($donnees = mysqli_fetch_assoc($res)) {
            ?>
                <option> <?php echo $donnees['CODEANIM'] ?> </option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Code état activité</label>
        <select class='form-control' id='exampleFormControlSelect1' name='cdEtatAct'>
            <?php
            $req = "SELECT * FROM ETAT_ACT";
            $res = mysqli_query($bdd, $req);
            while ($donnees = mysqli_fetch_assoc($res)) {
            ?>
                <option> <?php echo $donnees['CODEETATACT'] ?> </option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Date activité</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Entrez la date de l'activité" name="dateActivite" value="<?php echo $dtAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heure RDV activité</label>
        <input type="time" step="1" class="form-control" id="exampleFormControlInput1" placeholder="Entrez l'heure de RDV de l'activité" name="heureRDV" value="<?php echo $heureRdvAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Prix de l'activité</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le prix de l'activité" name="prixAct" value="<?php echo $prixAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heure début de l'activité</label>
        <input type="time" step="1" class="form-control" id="exampleFormControlInput1" placeholder="Entrez l'heure de début de l'activité" name="heureDBT" value="<?php echo $heureDebutAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heure fin de l'activité</label>
        <input type="time" step="1" class="form-control" id="exampleFormControlInput1" placeholder="Entrez l'heure de fin de l'activité" name="heureFIN" value="<?php echo $heureFinAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Date d'annulation de l'activité</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Entrez une date d'annulation de l'activité" name="dtAnnulActivite" value="<?php echo $dateAnulAct ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nom du résponsable</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le nom du responsable" name="nomResponsable" value="<?php echo $nomResp ?>">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Prénom du résponsable</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez une difficulté" name="prenomResponsable" value="<?php echo $prenomResp ?>">
    </div>


    <button type="submit" class="btn btn-outline-info">Valider</button>


</form>
<?php
mysqli_close($bdd);
?>