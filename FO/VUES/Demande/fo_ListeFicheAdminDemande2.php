<?php
//session_start();
if(isset($_SESSION['id'])) {
//		require_once('include/functions.php');
		//Bures Maxence
?>
	<!--<html>-->

	<!--	<body>-->
	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>
		<table class="style1" >
			<tr>
				<th width="5%">Dem</th>
				<th width="5%">Velo</th>
				<th width="5%">Station</th>
				<th width="5%">Attache</th>
				<th width="10%">Date</th>
				<th width="40%">Motif</th>
				<th width="5%">Traite</th>
				<th width="5%">Techn</th>
				<th width="5%">Valide</th>
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
					<td><?php echo substr($demandes["DEMI_DATE"], 2) ; ?></td>
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

		
	<!--</body>-->
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
