<?php	
	$dDateCde = date("Y-m-d");
	//r�ception des valeurs saisies
	$sCodePdt   = $_POST["lst_produit"];
	$sQtePdt     = $_POST["lst_qte"];
	
	//g�n�ration d'un num�ro d'intervention 
	$sReq = "SELECT MAX(Com_Code) 
		     FROM COMMANDE" ;
	$iNumCde  = $oSql->getNombre($sReq) ;
	$iNumCde = $iNumCde  +  1 ;	
			
	//insertion des donn�es dans la base
	$sReq = "INSERT INTO COMMANDE(Com_Code, Com_Date, Com_Qte, Com_Valide, Com_Produit)
		    VALUES (".$iNumCde.",'".$dDateCde."',".$sQtePdt .",'Non', '" .$sQtePdt.")";
	// echo $sReq ."<br/>" ;
	$oSql->execute($sReq);	
?>
	<script language="Javascript">
		alert("Commande enregistr�");
		window.location.replace("?page=listeCommande")
	</script>