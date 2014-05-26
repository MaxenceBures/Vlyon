<?php
ajoutCommande();
?>
	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a>
		<h1><b>Commande produit</b></h1>
		<form name="frm_cdeProduit" data-ajax="false" id="frm_cdeProduit" method="POST" action="">
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
	</div>