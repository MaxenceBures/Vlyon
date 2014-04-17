<?php
//session_start();
$id = $_SESSION['id'];
ajoutdem();
//require_once('FO/Modeles/Station/lireVelo.inc.php');
		$lesEtats = getEtats() ;
		//var_dump($lesEtats);die;
$sVelo = $_POST["idVelModif"];
//var_dump($_POST['idVelModif']);
//var_dump($sVelo);
?>

<div data-role="page">
<center>
	<br/>
<form name="frm_SelecModif" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	<table class="style1">
		
			<tr>
				<th colspan="4" class="titre">Selectionnez l'etat du velo
				<td>
					<input type="hidden" name="idVelModif" id="idVelModif" value="<?php echo $_POST['idVelModif']; ?>"/>
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
				<input type="checkbox" id="rad_Intervention" name="rad_Intervention" /> 
				</td>
				<td>Motif: <input type="text" id="motif_Intervention" name="motif_Intervention"/>
			</tr>
			<tr>
			

				<td colspan="5" class="titre">
					<center><input type="submit" src="images/valider.png" name="go_ajout" id="go_ajout" value="Valider" onClick="
					if(confirm('êtes vous sur de vouloir effectuer cette modification?'))
									{	
										submit();
									}
									else{
									return false;
									}
									" /> </center>
				</td>
			</tr>
	</table>
</form>
</div>

<?php

?>