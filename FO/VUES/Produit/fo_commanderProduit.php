<?php
	//require_once ("FO/Modeles/Produit/lireProduit.inc.php") ;
ajoutCommande();
?>
<html>
	<head>
  <!--  <script src="js/jquery.min.js"></script>
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
	<body>
		<a href="index.php"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		<form name="frm_cdeProduit" id="frm_cdeProduit" method="POST" action="">
			<select id="lst_produit" name="lst_produit">
	<?php
				$lesProduits = getAllProduits() ;
				foreach ($lesProduits as $unProduit)
				{
	?>
					<option value="<?php echo $unProduit['PDT_CODE']; ?>"><?php echo $unProduit["PDT_LIBELLE"] ?> </option>
	<?php
				}
	?>
			</select>
			<input type="number" id="txt_qte" name="txt_qte" placeholder="Quantite"/>
			<input type="submit" name="go_ajoutcde" id="go_ajoutcde" value="Valider">
		</form>
	</body>
</html>
