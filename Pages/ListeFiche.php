<?php
	session_start();
		include('../include/functions.php');
		
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
		</tr>
		<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="SuppDem" method="POST">
<?php
	

$demande = listedemandeint() ;
		foreach ($demande as $demandes)			
		{
?>
			<tr>
				<td><?php echo $demandes["DemI_Num"] ; $code = $demandes["DemI_Num"] ;  var_dump($code); ?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
				<td><?php echo $demandes["DemI_Velo"]; ?></td>
				<td><?php echo $demandes["DemI_Station"]; ?></td>
				<td><?php echo $demandes["DemI_Attache"] ; ?></td>
				<td><?php echo $demandes["DemI_Date"] ; ?></td>
				<td><?php echo $demandes["DemI_Motif"] ; ?></td>
				<td><?php echo $demandes["DemI_Traite"] ;?></td>
				<td colspan="1" ><input type="submit" name="go_SuppDem" id="go_SuppDem" value="Suppresion" onClick="
						if(confirm('Vous allez consulter les informations concernant les stations'))
						{	
							submit();
							
						}
						" />
				</td>
			</tr>
<?php
		}
?>	</form>
	</table>