<?php
function bddConnect()
{
    $con = mysqli_connect("localhost", "root", "root", "gacti");
    return $con;
}
//Les fonctions suivantes concernes les navbars en fonction du type d'utilisateur
function indexWithoutAnyLogin()
{
    echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php'>Village Vacances Alpes</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php?page=connect'>Login<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
        ";
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'connect':
                include 'connection.htm';
                break;
        }
    }
}

function indexWithAdminLogin()
{
    echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php'>Village Vacances Alpes</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php?page=animation'>Animation<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php?page=indexAjout'>Ajouter<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
            
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='deconnexion.php'>Déconexion<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
        ";
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'modifierActivite':
                include 'modifierActivite';
                break;
            case 'modifierAnimation':
                include 'modifierAnimation.php';
                break;
            case 'animation':
                include 'animation.php';
                break;
            case 'supprimerActivite':
                include 'traitement/trt_supprimerActivite.php';
                break;
            case 'supprimerAnimation':
                include 'traitement/trt_supprimerAnimation.php';
                break;
            case "desinscription":
                include 'traitement/trt_desinscription.php';
            case 'activite':
                include 'activite.php';
                break;
            case 'listerInscrit':
                include 'listerInscrit.php';
                break;
            case 'inscription':
                include 'traitement/trt_inscription.php';
                break;
            case 'indexAjout':
                include 'indexAjout.htm';
                break;
            case 'ajoutAnimation':
                include 'ajoutAnimation.php';
                break;
            case 'ajoutActivite':
                include 'ajoutActivite.php';
                break;
        }
    }
}

function indexWithVacancierLogin()
{
    echo "
        <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php'>Village Vacances Alpes</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarNav'>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php?page=consultAnimActi'>Consultation activité<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='index.php?page=InscriptionActChoixAnim'>Inscription activité<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
            <ul class='navbar-nav'>
                <li class='nav-item active'>
                    <a class='nav-link' href='deconnexion.php'>Déconexion<span class='sr-only'>(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
        ";

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case "consultAnimActi":
                include 'animation.php';
                break;
            case "activite":
                include 'activite.php';
                break;
            case "InscriptionActChoixAnim":
                include 'Utilisateur_InscriptionActi_ChoixAnim.php';
                break;
            case "inscription":
                include 'traitement/trt_inscription.php';
                break;
            case "desinscription":
                include 'traitement/trt_desinscription.php';
                break;
        }
    }
}
