<?php
if(isset($_SESSION['id'])) {
    createint();
?>

	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width="42" height="42"></img></a>
		<form id="ajout_inter" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<table class="style1">
				<th colspan="4">Ajout d'une intervention</th>
				<tr>
					<td>
						<label for="Velo">Velo : </label>
					</td>
					<td>
						<select id="velo" required="" name="velo">
<?php
						$oVelo = getAllVelo() ;
						foreach ($oVelo as $Velo)
						{
?>
						<option value="<?php echo $Velo['VEL_NUM']; ?>"><?php echo $Velo["VEL_NUM"] ?> </option>
<?php
						}
?>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						<label for="ddebut">Date Debut : </label>
					</td>
					<td>
						<input type="date" id="ddebut" name="ddebut"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="dfin">Date Fin : </label>
					</td>
					<td>
						<input type="date" id="dfin"  name="dfin"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="compterendu">Compte Rendu : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="compterendu" name="compterendu"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label for="reparable">Reparable </label>
					</td>
					<td>
						<input type="checkbox" id="reparable" name="reparable"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="demande">Demande </label>
					</td>
					<td>
						<input type="checkbox" id="demande" name="demande"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="surplace">Sur Place </label>
					</td>
					<td>
						<input type="checkbox" id="surplace" name="surplace"/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="duree">Dur&eacute;e </label>
					</td>
					<td>
						<input type="text" required="" id="duree" name="duree"/>
					</td>
				</tr>
			</table>
			<input type="submit" name="go_createinter" id="go_createinter" value="Creer"/>
		</form>
		
		</div>

<?php
}
else
{
	header('Location:/Vlyon/Pages/connexion.php');
}
?>