<?php
	//r�ception des valeurs saisies
	$sDate   = $_POST["txt_date"];
	$sDuree    = $_POST["txt_duree"];
	$sDetail = $POST["txt_detail"];
	$sTermine = print $_POST["btn_termine"];
	$sReparable = print $_POST["btn_reparable"];
	$sSurPlace = print $_POST["btn_surplace"];
	
	//g�n�ration d'un num�ro d'intervention 
	$sReq = "SELECT MAX(BI_Num) 
		     FROM BONINTERV" ;
	$oSql= mysql_connect("localhost","Vlyon","mpvlyon");
	$iNumInterv = mysql_result(mysql_query($sReq),0);
//	$iNumCde  = $oSql->getNombre($sReq) ;
	$iNumInterv = $iNumInterv  +  1 ;	
	
	//insertion des donn�es dans la base
	$sReq = "INSERT INTO BONINTERV(BI_Num, BI_DatDebut, BI_CpteRendu, BI_Reparable, BI_SurPlace, BI_Duree)
		     VALUES (".$iNumInterv.",'".$sDate."','".$sDetail."','".$sReparable."', '" .$sSurPlace."', '".$sDuree."')";
	$oSql= mysql_query($sReq);	
?>
	<script language="Javascript">
		alert("Commande enregistr�e");
		window.location.replace("?page=listeCommande")
	</script>