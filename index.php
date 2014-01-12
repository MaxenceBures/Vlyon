<?php
 	session_start();
 	/**
 	 * @todo mettre ici un include
 	 *       du fichier function connexion bdd
 	 *       et virer les autres dans le code
 	 */

	include_once('classe/clstBaseMysql.classe2.php') ;
	//require_once('include/connexion.inc.php');
	require_once('include/functions.inc.php');

	/**
	 * @todo ce truc la est un peu bof,
	 *       faut le passer dans connexion.inc
	 */
	login();

	// Si la variable de session n'existe pas
	if(!isset($_SESSION['id'])) {
		// On affiche une page de login
		include_once('Pages/connexion.php');
		//die();// on stop le chargement de la page
   }
   else{
?>
<html>
	<head>

	<link rel="stylesheet" href="css/jquery.css" />
    <script src="js/jquery.js"></script>
    <script src="js/jquery-mobile.js"></script>
    <script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
	<script src="js/init.js"></script>
	<link rel="stylesheet" href="css/style.css" />
	</head>

	
	<body class="left-sidebar">
		<div id="content">
			<div id="content-inner">
				<!-- Post -->
				<article class="is-post is-post-excerpt">
					<?php
					if(!isset($_GET['page']))
						$_GET['page'] = null;

					switch($_GET['page'])
					{

						case "formulaire":
							$fichier = "Test/formulaire.php";
							$titre   =  "test";
							break ;
						case "tableau":
							$fichier = "Test/tableau.php";
							$titre   =  "test";
							break ;	
						case "listeDemande":
							$fichier = "Pages/Demande/Liste.php";
							$titre   =  "Liste";
							break ;
						case "listeAjout":
							$fichier = "Pages/Demande/FicheAjout.php";
							$titre   =  "ListeAjout";
							break ;	
						case "listeDemandeFiche":
							$fichier = "Pages/Demande/ListeFiche.php";
							$titre   =  "ListeFiche";
							break ;
						case "listeDemandeModif":
							$fichier = "Pages/Demande/ModifFiche.php";
							$titre   =  "ListeModif";
							break ;
						case "listeDemandeSupp":
							$fichier = "Pages/Demande/FicheSuppression.php";
							$titre   =  "ListeSuppresion";
							break ;			
						case "listeIntervention":
							$fichier = "Pages/Intervention/listeIntervention.php";
							$titre   =  "listeIntervention";
							break ;
						case "InterventionAjout":
							$fichier = "Pages/Intervention/AjoutIntervention.php";
							$titre   =  "InterventionAjout";
							break ;	
						case "ListeDemandeAdmin":
							$fichier = "Pages/Demande/listeficheAdmin.php";
							$titre   =  "ListeAdmin";
							break ;
						case "FicheAjout":
							$fichier = "Pages/Demande/ficheajout.php";
							$titre   =  "FicheAjout";
							break ;
						case "CommandeProd":
							$fichier = "FO/VUES/Produit/fo_commanderProduit.php";
							$titre   =  "CommandeProd";
							break ;
						case "CommandeListe":
							$fichier = "FO/VUES/Produit/fo_listeCommandePdt.php";
							$titre   =  "CommandeListe";
							break ;
						case "CommandeModif":
							$fichier = "FO/VUES/Produit/ModifCommande.php";
							$titre   =  "CommandeModif";
							break ;	
						case "enregistrer_Modif":
							$fichier = "FO/Modeles/Station/fo_EnregistrerModif.inc.php";
							$titre   = "Enregistrer une modification";
							break;
						case "AfficherModif":
							$fichier = "FO/Vues/Station/fo_ModifierVelo.php";
							$titre   = "Modifer un velo";
							break;
						case "AfficherInfo":
							$fichier = "FO/VUES/Station/fo_InformationStation.php" ;
							$titre   = "InfoStation";
							break ;
						case "afficherStation":
							$fichier = "FO/VUES/Station/fo_AfficherStation.php" ;
							$titre   = "CréeStation";
							break ;
						case "ModifInter":
							$fichier = "Pages/Intervention/ModifIntervention.php" ;
							$titre   = "ModifInter";
							break ;	
						case "Deconnexion":
							$fichier = "Pages/deconnexion.php" ;
							$titre   = "Deconnexion";
							break ;
						case "Accueil":
							$fichier = "Pages/accueil.php" ;
							$titre   = "Deconnexion";
							break ;		
						default :
							$fichier = "Pages/accueil.php" ;
							$titre   = "Accueil";
							break;
					}

						include($fichier);
					?>
				</article>
			</div>
		</div>
		<div id="sidebar">
			<div id="logo">
				<?php
				$utilisateur =utilisateur();
					foreach ($utilisateur as $utilisateurs)
				{
					echo strtoupper($utilisateurs["TEC_NOM"]);
					echo" - ";
					echo strtoupper($utilisateurs["TEC_PRENOM"]);
					$resp = $utilisateurs["TEC_RESPONSABLE"];
				}
				?>



			</div>
			<nav id="nav">
				<ul>
					<?php
					if($resp == '1')
					{
						/**
						 * @todo virer les xxx/xxx/xxx.zz et utiliser des ?page=action
						 */
						?>
						<li><a href="?page=ListeDemandeAdmin">Liste Demande</a></li>
						<li><a href="?page=listeIntervention">Liste Intervention</a></li>
						<?php
					}
					else
					{
						?>
						<li><a href="?page=listeDemande">Liste Demande</a></li>
						<?php
					}
					?>
					<li><a href="?page=afficherStation">Afficher les Stations</a></li>
					<li><a href="?page=FicheAjout">Ajout Demande</a></li>
					<li><a href="?page=InterventionAjout">Ajout Intervention</a></li>
					<li><a href="?page=CommandeProd">Commander Produit</a></li>
					<li><a href="?page=CommandeListe">Liste Commande</a></li>
					<li><a href="Pages/deconnexion.php">Se deconnecter</a></li>
					<li><a href="?page=formulaire">Formulaire</a></li>
					<li><a href="?page=tableau">Tableau</a></li>
					<li><a href="Test/test.php">Test</a></li>
					</ul>
			</nav>
		</div>
	</body>
</html>
<?php

}
?>