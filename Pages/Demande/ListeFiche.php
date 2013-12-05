<?php
session_start();
if(isset($_SESSION['id'])) {
include('../../include/functions.php');
$id = $_GET['variable'];

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
				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="SuppDem" method="POST">
		<?php
			$demande = listedemande2int($id);
			foreach ($demande as $demandes)			
				{
		?>
				<tr>
					<td><?php echo $demandes["DemI_Num"] ; $code = $demandes["DemI_Num"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
					<td><?php echo $demandes["DemI_Velo"]; ?></td>
					<td><?php echo $demandes["DemI_Station"]; ?></td>
					<td><?php echo $demandes["DemI_Attache"] ; ?></td>
					<td><?php echo $demandes["DemI_Date"] ; ?></td>
					<td><?php echo $demandes["DemI_Motif"] ; ?></td>
					<td><?php echo $demandes["DemI_Traite"] ;?></td>
					<td><a href="FicheSuppression.php?variable=<?php print($demandes["DemI_Num"]) ?>"><input type="button" value="supprimer" onClick="if(confirm('Vous allez supprimer la demande choisie'))
							{
								submit();				
							}
							else
	   						{
	   							return false;
	   						}
							" /></a></td>
					<td><a href="ModifFiche.php?variable=<?php print($demandes["DemI_Num"]) ?>"><input type="button" value="Modification" onClick="if(confirm('Vous allez modifier la demande choisie'))
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
	
	</body>
</html>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>