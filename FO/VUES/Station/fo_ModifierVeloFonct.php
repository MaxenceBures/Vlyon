<?php
$id = $_SESSION['id'];
ajoutDemanInter();
$lesEtats = getEtats() ;
$sVelo = $_POST["idVelModif"];
$enreg = getVeloInfo($sVelo)
?>

<div data-role="page">
	<center>
		<form name="frm_SelecModif" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<table class="style1">
			<tr>
				<th>Effectuer une demande d'intervention</th>
			</tr>
			<tr>	
				<td class="titre">Selectionnez l'etat du velo</td>
				<td>
					
					<input type="hidden" name="idVelCode" id="idVelCode" value="<?php echo $sVelo; ?>"/>
					<input type="hidden" name="idStation" id="idStation" value="<?php echo $enreg["VEL_STATION"]; ?>"/>
					<select name="lst_Modif" size = "1">
			
<?php				
					foreach ($lesEtats as $unEtat) 
					{
?>
					<option value="<?php echo $unEtat["ETA_CODE"] ; ?>"> <?php echo $unEtat["ETA_LIBELLE"] ; ?> </option> 
<?php					
					}	
?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Intervention?</td>
				<td colspan="3"><input type="checkbox" id="rad_Intervention" name="rad_Intervention" /></td>
			</tr>
			<tr>	
				<td>Motif: </td>
				<td><input type="text" id="motif_Intervention" name="motif_Intervention" value="" /></td>
			</tr>
			<tr>
				<td>N° Attache: </td>
				<td><input type="text" id="Attache" name="Attache" value="" /></td>
			</tr>
			<tr>
				<td colspan="5" class="titre"><center><input type="submit" name="go_modif" id="go_modif" value="Valider" onClick="
					if(confirm('êtes vous sur de vouloir effectuer cette modification?'))
									{	
										submit();
									}
									else{
									return false;
									}
									" />
				</td>
			</tr>
		</table>
		</form>
	</center>	
</div>