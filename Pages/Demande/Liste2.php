<?php
session_start();
if(isset($_SESSION['id'])) {
require_once('../../include/functions.php');		
// Bures Maxence
?>
<html>
	<head>
		<script src="../../bootstrap/js/bootstrap.js"></script>
		<script src="../../bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../../bootstrap/css/bootstrap-responsive.css" />


			<!--<link rel="stylesheet" href="../../css/style-mobile.css" />
			
			<!--<link rel="stylesheet" href="../../css/style-wide.css" />-->
		
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

	</head>
	<body>
	<a href="../../index.php"><img src="../../css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>
			
			<table border = 1  >
				<tr>
					<th width="5%" >Code Dem</th>
					<th width="5%">Code Velo</th>
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
					<td><?php echo $demandes["DEMI_DATE"]; ?></td>
					<td><a href="ListeFiche.php?variable=<?php print($demandes["DEMI_NUM"]) ?>"><input type="button" value="Affichage"  /></a></td>		
				</tr>
				
		<?php
				}
		?>	
					</form>
			</table>
			
			</br><a href="/Vlyon/Pages/Demande/ficheajout.php">Ajout demande</a>
			
	</body>
</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
