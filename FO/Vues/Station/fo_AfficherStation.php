<fieldset>
	<div data-role="page">
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42 ></img></a></br>

		<table class="style1">
			<th> Suivi des stations </th>
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
					<td><?php echo $uneStation["STA_NOM"]; ?></td>
					<td colspan="1" >
						<form action="?page=AfficherInfo&idStation=<?php echo $uneStation["STA_CODE"]; ?>" method="POST">
								<input type="image" src="./images/vue.png" style="width:40px;height:40px;" name="cmd_Inf" id="cmd_Inf" value="Voir">
						</form>
					</td>
				</tr>
<?php
			}
?>

		</table>
	</div>
</fieldset>