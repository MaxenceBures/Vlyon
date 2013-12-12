<?php
 session_start();
    include('./include/functions.php');
    login();


    // Si la variable de session n'existe pas
    if(!isset($_SESSION['id'])) {
        // On redirige l'utilisateur vers une page de login
        // header('Location:Pages/connexion.php');
        include_once('Pages/connexion.php');
		die;

   }
   else
   {

   	?>
    <head>
    <script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
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
			default :
				$fichier = "Pages/accueil.php" ;
				$titre   = "Accueil";
				break;


		}

	require_once("mdl/menu.php") ;
    		echo 'vous etes connectes';


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
	<nav id="nav"><ul>
<?php
	if($resp == '1') {
?>
		<li><a href="Pages/Demande/listeficheAdmin.php">Liste Demande</a></li>
		<li><a href="Pages/Intervention/listeIntervention.php">Liste Intervention</a></li>
	<?php
	} else {
?>
    	<li><a href="Pages/Demande/Liste.php">Liste Demande</a></li>
    <?php }  ?>
    	<li><a href="FO/VUES/Station/fo_AfficherStation.php">Afficher les Stations</a></li>
    	<li><a href="Pages/Demande/ficheajout.php">Ajout Demande</a></li>
    	<li><a href="Pages/Intervention/AjoutIntervention.php">Ajout Intervention</a></li>
		<li><a href="FO/VUES/Produit/fo_commanderProduit.php">Commander Produit</a></li>
		<li><a href="FO/VUES/Produit/fo_listeCommandePdt.php">Liste Commande</a></li>
    	<li><a href="Pages/deconnexion.php">Se deconnecter</a></li>

    </ul>
    </nav>
    </div>
    </body>
		<?php
		}
		include($fichier);

?>
