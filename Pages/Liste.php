<?php
session_start();
if(isset($_SESSION['id'])) {
include('../include/functions.php');
		
?>
<html>
	<head></head>
	<body>
		<b>Demande d'intervention </b>
			<table border = 1 width="100%" >
				<tr>
					<th width="5%" >Code Dem</th>
					<th width="13%">Code Velo</th>
					<th width="13%">Station</th>
					<th width="13%">Date</th>
					<th width="13%">Test</th>
				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="AfficheDem" method="POST">
		<?php
			$demande = listedemandeint() ;
			foreach ($demande as $demandes)			
				{
		?>
				<tr>
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
	</body>
</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>