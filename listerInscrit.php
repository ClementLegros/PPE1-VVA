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
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=GACTI;charset=utf8', 'root', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $noAct = $_GET['noAct'];
        $reponse = $bdd->query("SELECT * FROM INSCRIPTION I, COMPTE C WHERE I.USER = C.USER AND NOACT = '$noAct' ");
        while ($donnees = $reponse->fetch()) {
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
        $reponse->closeCursor();
        ?>
    </tbody>
</table>