<?php
	function connecter()
	{
		$oSql = new clstBaseMysql("localhost", "Vlyon", "mpvlyon", "vlyon") ;
		return ($oSql) ;
	}

	FUNCTION getAllProduits()
	{
		$oSql= connecter() ;
		$sReq = " SELECT PDT_CODE, PDT_LIBELLE
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
		$sReq = "SELECT COM_CODE, COM_DATE, COM_QTE, COM_PRODUIT, COM_VALIDE, PDT_LIBELLE
				 FROM COMMANDE, PRODUIT
				 WHERE COMMANDE.COM_PRODUIT = PRODUIT.PDT_CODE";
		//echo ($sReq) ; die;
		$rstCde = $oSql->query($sReq);
		//var_dump($rstCde); die ;
		$iNb = 0;
		$lesCommandes = array();
		while ($uneLigne = $oSql->tabAssoc($rstCde))
		{
			$iNb = $iNb + 1;
			$lesCommandes[$iNb] = $uneLigne;
		}
		return ($lesCommandes);
	}

	FUNCTION getUneCommande($code)
	{
		$oSql = connecter();
		$sReq = "SELECT *
				 FROM COMMANDE
				 WHERE COM_CODE = '".$code."'";
		$rstCde = $oSql->query($sReq);

		if($uneLigne = $oSql->tabAssoc($rstCde))
		{
			return($uneLigne);
		}
	}
?>
