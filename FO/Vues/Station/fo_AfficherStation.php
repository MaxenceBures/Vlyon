<?php
//require_once ("FO/Modeles/Station/AfficherStation.inc.php") ;
//require_once("../../../include/connexion.inc.php");
//connecter();
?>

	<fieldset>
		<head><!--
	<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>


			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-mobile.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-wide.css" />

		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->

	</head>
	<body>
	<div data-role="page">
	<a href="index.php"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		
		<legend> Suivi des stations </legend>
		<br/>

		<table class="style1">
			<tr>
				<th width="55%" >Quartier</th>
				<th width="40%">Station</th>
				<th width="15%">Information</th>
			</tr>
<?php
			$lesStations  = getAllStation() ;
			foreach($lesStations as $uneStation)
			{

?>
					<tr>
						<td><?php echo $uneStation["QUA_LIB"] ;  ?></td>
						<td><?php echo $uneStation["STA_CODE"]; ?></td>
						<td colspan="1" >
							<form action="?page=AfficherInfo&amp;idStation=<?php echo $uneStation["STA_CODE"]; ?>" method="POST">
								
								<input type="submit" name="cmd_Inf" id="cmd_Inf" value="Information" onClick="
									if(confirm('Vous allez consulter les informations concernant les stations'))
									{
										submit()
									}
									else{
									return false;
									}
									"/>
							</form>
						</td>
					</tr>
<?php
			}
?>


		</table>
	</fieldset>
	</div>
	</body>
<!--	</div>-->
	