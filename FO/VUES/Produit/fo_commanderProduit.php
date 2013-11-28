<?php
	require_once ("FO/Modeles/Produit/lireProduit.inc.php") ;
?>
	<form name="frm_cdeProduit" id="frm_cdeProduit" method="POST" action="?page=cdeProduit">
		<select id="lst_produit" name="lst_produit">
<?php
			$lesProduits = getAllProduits() ;
			foreach ($lesProduits as $unProduit)
			{
?>
				<option value="<?php echo $unProduit['Pdt_Code']; ?>"><?php echo $unProduit["Pdt_Libelle"] ?> </option>
<?php	
			}
?>
		<input type="text" id="txt_qte" name="txt_qte" placeholder="Quantite"/>
		</select>
		<input type="submit" id="cmd_valider" name="cmd_valider" value="Valider">
	</form>