<?php
if(isset($_SESSION['id'])) {
//	
	    createint();
	 //Bures Maxence
	?>

	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a>
		<form id="ajout_inter" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<table class="style1">
				<tr>
					<td>
						<label for="velo">Velo : </label>
					</td>
					<td>
						<input type="text" required="" id="velo" name="velo"/>
					</td>
				</tr>
				</br>
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
				</br>
				<tr>
					<td>
						<label for="compterendu">Compte Rendu : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="compterendu" name="compterendu"></textarea>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="reparable">Reparable </label>
					</td>
					<td>
						<input type="checkbox" id="reparable" name="reparable"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="demande">Demande </label>
					</td>
					<td>
						<input type="checkbox" id="demande" name="demande"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="surplace">Sur Place </label>
					</td>
					<td>
						<input type="checkbox" id="surplace" name="surplace"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="duree">Durée </label>
					</td>
					<td>
						<input type="text" required="" id="duree" name="duree"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_createinter" id="go_createinter" value="Creer"/>
		</form>
		<!--	<div data-role="page">-->
		</div>

<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
