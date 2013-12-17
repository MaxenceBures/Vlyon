<?php
//session_start();
if(isset($_SESSION['id'])) {
//		require_once('include/functions.php');
		//Bures Maxence
?>
	<html>
	<head>
	<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>


			<!--<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-mobile.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />--!>

		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

	</head>
		<body>
		<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>
		<table border = 1 width="100%" >
			<tr>
				<th width="5%" >Code Dem</th>
				<th width="13%">Code Velo</th>
				<th width="13%">Station</th>
				<th width="13%">Attache</th>
				<th width="13%">Date</th>
				<th width="13%">Motif</th>
				<th width="20%">Traite</th>
				<th width="13%">Technicien</th>
				<th width="13%">Valide</th>
			</tr>
	<?php


	$demande = listedemandeintAdmin() ;
			foreach ($demande as $demandes)
			{
	?>
				<tr>
					<td><?php echo $demandes["DEMI_NUM"] ;  ?></td>
					<td><?php echo $demandes["DEMI_VELO"]; ?></td>
					<td><?php echo $demandes["DEMI_STATION"]; ?></td>
					<td><?php echo $demandes["DEMI_ATTACHE"] ; ?></td>
					<td><?php echo $demandes["DEMI_DATE"] ; ?></td>
					<td><?php echo $demandes["DEMI_MOTIF"] ; ?></td>
					<td><?php echo $demandes["DEMI_TRAITE"] ;?></td>
					<td><?php echo $demandes["DEMI_TECHNICIEN"] ;?></td>
					<td><?php echo $demandes["DEMI_VALIDE"] ;?></td>
				</tr>
	<?php
			}
	?>
		</table>
	</body>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
