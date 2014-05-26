<?php

if(isset($_SESSION['id'])) {

	    createdemandeint();
	    
	//Bures Maxence
	?>
	
		<div data-role="page">
<!--	<body>-->
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		<form id="ajout_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			<table class="style1">
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
					<option value="<?php echo $Station['STA_CODE']; ?>"><?php echo $Station["STA_NOM"] ?> </option>
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

	<!--</body>-->
	</div>
	

<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
