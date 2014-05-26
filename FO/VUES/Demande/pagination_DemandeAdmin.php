<?php
include('../../../include/functions.inc.php');

if($_GET)
{
$page=$_GET['page'];
}

?>


	<b>Demande d'intervention </b>
		<table class="style1" >
			<tr>
				<th width="5%">Dem</th>
				<th width="5%">Velo</th>
				<th width="5%">Station</th>
				<th width="5%">Attache</th>
				<th width="10%">Date</th>
				<th width="40%">Motif</th>
				<th width="5%">Traite</th>
				<th width="5%">Techn</th>
				<th width="5%">Valide</th>
			</tr>
<?php
			$rsd = pagination_DemandeAdminListe($page);
			while($demandes = mysql_fetch_array($rsd))
			{
?>
			<tr>
				<td><?php echo $demandes["DEMI_NUM"] ;  ?></td>
				<td><?php echo $demandes["DEMI_VELO"]; ?></td>
				<td><?php echo $demandes["STA_NOM"]; ?></td>
				<td><?php echo $demandes["DEMI_ATTACHE"] ; ?></td>
				<td><?php echo substr($demandes["DEMI_DATE"], 2) ; ?></td>
				<td><?php echo $demandes["DEMI_MOTIF"] ; ?></td>
				<td><?php if($demandes["DEMI_TRAITE"] == 0){echo "non";}else{echo"oui";} ;?></td>
				<td><?php echo $demandes["TEC_NOM"] ;?></td>
				<td><?php if($demandes["DEMI_VALIDE"] == 0){echo "non";}else{echo"oui";} ;?></td>
			</tr>
<?php
			}
?>
	</table>

