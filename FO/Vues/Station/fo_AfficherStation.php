<?php
//require_once ("FO/Modeles/Station/AfficherStation.inc.php") ;
//require_once("../../../include/connexion.inc.php");
//connecter();
?>


	<fieldset>
	<div data-role="page">
	<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
		
		<h1> Suivi des stations </h1>
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
							<form action="?page=AfficherInfo&idStation=<?php echo $uneStation["STA_CODE"]; ?>" method="POST">
								
								<input type="image" src="./images/modif.png" name="cmd_Inf" id="cmd_Inf" value="Voir" onClick="
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

<!--	</div>-->
	