<?php
//session_start();
if(isset($_SESSION['id'])) {
//		require_once('include/functions.php');
		//Bures Maxence
?>
	<!--<html>-->
	<head>
	</head>
	<body>
	<!--	<body>-->
	<div data-role="page">
		<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>
		<table class="style1" >
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
		</div>
		</body>
		
	<!--</body>-->
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
