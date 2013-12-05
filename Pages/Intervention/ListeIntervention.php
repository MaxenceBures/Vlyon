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
		
			
			<link rel="stylesheet" href="../../css/style.css" />
			<link rel="stylesheet" href="../../css/style-mobile.css" />
			<link rel="stylesheet" href="../../css/style-desktop.css" />
			<link rel="stylesheet" href="../../css/style-wide.css" />
		
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

	</head>
	<body>
		<a href="../../index.php"><img src="../../css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Intervention </b>
			<table border = 1 width="100%" >
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
					<td><?php echo $listes["BI_Num"]; ?></td>
					<td><?php echo $listes["BI_Velo"]; ?></td>
					<td><?php echo $listes["BI_DatDebut"]; ?></td>
					<td><?php echo $listes["BI_DatFin"] ; ?></td>
					<td><?php echo $listes["BI_Duree"] ;?></td>
					<td><?php echo $listes["BI_CpteRendu"] ; ?></td>
					<td><?php echo $listes["BI_Reparable"] ; ?></td>
					<td><?php echo $listes["BI_Demande"] ;?></td>
					<td><?php echo $listes["BI_Technicien"] ;?></td>
					<td><?php echo $listes["BI_SurPlace"] ;?></td>
					<td><a href="ModifIntervention.php?variable=<?php print($listes["BI_Num"]) ?>"><input type="button" value="Modifier"  /></a></td>		
						
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