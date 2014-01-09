<?php
//session_start();
if(isset($_SESSION['id'])) {
//require_once('include/functions.php');
//Bures Maxence
?>
<html>
	<head>
	</head>
	<body>
		<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Intervention </b>
			<table class="style1">
				<tr>
					<th width="5%" >Numero</th>
					<th width="13%">Code Velo</th>
					<th width="13%">Date Debut</th>
					<th width="13%">Date Fin</th>
					<th width="13%">Durée</th>
					<th width="25%">Compte Rendu</th>
					<th width="10%">Reparable</th>
					<th width="10%">Demande</th>
					<th width="10%">Technicien</th>
					<th width="10%">Sur Place</th>


				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="ListeInt" method="POST">
		<?php
			$liste = listeint();
			foreach ($liste as $listes)
				{
		?>
				<tr>
					<td><?php echo $listes["BI_NUM"]; ?></td>
					<td><?php echo $listes["BI_VELO"]; ?></td>
					<td><?php echo $listes["BI_DATDEBUT"]; ?></td>
					<td><?php echo $listes["BI_DATFIN"] ; ?></td>
					<td><?php echo $listes["BI_DUREE"] ;?></td>
					<td><?php echo $listes["BI_CPTERENDU"] ; ?></td>
					<td><?php echo $listes["BI_REPARABLE"] ; ?></td>
					<td><?php echo $listes["BI_DEMANDE"] ;?></td>
					<td><?php echo $listes["BI_TECHNICIEN"] ;?></td>
					<td><?php echo $listes["BI_SURPLACE"] ;?></td>
					<td><a href="?page=ModifInter&variable=<?php print($listes["BI_NUM"]); ?>"><input type="button" value="Modifier"  /></a></td>

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
