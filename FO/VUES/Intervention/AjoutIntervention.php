<?php
//session_start();
if(isset($_SESSION['id'])) {
//		require_once('include/functions.php');
	    createint();
	 //Bures Maxence
	?>

	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
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
					<label for="db">Date Debut : </label>
				</td>
				<td>
					<input type="date" id="db" name="db"/>
				</td>
				</tr>
				<tr>
					<td>
						<label for="df">Date Fin : </label>
					</td>
					<td>
						<input type="date" id="df"  name="df"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="cr">Compte Rendu : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="cr" name="cr"></textarea>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="rp">Reparable </label>
					</td>
					<td>
						<input type="checkbox" id="rp" name="rp"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="de">Demande </label>
					</td>
					<td>
						<input type="checkbox" id="de" name="de"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="sp">Sur Place </label>
					</td>
					<td>
						<input type="checkbox" id="sp" name="sp"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="dr">Durée </label>
					</td>
					<td>
						<input type="text" required="" id="dr" name="dr"/>
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
