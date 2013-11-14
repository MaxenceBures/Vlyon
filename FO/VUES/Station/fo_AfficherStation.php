
	<form id="frm_station" action="?page=afficherStation" method="post">				
	<br/>
<?php
require_once ("FO/Modeles/Station/AfficherStation.inc.php") ;
?>
	<fieldset>
		<legend> Suivi des stations </legend>
		<br/>
		<table border =1 width="100%" >
			<tr>
				<th width="5%" >Quartier</th>
				<th width="13%">Station</th>
			</tr>
<?php			
			$lesStations  = getAllStation($sLogin ,1) ;
			foreach ($lesStations as $uneStation)			
			{
?>	
				<tr>
					<td><?php echo $uneStation["Tic_Num"] ;  ?></td>
					<td><?php echo $uneStation["Tic_DatCre"]; ?></td>
				</tr>
<?php
			}
?>
		</table>		
	</fieldset>
	<br/><br/>