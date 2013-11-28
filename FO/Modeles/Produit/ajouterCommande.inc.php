<?php
	$dDateCde = date("Y-m-d");
	//réception des valeurs saisies
	$sCodePdt   = $_POST["lst_produit"];
	$sQtePdt    = $_POST["txt_qte"];
	
	//génération d'un numéro d'intervention 
	$sReq = "SELECT MAX(Com_Code) 
		     FROM COMMANDE" ;
	$oSql= mysql_connect("localhost","Vlyon","mpvlyon");
	$iNumCde = mysql_result(mysql_query($sReq),0);
//	$iNumCde  = $oSql->getNombre($sReq) ;
	$iNumCde = $iNumCde  +  1 ;	
	
	//insertion des données dans la base
	$sReq = "INSERT INTO COMMANDE(Com_Code, Com_Date, Com_Qte, Com_Valide, Com_Produit)
		     VALUES (".$iNumCde.",'".$dDateCde."',".$sQtePdt .",'Non', '" .$sCodePdt."')";
	$oSql= mysql_query($sReq);	
?>
	<script language="Javascript">
		alert("Commande enregistrée");
		window.location.replace("?page=listeCommande")
	</script>