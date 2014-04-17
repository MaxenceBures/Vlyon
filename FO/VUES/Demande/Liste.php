<?php
//session_start();
if(isset($_SESSION['id'])) {
//require_once('include/functions.inc.php');
// Bures Maxence
?>
	<body>
	<div data-role="page">
	<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>

			<table  class="style1">
 
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
		

<!--</div>-->
</div>
</body>
</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
