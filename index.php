<?php
    session_start();
    include('./include/functions.php');
    login();


    // Si la variable de session n'existe pas
    if(!isset($_SESSION['id'])) {
        // On redirige l'utilisateur vers une page de login
        header('Location:/Vlyon/Pages/connexion.php');
		die;
    
   }
   else
   {
		switch($_GET['page'])
		{
			case "afficherStation":
				$fichier = "FO/Vues/Station/fo_AfficherStation.php" ;
				$titre   = "CréeStation";
				break ;	
			case "commanderProduit":
				$fichier = "FO/Vues/Produit/fo_commanderProduit.php";
				$titre   = "Commander un produit";
				break;
			case "cdeProduit":
				$fichier = "FO/Modeles/Produit/ajouterCommande.inc.php";
				break;
			case "listeCommande":
				$fichier = "FO/Vues/Produit/fo_listeCommandePdt.php";
				$titre   = "Liste des commandes";
				break;
			case "ajouterInterv":
				$fichier = "FO/Vues/Intervention/fo_ajouterInterv.php";
				$titre   = "Ajouter une intervention";
				break;
			default :
				$fichier = "Pages/accueil.php" ;
				$titre   = "Accueil";
				break;
		}

	require_once("mdl/menu.php") ;				
    		echo 'vous etes connectes';
    	


    ?>	
    	</br><a href="/Vlyon/Pages/listefiche.php">liste demande</a>
    	</br><a href="/Vlyon/Pages/listeficheAdmin.php">liste demande Admin</a>
    	</br><a href="/Vlyon/Pages/ficheajout.php">Ajout demande</a>
    	</br><a href="/Vlyon/Pages/deconnexion.php">Se deconnecter</a>
    		
		<?php 
		}
		include($fichier);
	
?>