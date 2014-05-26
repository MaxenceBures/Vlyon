<?php
include('../../../include/functions.inc.php');
if($_GET)
{
	$page=$_GET['page'];
}
?>

<b>Demande d'intervention </b>

	<table  class="style1">
		<tr>
			<th width="5%">Dem</th>
			<th width="5%">Velo</th>
			<th width="5%">Station</th>
			<th width="5%">Date</th>
			<th width="5%"></th>
		</tr>
			<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="AfficheDem" method="POST">
<?php
			$rsd = pagination_DemandeListe($page);
			while($demandes = mysql_fetch_array($rsd))
			{
?>

		<tr >
			<td><?php echo $demandes["DEMI_NUM"] ; $code = $demandes["DEMI_NUM"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
			<td><?php echo $demandes["DEMI_VELO"]; ?></td>
			<td><?php echo $demandes["STA_NOM"]; ?></td>
			<td><?php echo datefr($demandes['DEMI_DATE']); ?></td>
			<td><a href="?page=listeDemandeFiche&variable=<?php print($demandes["DEMI_NUM"]) ?>"><img value="Voir" width="30" height="30" src="images/vue.png"/></a></td>
		</tr>

<?php
			}
?>
			</form>
	</table>