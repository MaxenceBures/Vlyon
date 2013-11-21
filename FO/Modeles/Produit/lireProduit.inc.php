<?php
	FUNCTION getAllProduits()
	{		
		$oSql= connecter() ;		
		$sReq = " SELECT Pdt_Code, Pdt_Libelle 
				  FROM PRODUIT ";
		$rstPdt = $oSql->query($sReq) ;
		$iNb = 0 ;
		$lesProduits = array() ;		
		while ($uneLigne = $oSql->tabAssoc($rstPdt) )
		{
			$iNb = $iNb + 1 ;
			$lesProduits[$iNb] =  $uneLigne ;
		}
		return ($lesProduits) ;
	}
	
	FUNCTION getAllCommandes()
	{
		$oSql = connecter();
		$sReq = "SELECT Com_Code, Com_Date, Com_Qte, Com_Produit, Com_Valide, Pdt_Libelle
				 FROM COMMANDE
				 WHERE COMMANDE.Com_Produit = PRODUIT.Pdt_Code";
		$rstCde = $oSql->query($sReq);
		$iNb = 0;
		$lesCommandes = array();
		while ($uneLigne = $oSql->tabAssoc($rstCde))
		{
			$iNb = $iNb + 1;
			$lesCommandes[$iNb] = $uneLigne;
		}
		return ($lesCommandes);
	}
?>