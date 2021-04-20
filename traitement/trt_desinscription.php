<?php
ini_set('display_errors', 'on');

var_dump($_GET);
//récupération des variables
$noAct = $_GET['noAct'];
$user = $_SESSION['User'];

//Connection à la base de données
$bdd = bddConnect();
mysqli_set_charset($bdd, "utf8");
$req = "DELETE FROM INSCRIPTION WHERE USER = '$user' AND NOACT = '$noAct'";
if($res = mysqli_query($bdd, $req))
{
    header('location:index.php?page=animation&reussite=True');
    mysqli_close($bdd);
}
else
{
    header('location:index.php?page=animation&reussite=False');
    mysqli_close($bdd);
}
?>
