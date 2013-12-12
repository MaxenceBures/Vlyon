
<?php
	require_once ("../../../FO/Modeles/Station/InfoStation.inc.php") ;
	$sStation = $_GET['variable'];
?>	
	<fieldset>
		<legend> Suivi des stations </legend>
		<br/>
		<table border =1 width="100%" >
		
				tableau des velos ayant besoin d'une intervention
		
			<tr>
				<th width="33%" >Code Velo</th>
				<th width="33%">Etat du Velo</th>
				<th width="34%">Intervention</th>
				<th width="25%">Modification</th>
			</tr>
			<form  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
<?php			
			$lesInfos  = getAllInfo($sStation) ;
			 //var_dump($lesInfos);die;
			foreach($lesInfos as $uneInfo)
			{
			
			
			
?>	
				<tr>
					<td><?php echo $uneInfo["VEL_NUM"] ; $code1=$uneInfo["VEL_NUM"];  ?></td>
					<td><?php echo $uneInfo["VEL_ETAT"]; ?></td>
					<td><?php echo $uneInfo["DEMI_MOTIF"]; ?></td>
					<td colspan="1" >
						<!-- action="?page=AfficherModif" -->
							<input type="text" disabled="" name="idModif" id="idModif" value="<?php echo $code1; ?>"/>
							<a href="fo_modifierVelo.php?variable=<?php print($code1); ?>"><input type="submit" name="cmd_Modif" id="cmd_Modif" value="Modifier" onClick="submit" 	/>
						</a>
					</td>
				</tr>
				</form>
<?php
			}
?>
		</table>
		<table border =1 width="100%" >
		
		tableau des velos en etat
		
		<tr>
			<th width="48%" >Code Velo</th>
			<th width="48%">Etat du Velo</th>
			<th width="4%">Modification</th>
			</tr>
<?php			
			$lesInfosE  = getAllInfoE($sStation) ;
			// var_dump($lesInfosE);die;
			foreach($lesInfosE as $uneInfoE)
			{
?>	
				<tr>
					<td><?php echo $uneInfoE["VEL_NUM"] ; $code=$uneInfoE["VEL_NUM"] ?></td>
					<td><?php echo $uneInfoE["VEL_ETAT"]; ?></td>
					<td colspan="1" >
							<form action="?page=AfficherModif" method="POST">
								<input type="text" disabled="" name="idModif" value="<?php echo $code; ?>"/>
								<input type="submit" name="cmd_Modif" id="cmd_Modif" value="Modifier" onClick="submit"	/>
							</form>
					</td>
				</tr>
<?php
			}
?>
		</table>

	</fieldset>
