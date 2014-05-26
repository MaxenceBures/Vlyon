<?php

if(isset($_SESSION['id'])) {

	//Bures Maxence
	$id = $_GET['variable'];
	modifinter();
	$requete = "SELECT * FROM boninterv where BI_NUM= '".$id."'";
	$enreg = mysql_fetch_assoc(mysql_query($requete));
	?>

	<div data-role="page">
	<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
	<form id="modif_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type='hidden' name="id" id="id" value='<?php echo($id); ?>'/>
	<table class="style1">
			<tr>
					<td>
						<label for="numinter">Num Intervention : </label>
					</td>
					<td>
						<input type="text" id="numinter" name="numinter" disabled="" value="<?php echo($enreg["BI_NUM"]); ?>"/>
					</td>
				</tr>

				<tr>
					<td>
						<label for="velo">Velo : </label>
					</td>
					<td>
						<input type="text" id="velo" name="velo" disabled="" value="<?php echo($enreg["BI_VELO"]); ?>"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="dfin">Date Fin: </label>
					</td>
					<td>
						<input type="date" id="dfin" value="<?php echo($enreg['BI_DATFIN']) ?>" name="dfin"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="compterendu">Compte rendu : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="compterendu" name="compterendu"><?php echo($enreg['BI_CPTERENDU']) ?></textarea>
					</td>
				</tr>

				</br>
				<tr>
					<td>
						<label for="reparable">Reparable </label>
					</td>
					<td>
						<input type="checkbox" id="reparable"  value="<?php echo($enreg['BI_REPARABLE']) ?>"name="reparable"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="demande">Demande </label>
					</td>
					<td>
						<input type="checkbox" id="demande"  value="<?php echo($enreg['BI_DEMANDE']) ?>" name="demande"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="surplace">Sur Place </label>
					</td>
					<td>
						<input type="checkbox" value="<?php echo($enreg['BI_SURPLACE'])?>" id="surplace" name="surplace"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="duree">Dur&eacute;e </label>
					</td>
					<td>
						<input type="text" required="" value="<?php echo($enreg['BI_DUREE'])?>" id="duree" name="duree"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_modifint" id="go_modifint" value="Modifier"/>
		</form>
	<!--</body>-->
	</div>

<?php
}
else
{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
