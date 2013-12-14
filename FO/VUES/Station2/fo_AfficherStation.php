<?php
require_once ("FO/Modeles/Station/AfficherStation.inc.php") ;
?>

	<fieldset>
		<head>
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
		<legend> Suivi des stations </legend>
		<br/>
		<form  >
		<table border =1 width="100%" >
			<tr>
				<th width="55%" >Quartier</th>
				<th width="40%">Station</th>
				<th width="15%">Information</th>
			</tr>
			<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="Information" method="POST">
<?php
			$lesStations  = getAllStation() ;
			foreach($lesStations as $uneStation)
			{
$id = $uneStation["STA_CODE"];
?>
					<tr>

						<input type="hidden" name="idStation" id="idStation" value='<?php echo $id; ?>'/>
						<td><?php echo $uneStation["QUA_LIB"] ;  ?></td>
						<td><?php echo $uneStation["STA_CODE"]; ?></td>
						<td><a href="fo_informationStation.php?variable=<?php print($id) ?>"><input type="button" value="Affichage"  /></a></td>
				<!--		<td colspan="1" >
							<form action="fo_informationStation" method="POST">
								<input type="hidden" name="idStation" value="<?php echo $uneStation["STA_CODE"]; ?>"/>
								<a href="fo_informationStation"><input type="submit" name="cmd_Inf" id="cmd_Inf" value="Information" onClick="
									if(confirm('Vous allez consulter les informations concernant les stations'))
									{
										submit()
									}
									"/></a>
							</form>
						</td>-->
					</tr>
<?php
			}
?>

		</form>
		</table>
	</fieldset>