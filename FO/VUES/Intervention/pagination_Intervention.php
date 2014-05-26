<?php
include('../../../include/functions.inc.php');

if($_GET)
{
	$page=$_GET['page'];
}
?>

	<b>Intervention </b>
		<table class="style1">
			<tr>
				<th width="5%">Num</th>
				<th width="5%">Velo</th>
				<th width="8%">Debut</th>
				<th width="8%">Fin</th>
				<th width="5%">Durée</th>
				<th width="15%">Compte Rendu</th>
				<th width="5%">Rep</th>
				<th width="5%">Dem</th>
				<th width="5%">Tech</th>
				<th width="5%">Sur Place</th>
			</tr>
				<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="ListeInt" method="POST">
<?php
				$rsd = pagination_InterventionListe($page);
				while($listes = mysql_fetch_array($rsd))
				{
?>
			<tr>
				<td><?php echo $listes["BI_NUM"]; ?></td>
				<td><?php echo $listes["BI_VELO"]; ?></td>
				<td><?php echo datefr($listes["BI_DATDEBUT"]); ?></td>
				<td><?php echo datefr($listes["BI_DATFIN"]) ; ?></td>
				<td><?php echo $listes["BI_DUREE"] ;?></td>
				<td><?php echo substr($listes["BI_CPTERENDU"], 0, 15);if(strlen($listes["BI_CPTERENDU"]) > 15){echo " ...";}; ?></td>
				<td><?php if($listes["BI_REPARABLE"] == 0){echo "non";}else{echo"oui";} ; ?></td>
				<td><?php if($listes["BI_DEMANDE"] == 0){echo "non";}else{echo"oui";} ;?></td>
				<td><?php echo $listes["TEC_NOM"] ;?></td>
				<td><?php if($listes["BI_SURPLACE"] == 0){echo "non";}else{echo"oui";} ;?></td>
				<td><a href="?page=ModifInter&variable=<?php print($listes["BI_NUM"]); ?>"><input type="image" src="./images/modif.png" value="Voir" width="30" height="30"></a></td><!--<input type="button" value="Voir"  />-->
			</tr>
<?php
				}
?>
				</form>
		</table>