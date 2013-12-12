<?php
	require('../../../include/functions.php');	
	connect();	
	$dDateCde = date("Y-m-d");
	//réception des valeurs saisies
	$sCodePdt   = $_POST["lst_produit"];
	$sQtePdt    = $_POST["txt_qte"];
	
	//génération d'un numéro d'intervention 
	$sReq = "SELECT MAX(COM_CODE) FROM COMMANDE" ;
	$iNumCde = mysql_fetch_row(mysql_query($sReq));
	//$iNumCde  = $oSql->getNombre($sReq) ;
	$iNumCde = $iNumCde[0]  +  1 ;	
	
	//insertion des données dans la base
	$sReq = "INSERT INTO COMMANDE(COM_CODE, COM_DATE, COM_QTE, COM_VALIDE, COM_PRODUIT)
		     VALUES (".$iNumCde.",'".$dDateCde."',".$sQtePdt .",'Non', '" .$sCodePdt."')";
	$oSql= mysql_query($sReq);	
?>
	<script language="Javascript">
		alert("Commande enregistrée");
		window.location.replace("/Vlyon/FO/VUES/Produit/fo_listeCommandePdt.php")
	</script>