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
<form action="traitement/trt_ajoutAnimation.php" method="post">

    <div class="form-group">
        <label for="exampleFormControlInput1">Code animation</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez un code d'animation non existant" name="cdAnim">
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">Code type animation</label>
        <select class='form-control' id='exampleFormControlSelect1' name='cdTypeAnim'>
            <?php
            $req = "SELECT * FROM TYPE_ANIM";
            $res = mysqli_query($bdd, $req);
            while ($donnees = mysqli_fetch_assoc($res)) {
            ?>
                <option> <?php echo $donnees['CODETYPEANIM'] ?> </option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nom de l'animation</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez un nom d'animation" name="nomAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Date création animation</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Entrez la date de création de l'animation" name="dateCreationAnimation" >
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">date validité de l'animation</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Entrez la date de validité de l'animation" name="dateValiditeAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Durée de l'animation</label>
        <input type="numeric" class="form-control" id="exampleFormControlInput1" placeholder="Entrez la durée de l'animation" name="dureeAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Limite d'âge</label>
        <input type="numeric" class="form-control" id="exampleFormControlInput1" placeholder="Entrez la limite d'âge" name="limiteAge">
    </div>

    <div class="numeric">
        <label for="exampleFormControlInput1">Tarif de l'animation</label>
        <input type="numeric" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le tarif de l'animation" name="tarifAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre de place</label>
        <input type="numeric" class="form-control" id="exampleFormControlInput1" placeholder="Entrez le nombre de place" name="nbrPlaceAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Description</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez une description" name="descriptionAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Commentaire</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Entrez un commentaire" name="commentaireAnimation">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Difficulté animation</label>
        <input type="numeric" class="form-control" id="exampleFormControlInput1" placeholder="Entrez une difficulté" name="difficulteAnimation">
    </div>


    <button type="submit" class="btn btn-outline-info">Valider</button>


</form>