<?php
session_start();
if(isset($_SESSION['id'])) {
	require_once('../../include/functions.php');
	connect();
	//Bures Maxence
	$id = $_GET['variable'];
	modifdemandeint();
	$requete = "SELECT * FROM demandeinter where DemI_NUM= '".$id."'";                
	$enreg = mysql_fetch_assoc(mysql_query($requete));
	?>
	<html><body>
	<a href="../../index.php"><img src="../../css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
	<form id="modif_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type='hidden' name="id" id="id" value='<?php echo($id); ?>'/>
			<table>
				<tr>
					<td>
						<label for="velo">Velo : </label>
					</td>
					<td>
						<input type="text" id="velo" name="velo" disabled="" value="<?php echo($enreg["DemI_Velo"]); ?>"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
					<label for="Station">Station : </label>
					</td>
					<td>
					<select id="station" required="" name="station">
				<?php
				$oStation = ListeDeroulanteStation() ;
				foreach ($oStation as $Station)
				{
	?>
					<option value="<?php echo $Station['Sta_Code']; ?>"><?php echo $Station["Sta_Nom"] ?> </option>
	<?php	
				}
	?>
					</select>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="attache">N° Attache : </label>
					</td>
					<td>
						<input type="text" required="" id="attache" value="<?php echo($enreg['DemI_Attache']) ?>" name="attache"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="motif">Motif : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="motif" name="motif"><?php echo($enreg['DemI_Motif']) ?></textarea>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="traite">Intervention realise ? </label>
					</td>
					<td>
						<input type="checkbox" id="traite" name="traite"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_modifint" id="go_modifint" value="Modifier"/>
		</form>
	</body></html>
<?php
}	
else
{
header('Location:/Vlyon/Pages/connexion.php');
}
?>