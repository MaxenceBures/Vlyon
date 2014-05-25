<?php
//session_start();
$id = $_SESSION['id'];
modifDemanInter();
//require_once('FO/Modeles/Station/lireVelo.inc.php');
$lesEtats = getEtats() ;
		//var_dump($lesEtats);die;
$sVelo = $_POST["idVelModif"];
//var_dump($_POST['idVelModif']);
//modifdemande();
$requete = "SELECT * FROM DEMANDEINTER where DEMI_NUM= '".$sVelo."'";
$enreg = mysql_fetch_assoc(mysql_query($requete));
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
					<input type="hidden" name="idVelCode" id="idVelCode" value="<?php echo $enreg['DEMI_VELO']; ?>"/>
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
				<td>Motif: <input type="text" id="motif_Intervention" name="motif_Intervention" value="<?php echo ($enreg['DEMI_MOTIF'])?>" />
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