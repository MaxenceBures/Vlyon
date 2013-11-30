<?php
	session_start();
		require_once('../include/functions.php');
		
  //listedemandeint();
?>
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
			<th width="13%">Technicien</th>
		</tr>
<?php
	

$demande = listedemandeintAdmin() ;
		foreach ($demande as $demandes)			
		{
?>
			<tr>
				<td><?php echo $demandes["DemI_Num"] ;  ?></td>
				<td><?php echo $demandes["DemI_Velo"]; ?></td>
				<td><?php echo $demandes["DemI_Station"]; ?></td>
				<td><?php echo $demandes["DemI_Attache"] ; ?></td>
				<td><?php echo $demandes["DemI_Date"] ; ?></td>
				<td><?php echo $demandes["DemI_Motif"] ; ?></td>
				<td><?php echo $demandes["DemI_Traite"] ;?></td>
				<td><?php echo $demandes["DemI_Technicien"] ;?></td>
			</tr>
<?php
		}
?>
	</table>