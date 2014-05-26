<?php

if(isset($_SESSION['id'])) {

$id = $_GET['variable'];

?>

	<div data-role="page">
<!--	<body>-->
		<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
		<b>Demande d'intervention </b>
			<table class="style1" >
				<tr>
					<th width="5%" >Code Dem</th>
					<th width="5%">Velo</th>
					<th width="5%">Station</th>
					<th width="5%">Attache</th>
					<th width="8%">Date</th>
					<th width="40%">Motif</th>
					<th width="8%">Traite</th>
				</tr>
					<form  action="<?php $_SERVER['PHP_SELF']; ?>" name="SuppDem" method="POST">
		<?php
			$demande = listedemandeNumint($id);
			foreach ($demande as $demandes)
				{
		?>
				<tr>
					<td><?php echo $demandes["DEMI_NUM"] ; $code = $demandes["DEMI_NUM"] ;?><input type="hidden"  value="<?= $code ?>" id="code" name="code"/></td>
					<td><?php echo $demandes["DEMI_VELO"]; ?></td>
					<td><?php echo $demandes["STA_NOM"]; ?></td>
					<td><?php echo $demandes["DEMI_ATTACHE"] ; ?></td>
					<td><?php echo substr($demandes["DEMI_DATE"], 5) ; ?></td>
					<td><?php echo substr($demandes["DEMI_MOTIF"],0,15); if(strlen($demandes["DEMI_MOTIF"]) > 15){echo " ...";}; ?></td>
					<td><?php if($demandes["DEMI_TRAITE"] == 0){echo "non";}else{echo"oui";} ;?></td>
					<td><a href="?page=listeDemandeSupp&variable=<?php print($demandes["DEMI_NUM"]) ?>" onClick="if(confirm('Vous allez supprimer la demande choisie'))
							{
								submit();
							}
							else
	   						{
	   							return false;
	   						}
							"><img width="30" height="30" src="images/supp.png"><input type="hidden"  value="supprimer"  /></img></a></td>
					<td><a href="?page=listeDemandeModif&variable=<?php print($demandes["DEMI_NUM"]) ?>" onClick="if(confirm('Vous allez modifier la demande choisie'))
							{
								submit();

							}
							else
	   						{
	   							 return false;
							};
							" ><img  width="30" height="30" src="images/modif.png"><input type="hidden" value="Modification" /></img></a></td>
				</tr>
		<?php
				}
		?>
					</form>
			</table>
</div>
<!--	</body>-->

<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
