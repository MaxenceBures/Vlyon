<?php
require_once ("FO/Modeles/Station/AfficherStation.inc.php") ;
?>
	<fieldset>
		<legend> Suivi des stations </legend>
		<br/>
		<form  action="?page=AfficherInfo" name="cmd_Inf" method="POST">
		<table border =1 width="100%" >
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
						<td><?php echo $uneStation["Qua_lib"] ;  ?></td>
						<td><?php echo $uneStation["Sta_Code"]; ?></td>
						<td colspan="1" ><input type="submit" name="cmd_Inf" id="cmd_Inf" value="Information" onClick="
						if(confirm('Vous allez consulter les informations concernant les stations'))
						{	
							submit()
						}
						" />
						</td>
					</tr>
<?php
			}
?>
		</form>
		</table>		
	</fieldset>
	<br/><br/>