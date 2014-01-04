<?php
//session_start();
if(isset($_SESSION['id'])) {
//require_once('include/functions.inc.php');
// Bures Maxence
?>
<html>
	<head>
	<!--<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	-->	</head>
	<body>
	<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention - Test Tableau JQ </b>

			<table border = 1  >
				<tr>
					<th width="5%">Dem</th>
					<th width="5%">Velo</th>
					<th width="5%">Sta</th>
					<th width="5%">Date</th>
					<th width="5%">Test</th>
				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="AfficheDem" method="POST">
		<?php
			$demande = listedemandeint() ;
			foreach ($demande as $demandes)
				{
		?>

				<tr >
					<td><?php echo $demandes["DEMI_NUM"] ; $code = $demandes["DEMI_NUM"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
					<td><?php echo $demandes["DEMI_VELO"]; ?></td>
					<td><?php echo $demandes["DEMI_STATION"]; ?></td>
					<td><?php echo substr($demandes["DEMI_DATE"], 5); ?></td>
					<td><a href="?page=listeDemandeFiche&variable=<?php print($demandes["DEMI_NUM"]) ?>"><input type="button" value="Affichage"  /></a></td>
				</tr>

		<?php
				}
		?>
					</form>
			</table>

			</br><a href="?page=listeAjout">Ajout demande</a></br>
		

	</body>
</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
