<?php
session_start();
$id = $_SESSION['id'];

require_once("FO/Modeles/Station/lireVelo.inc.php");
require_once("FO/Modeles/Station/fo_EnregistrerModif.inc.php");
test();
		$lesEtats = getEtats() ;
		//var_dump($lesEtats);die;
$sVelo = $_GET['variable'];
//$sVelo = $_POST["idModif"];
//var_dump($sVelo);
?>
<center>
	<br/>

	<input type="hidden" id="sVelo" name="sVelo" value="<?php echo($sVelo); ?>" />
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
			<form name="frm_SelecModif" method="POST" action="FO/Modeles/Station/fo_EnregistrerModif.inc.php" >
			<tr>
				<td>Intervention?</td>
				<td colspan="3">
				<input type="radio" id="rad_InterventionO" name="rad_Intervention" value="Oui" /> oui
				<input type="radio" id="rad_interventionN" name="rad_Intervention" value="Non" />non
				</td>
				<td>Motif: <input type="text" id="motif_Intervention" name="motif_Intervention"/>
			</tr>
			<tr>
			<td><a href="FO/Modeles/Station/fo_EnregistrerModif.inc.php"><input type="button" value="Affichage"  name="go_modifint" id="go_modifint"  /></a></td>


				<td colspan="5" class="titre">
					<center><input type="image" src="images/valider.png" name="cmd_valider" value="Valider" onClick="
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
		</form>
	</table>
<?php
//<action="?page=enregistrer_Modif">
?>
