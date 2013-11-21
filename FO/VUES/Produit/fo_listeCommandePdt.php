<?php
	require_once("FO/Modeles/Produit/lireProduit.inc.php");
?>

	<table border = 1 width="100%" >
		<tr>
			<th width="5%" >Code Produit</th>
			<th width="13%">Libelle Produit</th>
			<th width="13%">Quantité</th>
			<th width="13%">Date Commande</th>
			<th width="20%">Validé</th>
		</tr>
<?php
		$lesCommandes = getAllCommandes() ;
		foreach ($lesCommandes as $uneCommande)			
		{
?>
			<tr>
				<td><?php echo $uneCommande["Com_Produit"] ;  ?></td>
				<td><?php echo $uneCommande["Pdt_Libelle"]; ?></td>
				<td><?php echo $uneCommande["Com_Qte"] ; ?></td>
				<td><?php echo $uneCommande["Com_Date"] ; ?></td>
				<td><?php echo $uneCommande["Com_Valide"] ;?></td>
			</tr>
<?php
		}
?>
	</table>