<?php

    include('./include/functions.php');
    login();

    session_start();
    // Si la variable de session n'existe pas
    if(!isset($_SESSION['id'])) {
        // On redirige l'utilisateur vers une page de login
        header('Location:/Vlyon/Pages/connexion.php');
    }
    else
    {
    		echo 'vous etes connectes';
    ?>		</br>
    		
    		<a href="/Vlyon/Pages/deconnexion.php">Se deconnecter</a>
    <?php }
 
?>