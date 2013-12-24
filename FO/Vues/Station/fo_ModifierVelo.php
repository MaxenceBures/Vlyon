<?php
//session_start();
$id = $_SESSION['id'];
//enregistrerBO();
//require_once('FO/Modeles/Station/lireVelo.inc.php');
$lesEtats = getEtats() ;
enregistrerBO();		
		//var_dump($lesEtats);die;
$sVelo = $_POST["idModif"];
//var_dump($sVelo);
?>
<center>
	<br/>
	
	<table border=1 cellspacing=0 cellpadding=7  >
		
			<tr>
				<th colspan="4" class="titre">Selectionnez l'etat du velo
				<td>
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
				</th>
			</tr>
			<tr>
				<td>Intervention?</td>
				<td colspan="3">
				<input type="radio" id="rad_InterventionO" name="rad_Intervention" value="Oui" /> oui
				<input type="radio" id="rad_interventionN" name="rad_Intervention" value="Non" />non
				</td>
				<td>Motif: <input type="text" id="motif_Intervention" name="motif_Intervention"/>
			</tr>
			<tr>
			
		<form name="frm_SelecModif" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" > <!--action="?page=enregistrer_Modif"-->
				<td colspan="5" class="titre">
				<input type="submit" src="images/valider.png" name="go_enregistrer" id="go_enregistrer" value="test" >
					<!--<center><input type="image" src="images/valider.png" name="go_enregistrer" id="go_enregistrer" value="test" onClick="
					if(confirm('êtes vous sur de vouloir effectuer cette modification?'))
									{	
										submit();
									}
									else{
									return false;
									}
									" /> </center>-->
				</td>
			</tr>
		</form>
	</table>
<?php

?>