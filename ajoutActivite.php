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
        echo ' alert("Echec : la clé primaire est peut être existante ou un champs à mal été rempli !")';
        echo '</script>';
    }
}
?>
<form action="traitement/trt_ajoutActivite.php" method="post">

    <div class="form-group">
        <label for="exampleFormControlInput1">Numéro de l'activité</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez un numéro d'activité" name="noAct">
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
            $req = "SELECT * FROM CODEETATACT";
            $res = mysqli_query($bdd, $req);
            while ($donnees = mysqli_fetch_assoc($res)) {
            ?>
                <option> <?php echo $donnees['CODEETATAC'] ?> </option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Date activité</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Entrez la date de l'activité" name="dateActivite" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heure RDV activité</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Entrez l'heure de RDV de l'activité" name="heureRDV">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Prix de l'activité</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le prix de l'activité" name="prixAct">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heure début de l'activité</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Entrez l'heure de début de l'activité" name="heureDBT">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Heure fin de l'activité</label>
        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Entrez l'heure de fin de l'activité" name="heureFIN">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Date d'annulation de l'activité</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Entrez une date d'annulation de l'activité" name="dtAnnulActivite">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nom du résponsable</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le nom du responsable" name="nomResp">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Prénom du résponsable</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez une difficulté" name="prenomResponsable">
    </div>


    <button type="submit" class="btn btn-outline-info">Valider</button>


</form>