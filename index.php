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
   ?>	
<html>
	<head>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
	</head>
	<body>
		<div id="header" class="skel-panels-fixed">
			<div id="logo">
							<span class="image avatar48"><img src="images/avatar.jpg" alt="" /></span>
							<h1 id="title"><?php echo($_SESSION['id']) ?></h1>
							<span class="byline">Hyperspace Engineer</span>
			</div>	
			<div class="top">
			</br>
			</br>
			</br>
			</br>
			    <nav id="nav">
				    <ul>
				    	<li><a href="/Vlyon/Pages/listefiche.php" ><span class="fa fa-home">liste demande</span></a></li>
				    	<li><a href="/Vlyon/Pages/listeficheAdmin.php"><span class="fa fa-th">liste demande Admin</span></a></li>
				    	<li><a href="/Vlyon/Pages/ficheajout.php"><span class="fa fa-user">Ajout demande</span></a></li>
				    	<li><a href="/Vlyon/Pages/deconnexion.php"><span class="fa fa-envelope">Se deconnecter</span></a></li>
				    </ul>
				    </nav>
			</div>
			</div>
			<?php
    require_once("mdl/menu.php") ;				
    		echo 'vous etes connectes';

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

	
    	



		}
		include($fichier);
	
?>
    	
    </body>	
    