<?php
//session_start();
if(isset($_SESSION['id'])) {
	//include('include/functions.php');
	//connect();
	$code = $_GET['variable'];
	modifcommande();
	$requete = "SELECT * FROM COMMANDE where COM_CODE= '".$code."'";
	$enreg = mysql_fetch_assoc(mysql_query($requete));
	?>
	<html>
	<head>
		<!--<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/skel-panels.min.js"></script>
			<script src="js/init.js"></script>
			<noscript>
				<link rel="stylesheet" href="css/skel-noscript.css" />
				<link rel="stylesheet" href="css/style.css" />
				<link rel="stylesheet" href="css/style-desktop.css" />
				<link rel="stylesheet" href="css/style-wide.css" />
			</noscript>-->
			<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
			<!--[if lte IE 8]><script src="js/html5shiv.js"></script><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
			<!--[if lte IE 7]><link rel="stylesheet" href="css/ie7.css" /><![endif]-->
	</head>
<!--	<body>-->
<div data-role="page">
	<a href="index.php"><img src="css/Home.png" border="0" align="center" width=42 height=42></img></a></br>
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
						<label for="dtae_Commande">Date Commande : </label>
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
	<!--</body>-->
	</html>
<?php
}
else
{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
