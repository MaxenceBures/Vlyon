<?php
if(isset($_SESSION['id'])) {
$id = $_GET['variable'];
modifdemandeint();
$enreg = infosDemande($id);
?>

	<div data-role="page">

	<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a>
	<form id="modif_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type='hidden' name="id" id="id" value='<?php echo($id); ?>'/>
			
		<table class="style1">
			<tr>
				<td>
					<label for="velo">Velo : </label>
				</td>
				<td>
					<input type="text" id="velo" name="velo" disabled="" value="<?php echo($enreg["DEMI_VELO"]); ?>"/>
				</td>
			</tr>
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
					<option value="<?php echo $Station['STA_CODE']; ?>"><?php echo $Station["STA_NOM"] ?> </option>
<?php
					}
?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<label for="attache">N° Attache : </label>
				</td>
				<td>
					<input type="text" required="" id="attache" value="<?php echo($enreg['DEMI_ATTACHE']) ?>" name="attache"/>
				</td>
			</tr>
			<tr>
				<td>
					<label for="motif">Motif : </label>
				</td>
				<td>
					<textarea rows="4" cols="50"id="motif" name="motif"><?php echo($enreg['DEMI_MOTIF']) ?></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="traite">Intervention realise ? </label>
				</td>
				<td>
					<input type="checkbox" id="traite" name="traite"/>
				</td>
			</tr>
		</table>
		<input type="submit" name="go_modifint" id="go_modifint" value="Modifier"/>
	</form>
	
	</div>

<?php
}
else
{
	header('Location:/Vlyon/Pages/connexion.php');
}
?>