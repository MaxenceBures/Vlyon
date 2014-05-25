<?php
 	session_start();
 	/**
 	 * @todo mettre ici un include
 	 *       du fichier function connexion bdd
 	 *       et virer les autres dans le code
 	 */

	include_once('classe/clstBaseMysql.classe.php') ;
	//require_once('include/connexion.inc.php');
	require_once('include/functions.inc.php');

	/**
	 * @todo ce truc la est un peu bof,
	 *       faut le passer dans connexion.inc
	 */
	login();
?>
<meta charset="UTF-8">
<?php
	// Si la variable de session n'existe pas
	if(!isset($_SESSION['id'])) {
		// On affiche une page de login
		include_once('Pages/connexion.php');
		//die();// on stop le chargement de la page
   }
   else{

					if(!isset($_GET['page']))
						$_GET['page'] = null;

					switch($_GET['page'])
					{

						/*case "formulaire":
							$fichier = "Test/formulaire.php";
							$titre   =  "test";
							break ;
						case "tableau":
							$fichier = "Test/tableau.php";
							$titre   =  "test";
							break ;	*/
						case "listeDemande":
							$fichier = "FO/VUES/Demande/fo_ListeDemande.php";
							$titre   =  "Liste";
							break ;
						case "listeAjout":
							$fichier = "FO/VUES/Demande/fo_AjoutDemande.php";
							$titre   =  "ListeAjout";
							break ;	
						case "listeDemandeFiche":
							$fichier = "FO/VUES/Demande/fo_ListeFicheDemande.php";
							$titre   =  "ListeFiche";
							break ;
						case "listeDemandeModif":
							$fichier = "FO/VUES/Demande/fo_ModifFicheDemande.php";
							$titre   =  "ListeModif";
							break ;
						case "listeDemandeSupp":
							$fichier = "FO/VUES/Demande/fo_SuppFicheDemande.php";
							$titre   =  "ListeSuppresion";
							break ;			
						case "listeIntervention":
							$fichier = "FO/VUES/Intervention/fo_ListeIntervention.php";
							$titre   =  "listeIntervention";
							break ;
						case "InterventionAjout":
							$fichier = "FO/VUES/Intervention/fo_AjoutIntervention.php";
							$titre   =  "InterventionAjout";
							break ;	
						case "ListeDemandeAdmin":
							$fichier = "FO/VUES/Demande/fo_ListeFicheAdminDemande.php";
							$titre   =  "ListeAdmin";
							break ;
						case "FicheAjout":
							$fichier = "FO/VUES/Demande/fo_AjoutDemande.php";
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
							$fichier = "FO/VUES/Produit/fo_modifCommande.php";
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
						case "AfficherVelo":
							$fichier = "FO/Vues/Station/fo_ModifierVeloFonct.php";
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
							$fichier = "FO/VUES/Intervention/fo_ModifIntervention.php" ;
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
						include 'html/header.php';
						include($fichier);
						include 'html/footer.php';
					

}
?>