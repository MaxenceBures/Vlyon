<?php
$id = $_SESSION['id'];
modifDemanInter();
$lesEtats = getEtats() ;
$iddem = $_POST["idDem"];
$enreg = getUneDemande($iddem);
?>

<div data-role="page">
	
		<form name="frm_SelecModif" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
			<input type="hidden" name="idVelModif" id="idVelModif" value="<?php echo $_POST['idVelModif']; ?>"/>
			<input type="hidden" name="idVelCode" id="idVelCode" value="<?php echo $sVelo; ?>"/>
				<table class="style1">
					<th>Modifier une demande d'intervention</th>
					<tr>
						<td>Selectionnez l'etat du velo</td>
						<td>
							<select name="lst_Modif" size = "1">
			
<?php		
							foreach ($lesEtats as $unEtat) 
							{
?>
							<option value="<?php echo $unEtat["ETA_CODE"] ; ?>"> <?php echo $unEtat["ETA_LIBELLE"] ; ?></option> 
<?php					
							}
?>
		        		  </select>
						</td>
					</tr>
					<tr>
						<td>Intervention?</td>
						<td><input type="checkbox" id="rad_Intervention" name="rad_Intervention" /></td>
					</tr>
					<tr>
						<td>Motif: </td>
						<td><input type="text" id="motif_Intervention" name="motif_Intervention" value="<?php echo ($enreg['DEMI_MOTIF'])?>" /></td>
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
									" /></center>
						</td>
					</tr>
				</table>
		</form>
</div>