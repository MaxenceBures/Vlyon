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
				<td><a href="suppression.php?variable=<?php print($demandes["DemI_Num"]) ?>"><input type="button" value="supprimer" onClick="if(confirm('Vous allez supprimer la demande choisie'))
						{	
							submit();
							
						}
						else
   							 return false;
						" /></a></td>
				<td><a href="ModifFiche.php?variable=<?php print($demandes["DemI_Num"]) ?>"><input type="button" value="Modification" onClick="if(confirm('Vous allez modifier la demande choisie'))
						{	
							submit();
							
						}
						else
   							 return false;
						" /></a></td>		
			</tr>
<?php
		}
?>	</form>
	</table>
