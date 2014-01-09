<?php
//session_start();
if(isset($_SESSION['id'])) {
require_once('include/functions.inc.php');
// Bures Maxence
?>
<html>
	<head>
	<!--<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script language="JavaScript">


if (screen.width > 1000){

	//<link rel="stylesheet" href="css/style-desktop.css" />
}
if (screen.width < 1000){

	//<link rel="stylesheet" href="css/style-mobile.css" />
}
</script> -->
			
			<!--<link rel="stylesheet" href="css/style-mobile.css" />

			<!--<link rel="stylesheet" href="css/style-wide.css" />-->

		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

	</head>
	<body>
	<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>

			<table  class="style1">
 >
				<tr>
					<th width="5%">Dem</th>
					<th width="5%">Velo</th>
					<th width="5%">Station</th>
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
