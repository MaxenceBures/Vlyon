<?php
	require('../../../include/functions.php');	
	connect();	
	$dDateCde = date("Y-m-d");
	//r�ception des valeurs saisies
	$sCodePdt   = $_POST["lst_produit"];
	$sQtePdt    = $_POST["txt_qte"];
	
	//g�n�ration d'un num�ro d'intervention 
	$sReq = "SELECT MAX(Com_Code) FROM COMMANDE" ;
	$iNumCde = mysql_fetch_row(mysql_query($sReq));
	//$iNumCde  = $oSql->getNombre($sReq) ;
	$iNumCde = $iNumCde[0]  +  1 ;	
	
	//insertion des donn�es dans la base
	$sReq = "INSERT INTO COMMANDE(Com_Code, Com_Date, Com_Qte, Com_Valide, Com_Produit)
		     VALUES (".$iNumCde.",'".$dDateCde."',".$sQtePdt .",'Non', '" .$sCodePdt."')";
	$oSql= mysql_query($sReq);	
?>
	<script language="Javascript">
		alert("Commande enregistr�e");
		window.location.replace("/Vlyon/FO/VUES/Produit/fo_listeCommandePdt.php")
	</script>