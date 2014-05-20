<?php

include('../../../include/connexion.inc.php');
connect();
$per_page = 5;

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
$sql = "select * from COMMANDE, PRODUIT WHERE COM_PRODUIT = PDT_CODE  limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);
?>
<!--<div data-role="page">
<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>-->

	<table width="800px" class="style1">
<tr>
<th width="5%" >Numéro Commande</th>
<th width="5%" >Code Produit</th>
<th width="13%">Libelle Produit</th>
<th width="13%">Quantité</th>
<th width="13%">Date Commande</th>
<th width="20%">Validé</th>
</tr>
		<?php
		//Print the contents
		
		while($demandes = mysql_fetch_array($rsd))
		{
			
			$id=$demandes['COM_CODE'];
            $msg=$demandes['COM_PRODUIT'];

		?>
<tr>
<td><?php echo $demandes["COM_CODE"] ; $code = $demandes["COM_CODE"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
<td><?php echo $demandes["COM_PRODUIT"] ;  ?></td>
<td><?php echo $demandes["PDT_LIBELLE"]; ?></td>
<td><?php echo $demandes["COM_QTE"] ; ?></td>
<td><?php echo substr($demandes["COM_DATE"],5) ; ?></td>
<td><?php echo $demandes["COM_VALIDE"] ;?></td>
<td><a href="?page=CommandeModif&variable=<?php echo($demandes["COM_CODE"]) ?>"><input type="image" src="./images/modif.png" height="30" width="30" value="Voir" onClick="if(confirm('Vous allez modifier la commande choisie ?'))
{
    submit();
}
else
{
    return false;
}
" /></a></td>
		<?php
		} //while
		?>
	</table>

