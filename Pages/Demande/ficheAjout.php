<?php
session_start();
if(isset($_SESSION['id'])) {
		require_once('../../include/functions.php');
	    createdemandeint();
	//Bures Maxence
	?>
	<html>
		<head>
		</head>
	<body>
		<a href="../../index.php"><img src="../../css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<form id="ajout_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<table>
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
						<input type="text" id="attache" required="" name="attache"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="motif">Motif : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="motif" name="motif"></textarea>
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
						<input type="submit" name="go_createint" id="go_createint" value="Creer"/>
		</form>
	</body>
	</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
