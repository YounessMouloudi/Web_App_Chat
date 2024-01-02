<?php

include "../Model/Utilisateur.php";

session_start();

if(isset($_SESSION['utilisateur'])) {

    $utilisateur = $_SESSION['utilisateur'];
    echo "
    <div class='pt-4 pb-2 px-4 d-flex align-items-center justify-content-between'>
        <p class='mt-2 fs-5'>
            Bienvenue 
            <span class='text-primary text-capitalize fw-bold'> ".$utilisateur->getNom()."</span>
        </p>
        <a class='btn btn-md btn-info' href='../Controller/Controller.php?action=logout'>Déconnexion</a>
    </div>";
} 
else {
    header('location: login.php');
}

// hadi drnaha f lwel hit makanch 3ndna Controller mnin drnah mab9inach m7tajinha
// // echo 'Bienvenue '.$utilisateur;
// // echo '</br><a href="login.php">Déconnexion</a>';
?>