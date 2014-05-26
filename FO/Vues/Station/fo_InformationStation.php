
<?php
	$sStation = $_GET['idStation'];
?>

<div data-role="page">
	<fieldset>
		<h1><b> Suivi des stations </b></h1>
		<br/>
		<table class="style1">
		
				<th colspan="4">Tableau des velos faisant l'objet d'une demande d'intervention</th>
		
			<tr>
				<th width="33%" >Code Velo</th>
				<th width="33%">Etat du Velo</th>
				<th width="34%">Intervention</th>
				<th width="25%">Modification</th>
			</tr>
<?php			
			$lesInfos  = getAllInfo($sStation) ;
			foreach($lesInfos as $uneInfo)
			{
			
			
			
?>	
				<tr>
					
					<td><?php echo $uneInfo["VEL_NUM"] ;?></td>
					<td><?php echo $uneInfo["ETA_LIBELLE"]; ?></td>
					<td><?php echo $uneInfo["DEMI_MOTIF"]; ?></td>
					<td colspan="1" >
						<form action="?page=AfficherModif" method="POST">
							<input type="hidden" name="idDem" id="idDem" value="<?php echo $uneInfo["DEMI_NUM"]; ?>"/>

							<input type="image" src="./images/modif.png" name="cmd_Modif" id="cmd_Modif" value="Modifier" style="width:40px;height:40px;" onClick="submit" 	/>
						</form>
					</td>
				</tr>
<?php
			}
?>
		</table>
		</br>
		<table class="style1">
		
		<th colspan="4">Tableau des velos ne faisant pas l'objet d'une demande</th>
		
		<tr>
			<th width="48%" >Code Velo</th>
			<th width="48%">Etat du Velo</th>
			<th width="4%">Modification</th>
			</tr>
<?php			
			$lesInfosE  = getAllInfoE($sStation) ;
			foreach($lesInfosE as $uneInfoE)
			{
?>	
				<tr>
					<td><?php echo $uneInfoE["VEL_NUM"]; ?></td>
					<td><?php echo $uneInfoE["ETA_LIBELLE"]; ?></td>
					<td colspan="1" >
							<form action="?page=AfficherVelo" method="POST">
								<input type="hidden" name="idVelModif" id="idVelModif" value="<?php echo $uneInfoE["VEL_NUM"]; ?>"/>
								<input type="image" name="cmd_Modif" src="./images/modif.png" style="width:40px;height:40px;" id="cmd_Modif" value="Modifier" onClick="submit"	/>
							</form>
					</td>
				</tr>
<?php
			}
?>
		</table>

	</fieldset>
	</div>
