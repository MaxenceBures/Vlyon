<?php
//session_start();
//include('../../../include/connexion.inc.php');
include('../../../include/functions.inc.php');
//connect();
//$per_page = 5;

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
/*$start = ($page-1)*$per_page;
$sql = "    SELECT BI_NUM, BI_VELO, BI_DATDEBUT, BI_DATFIN, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_CPTERENDU, BI_TECHNICIEN
                FROM BONINTERV  limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);*/
?>
<!--<div data-role="page">
<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>-->

<b>Intervention </b>
			<table class="style1">
				<tr>
					<th width="5%">Numero</th>
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
					<td><?php echo substr($listes["BI_DATDEBUT"], 5); ?></td>
					<td><?php echo substr($listes["BI_DATFIN"], 5) ; ?></td>
					<td><?php echo $listes["BI_DUREE"] ;?></td>
					<td><?php echo $listes["BI_CPTERENDU"] ; ?></td>
					<td><?php echo $listes["BI_REPARABLE"] ; ?></td>
					<td><?php echo $listes["BI_DEMANDE"] ;?></td>
					<td><?php echo $listes["BI_TECHNICIEN"] ;?></td>
					<td><?php echo $listes["BI_SURPLACE"] ;?></td>
					<td><a href="?page=ModifInter&variable=<?php print($listes["BI_NUM"]); ?>"><input type="image" src="./images/para.png" value="Voir" width="30" height="30"></a></td><!--<input type="button" value="Voir"  />-->

				</tr>
		<?php
				}
		?>
					</form>
			</table>

