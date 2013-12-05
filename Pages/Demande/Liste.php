<?php
session_start();
if(isset($_SESSION['id'])) {
include('../../include/functions.php');		
?>
<html>
	<head>
	<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script language="JavaScript">


if (screen.width > 1000){
	
	<link rel="stylesheet" href="../../css/style-desktop.css" />
}
if (screen.width < 1000){
	
	<link rel="stylesheet" href="../../css/style-mobile.css" />
}
</script>
			<link rel="stylesheet" href="../../css/style.css" />
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
					<td><?php echo $demandes["DemI_Num"] ; $code = $demandes["DemI_Num"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
					<td><?php echo $demandes["DemI_Velo"]; ?></td>
					<td><?php echo $demandes["DemI_Station"]; ?></td>
					<td><?php echo $demandes["DemI_Date"]; ?></td>
					<td><a href="ListeFiche.php?variable=<?php print($demandes["DemI_Num"]) ?>"><input type="button" value="Affichage"  /></a></td>		
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