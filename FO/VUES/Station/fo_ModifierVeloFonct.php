<?php
//session_start();
$id = $_SESSION['id'];
ajoutDemanInter();
//require_once('FO/Modeles/Station/lireVelo.inc.php');
$lesEtats = getEtats() ;
		//var_dump($lesEtats);die;
$sVelo = $_POST["idVelModif"];

var_dump($_POST['idVelModif']);
//modifdemande();
$requete = "SELECT * FROM VELO where VEL_NUM= '".$sVelo."'";
$enreg = mysql_fetch_assoc(mysql_query($requete));
//echo ($enreg["VEL_STATION"]);
?>

<div data-role="page">
<center>
	<br/>
<form name="frm_SelecModif" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
	<table class="style1">
		
			<tr>
				<th colspan="4" class="titre">Selectionnez l'etat du velo
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
				</th>
			</tr>
			<tr>
				<td>Intervention?</td>
				<td colspan="3">
				<input type="checkbox" id="rad_Intervention" name="rad_Intervention" /> 
				</td>
				<td>Motif: <input type="text" id="motif_Intervention" name="motif_Intervention" value="" />
			</tr>
			<tr>
				<td>N° Attache: <input type="text" id="Attache" name="Attache" value="" />
			</tr>
			<tr>
			

				<td colspan="5" class="titre">
					<center><input type="submit" name="go_modif" id="go_modif" value="Valider" onClick="
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

<?php

?>