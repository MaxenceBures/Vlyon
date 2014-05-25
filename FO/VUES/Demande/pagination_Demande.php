<?php

include('../../../include/functions.inc.php');


if($_GET)
{
$page=$_GET['page'];
}




?>
<!--<div data-role="page">
<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>-->

<b>Demande d'intervention </b>

			<table  class="style1">

				<tr>
					<th width="5%">Dem</th>
					<th width="5%">Velo</th>
					<th width="5%">Station</th>
					<th width="5%">Date</th>
					<th width="5%">Test</th>
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
					<td><?php echo substr($demandes["DEMI_DATE"], 5); ?></td>
					<td><a href="?page=listeDemandeFiche&variable=<?php print($demandes["DEMI_NUM"]) ?>"><input type="image" value="Voir" width="30" height="30" src="images/vue.png"/></a></td>
				</tr>

		<?php
				}
		?>
					</form>
			</table>

