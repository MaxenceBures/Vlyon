<?php
//session_start();
if(isset($_SESSION['id'])) {
//require_once('include/functions.php');
$id = $_GET['variable'];

?>
<html>
	<head>


	</head>
	<body>
	<div data-role="page">
<!--	<body>-->
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
				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="SuppDem" method="POST">
		<?php
			$demande = listedemande2int($id);
			foreach ($demande as $demandes)
				{
		?>
				<tr>
					<td><?php echo $demandes["DEMI_NUM"] ; $code = $demandes["DEMI_NUM"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
					<td><?php echo $demandes["DEMI_VELO"]; ?></td>
					<td><?php echo $demandes["DEMI_STATION"]; ?></td>
					<td><?php echo $demandes["DEMI_ATTACHE"] ; ?></td>
					<td><?php echo $demandes["DEMI_DATE"] ; ?></td>
					<td><?php echo $demandes["DEMI_MOTIF"] ; ?></td>
					<td><?php echo $demandes["DEMI_TRAITE"] ;?></td>
					<td><a href="?page=listeDemandeSupp&variable=<?php print($demandes["DEMI_NUM"]) ?>"><input type="button" value="supprimer" onClick="if(confirm('Vous allez supprimer la demande choisie'))
							{
								submit();
							}
							else
	   						{
	   							return false;
	   						}
							" /></a></td>
					<td><a href="?page=listeDemandeModif&variable=<?php print($demandes["DEMI_NUM"]) ?>"><input type="button" value="Modification" onClick="if(confirm('Vous allez modifier la demande choisie'))
							{
								submit();

							}
							else
	   						{
	   							 return false;
							}
							" /></a></td>
				</tr>
		<?php
				}
		?>
					</form>
			</table>
</div>
<!--	</body>-->
</body>
</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
