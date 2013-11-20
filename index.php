<?php

    include('./include/functions.php');
    login();

    session_start();
    // Si la variable de session n'existe pas
    if(!isset($_SESSION['id'])) {
        // On redirige l'utilisateur vers une page de login
        header('Location:/Vlyon/Pages/connexion.php');
		die;
    
   
	switch($_GET['page'])
				{
					case "afficherStation":
						$fichier = "FO/Vues/Station/fo_AfficherStation.php" ;
						$titre   = "CréeStation";
						break ;	
					default :
						$fichier = "Pages/accueil.php" ;
						$titre   = "Accueil";
						break;
				}
											
	require_once("mdl/menu.php") ;				
    		echo 'vous etes connectes';
    	
	
	}
		
    else
    {
    		

    ?>	
    	</br><a href="/Vlyon/Pages/deconnexion.php">Se deconnecter</a>
    		
		<?php 
		}
		include($fichier);
	
?>