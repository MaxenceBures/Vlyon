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
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<style type="text/css">
/* G - Black Sidebar Theme for jQuery Mobile
 * Available on: https://gist.github.com/4558649
-----------------------------------------------------------------------------------------------------------*/
.ui-bar-g{border:1px solid #666;background:#444;color:#ccc;font-weight:bold;text-shadow:0 -1px 1px #000;background-image:-webkit-gradient(linear,left top,left bottom,from(#555),to(#444));background-image:-webkit-linear-gradient(#555,#444);background-image:-moz-linear-gradient(#555,#444);background-image:-ms-linear-gradient(#555,#444);background-image:-o-linear-gradient(#555,#444);background-image:linear-gradient(#555,#444)}.ui-bar-g,.ui-bar-g input,.ui-bar-g select,.ui-bar-g textarea,.ui-bar-g button{font-family:Helvetica,Arial,sans-serif}.ui-bar-g .ui-link-inherit{color:#fff}.ui-bar-g a.ui-link{color:#7cc4e7;font-weight:bold}.ui-bar-g a.ui-link:visited{color:#2489ce}.ui-bar-g a.ui-link:hover{color:#2489ce}.ui-bar-g a.ui-link:active{color:#2489ce}.ui-body-g,.ui-overlay-g{border:1px solid #444;background:#333;color:#fff;text-shadow:0 1px 1px #111;font-weight:normal}.ui-overlay-g{background-image:none;border-width:0}.ui-body-g,.ui-body-g input,.ui-body-g select,.ui-body-g textarea,.ui-body-g button{font-family:Helvetica,Arial,sans-serif}.ui-body-g .ui-link-inherit{color:#fff}.ui-body-g .ui-link{color:#2489ce;font-weight:bold}.ui-body-g .ui-link:visited{color:#2489ce}.ui-body-g .ui-link:hover{color:#2489ce}.ui-body-g .ui-link:active{color:#2489ce}.ui-btn-up-g{border:1px solid #111;background:#333;font-weight:bold;color:#eee;text-shadow:0 1px 1px #111}.ui-btn-up-g:visited,.ui-btn-up-g a.ui-link-inherit{color:#eee}.ui-btn-hover-g{border:1px solid #000;background:#2e2e2e;font-weight:bold;color:#eee;text-shadow:0 1px 1px #111}.ui-btn-hover-g:visited,.ui-btn-hover-g:hover,.ui-btn-hover-g a.ui-link-inherit{color:#eee}.ui-btn-down-g{border:1px solid #000;background:#222;font-weight:bold;color:#eee;text-shadow:0 1px 1px #111}.ui-btn-down-g:visited,.ui-btn-down-g:hover,.ui-btn-down-g a.ui-link-inherit{color:#eee}.ui-btn-up-g,.ui-btn-hover-g,.ui-btn-down-g{font-family:Helvetica,Arial,sans-serif;text-decoration:none}.ui-btn-up-g .ui-btn-inner,.ui-btn-hover-g .ui-btn-inner,.ui-btn-down-g .ui-btn-inner{border-top:1px solid #fff;border-color:rgba(255,255,255,.15)}
</style>
    <link rel="stylesheet" href="Test/jquery.css" />
    <script src="Test/jquery.js"></script>
    <script src="Test/jquery-mobile.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/skel.min.js"></script>
	<script src="js/skel-panels.min.js"></script>
	<script src="js/init.js"></script>
	<!--<script src="js/jquery.js"></script>-->
	<!--	<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
<!--<meta name="viewport" content="width=device-width, initial-scale=1"/> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->

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