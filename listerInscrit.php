<p>
    Voici les personnes inscrite à l'activité que vous avez séléctionner !
</p>

<table class="table">
    <thead>
        <tr>
            <th scope="col">No Compte</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
        </tr>
    </thead>


    <tbody>
        <?php
        
        $noAct = $_GET['noAct'];
        $bdd = bddConnect();
        mysqli_set_charset($bdd, "utf8");
        $req = "SELECT * FROM INSCRIPTION I, COMPTE C WHERE I.USER = C.USER AND NOACT = '$noAct'";
        $res = mysqli_query($bdd, $req);

        while ($donnees = mysqli_fetch_assoc($res)) {
            $user = $donnees['USER'];
            $nomCompte = $donnees['NOMCOMPTE'];
            $prenomCompte = $donnees['PRENOMCOMPTE'];
            echo "
        <tr>
            <th scope='row'>$user</th>
            <td>$nomCompte</td>
            <td>$prenomCompte</td>
        </tr>";
        }
        mysqli_close($bdd);
        ?>
    </tbody>
</table>