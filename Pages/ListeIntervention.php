<?php
session_start();
if(isset($_SESSION['id'])) {
include('../include/functions.php');

?>
<html>
	<head></head>
	<body>
		<a href="../index.php"><img src="../css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		<b>Intervention </b>
			<table border = 1 width="100%" >
				<tr>
					<th width="5%" >Numero</th>
					<th width="13%">Code Velo</th>
					<th width="13%">Date Debut</th>
					<th width="13%">Date Fin</th>
					<th width="13%">Durée</th>
					<th width="13%">Compte Rendu</th>
					<th width="25%">Reparable</th>
					<th width="10%">Technicien</th>
					<th width="10%">Sur Place</th>
					<th width="10%">Durée</th>
					
				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="ListeInt" method="POST">
		<?php
			$liste = listeint();
			foreach ($liste as $listes)			
				{
		?>
				<tr>
					<td><?php echo $listes["BI_Num"]; ?></td>
					<td><?php echo $listes["BI_Velo"]; ?></td>
					<td><?php echo $listes["BI_DatDebut"]; ?></td>
					<td><?php echo $listes["BI_DatFin"] ; ?></td>
					<td><?php echo $listes["BI_CpteRendu"] ; ?></td>
					<td><?php echo $listes["BI_Reparable"] ; ?></td>
					<td><?php echo $listes["BI_Demande"] ;?></td>
					<td><?php echo $listes["BI_Technicien"] ;?></td>
					<td><?php echo $listes["BI_SurPlace"] ;?></td>
					<td><?php echo $listes["BI_Duree"] ;?></td>
					<td><a href="ModifIntervention.php?variable=<?php print($listes["BI_Num"]) ?>"><input type="button" value="Affichage"  /></a></td>		
						
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