<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Village Vacances Alpes</title>
</head>
<body>
    
    <?php
        ini_set('display_errors', 'off'); 
        include("fonction.php");
        session_start();
        if($_SESSION['TypeUser'] == "AD" or $_SESSION['TypeUser']== "US")
        {
            if($_SESSION['TypeUser'] == "AD")
            {
                indexWithAdminLogin();
            }
            else
            {
                indexWithVacancierLogin();
            }

        }
        else
        {

            indexWithoutAnyLogin();            
        }
    ?>
    


</body>
</html>