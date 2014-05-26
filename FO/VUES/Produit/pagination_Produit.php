<?php

include('../../../include/functions.inc.php');


if($_GET)
{
$page=$_GET['page'];
}




?>
<!--<div data-role="page">
<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>-->

	<table width="800px" class="style1">
	<th colspan="4">Liste produits</th>
<tr>
<th width="5%" >Num Comm</th>
<th width="20%">Libel</th>
<th width="13%">Quantit&eacute;</th>
<th width="13%">Date Commande</th>
<th width="20%">Valid&eacute;</th>
<th width="10%"></th>
</tr>
		<?php
		//Print the contents
	//	$lesDemandes  =  testpagination($page) ;
	//		foreach($lesDemandes as $demandes)
$rsd = pagination_ProduitListe($page);
		while($demandes = mysql_fetch_array($rsd))
		{
			
			$id=$demandes["COM_CODE"];
            $msg=$demandes["COM_PRODUIT"];

		?>
<tr>
<td><?php echo $demandes["COM_CODE"] ; $code = $demandes["COM_CODE"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
<td><?php echo $demandes["PDT_LIBELLE"]; ?></td>
<td><?php echo $demandes["COM_QTE"] ; ?></td>
<td><?php echo datefr($demandes["COM_DATE"]) ; ?></td>
<td><?php  if($demandes["COM_VALIDE"] == 0){echo "non";}else{echo"oui";} ;?></td>
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

