<?php
//session_start();

		//require_once('../include/functions.inc.php');
	    createdemandeint();
	//Bures Maxence
	?>
	<html>
		<head>
		<!--	<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<meta name="viewport" content="width=device-width, initial-scale=1"/> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" /> <!-- Ne gene pas l'execution de la sidebar-->
	<!--<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script> 
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>-->
		</head>
	<body>
		<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
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

	</body>
	</html>
