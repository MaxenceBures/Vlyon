<?php
	//include("Modeles/Produit/lireProduit.inc.php");
?>
<html>
	<head>

   <!-- <script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
		<!--	<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />--!>
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

</head>
	<body>
	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		<table class="style1">
			<tr>
				<th width="5%" >Numéro Commande</th>
				<th width="5%" >Code Produit</th>
				<th width="13%">Libelle Produit</th>
				<th width="13%">Quantité</th>
				<th width="13%">Date Commande</th>
				<th width="20%">Validé</th>
			</tr>
			<?php
			$uneCommande = getAllCommandes();
			foreach ($uneCommande as $demandes)
				{

			?>

			<tr>
				<td><?php echo $demandes["COM_CODE"] ; $code = $demandes["COM_CODE"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
				<td><?php echo $demandes["COM_PRODUIT"] ;  ?></td>
				<td><?php echo $demandes["PDT_LIBELLE"]; ?></td>
				<td><?php echo $demandes["COM_QTE"] ; ?></td>
				<td><?php echo substr($demandes["COM_DATE"],5) ; ?></td>
				<td><?php echo $demandes["COM_VALIDE"] ;?></td>
				<td><a href="?page=CommandeModif&variable=<?php echo($demandes["COM_CODE"]) ?>"><input type="button" value="Modification" onClick="if(confirm('Vous allez modifier la commande choisie ?'))
					{
						submit();
					}
					else
					{
						return false;
					}
				" /></a></td>
			</tr>
			<?php
			}

			?>
		</table>
	<!--	</div>-->
	<!--</body>-->
</html>
