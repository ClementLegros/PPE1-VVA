<link rel="stylesheet" href="style.css">
<?php
//Ce code se déclanche après la supression d'une activité/animation pour voir si cela à fonctionner ou non
if (isset($_GET['reussite'])) {
    $rps = $_GET['reussite'];
    if ($rps == "True") {
        echo '<script type="text/javascript">';
        echo ' alert("Réussite")';
        echo '</script>';
    } else {
        $messageErreur = $_SESSION['erreur'];
        echo '<script type="text/javascript">';
        echo ' alert("Echec")';
        echo '</script>';
    }
}
//Connexion à la base de donnée

$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");
$req = "SELECT * FROM ANIMATION";
$res = mysqli_query($bdd, $req);

?> <div class="card-group"><?php
                            while ($donnees = mysqli_fetch_assoc($res)) {

                                //Asignation des variables
                                $codeAnimation = $donnees['CODEANIM'];
                                $codeTypeAnim = $donnees['CODETYPEANIM'];
                                $nomAnimation = $donnees['NOMANIM'];
                                $dureeAnim = $donnees['DUREEANIM'];
                                $limiteAge = $donnees['LIMITEAGE'];
                                $tarifAnime = $donnees['TARIFANIM'];
                                $nbrPlaceAnim = $donnees['NBREPLACEANIM'];
                                $descriptAnimation = $donnees['DESCRIPTANIM'];
                                $commentAnimation = $donnees['COMMENTANIM'];
                                $difficulteAnimation = $donnees['DIFFICULTEANIM'];
                            ?>
        </br>
        <div class="card-container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $nomAnimation ?></h5>
                    <p class="card-text"> <?php echo $descriptAnimation ?></p>
                    <p>Type d'animation: <?php echo $codeTypeAnim ?></p>
                    <p>Limie d'âge: <?php echo $limiteAge ?> ans</p>
                    <p>Tarif animation: <?php echo $tarifAnime ?>€</p>
                    <p>Nombre de place: <?php echo $nbrPlaceAnim ?> places</p>
                    <p>Difficulté: <?php echo $difficulteAnimation ?></p>
                    <p>Commentaire: <?php echo $commentAnimation ?></p>
                    <a href="index.php?page=activite&cdAnim=<?php echo $codeAnimation ?>&nbrePlace=<?php echo $nbrPlaceAnim ?>" class="btn btn-primary">Voir les activités</a>

                    <?php
                                if ($_SESSION['TypeUser'] == "AD") { ?>
                        <a href="index.php?page=modifierAnimation&cdAnim=<?php echo $codeAnimation ?>" class="btn btn-info">Modifier animation</a>
                        <a href="index.php?page=supprimerAnimation&cdAnim=<?php echo $codeAnimation ?>" class="btn btn-info">Supprimer animation</a>
                    <?php
                                } ?>
                </div>
            </div>
        </div>
    <?php
                            }
    ?>
</div><?php
        mysqli_close($bdd);
        ?>