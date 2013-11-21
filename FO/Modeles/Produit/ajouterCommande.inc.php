<?php	
	$dDateCde = date("Y-m-d");
	//réception des valeurs saisies
	$sCodePdt   = $_POST["lst_produit"];
	$sQtePdt     = $_POST["lst_qte"];
	
	//génération d'un numéro d'intervention 
	$sReq = "SELECT MAX(Com_Code) 
		     FROM COMMANDE" ;
	$iNumCde  = $oSql->getNombre($sReq) ;
	$iNumCde = $iNumCde  +  1 ;	
			
	//insertion des données dans la base
	$sReq = "INSERT INTO COMMANDE(Com_Code, Com_Date, Com_Qte, Com_Valide, Com_Produit)
		    VALUES (".$iNumCde.",'".$dDateCde."',".$sQtePdt .",'Non', '" .$sQtePdt.")";
	// echo $sReq ."<br/>" ;
	$oSql->execute($sReq);	
?>
	<script language="Javascript">
		alert("Commande enregistré");
		window.location.replace("?page=listeCommande")
	</script>