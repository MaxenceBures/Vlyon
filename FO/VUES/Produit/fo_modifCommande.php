<?php

if(isset($_SESSION['id'])) {

	$code = $_GET['variable'];
	modifcommande();
	$requete = "SELECT * FROM COMMANDE where COM_CODE= '".$code."'";
	$enreg = mysql_fetch_assoc(mysql_query($requete));
	?>

<div data-role="page">
	<a href="?page=accueil"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
	<form id="modif_form" data-ajax="false" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type='hidden' name="code" id="code" value='<?php echo($code); ?>'/>
			<table class="style1">
				<tr>
					<td>
						<label for="codePdt">Code Produit : </label>
					</td>
					<td>
						<input type="text" id="code" name="code" disabled="" value="<?php echo($enreg["COM_PRODUIT"]); ?>"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
					<label for="libellePdt">Quantité : </label>
					</td>
					<td>
						<input type="number" id="txt_qte" name="txt_qte" value="<?php echo($enreg["COM_QTE"]);?>"/>
				</br>
				<tr>
					<td>
						<label for="date_Commande">Date Commande : </label>
					</td>
					<td>
						<input type="text" id="txt_date" name="txt_date" disabled="" value="<?php echo($enreg["COM_DATE"]); ?>"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="valide">Commande Validé ? </label>
					</td>
					<td>
						<input type="checkbox" id="valide" name="valide"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_modifcde" id="go_modifcde" value="Modifier"/>
		</form>
		</div>
<?php
}
else
{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
