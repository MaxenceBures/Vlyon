<?php

	function connecter()
	{
		require_once('/classe/clstBaseMysql.classe.php') ;	
		$oSql = new clstBaseMysql("localhost", "root", "", "VLYON") ;
		
		return ($oSql) ;

	}	
	
	function getEtats()
	{
		$lesEtats = array() ;
		$oSql= connecter() ;
		
		$sReq = " SELECT ETA_CODE, ETA_LIBELLE
				FROM ETAT";
		$sReqExe = $oSql->query($sReq);
				
		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesEtats[] =  $uneLigne ;
		}
		
		return $lesEtats ;
	}