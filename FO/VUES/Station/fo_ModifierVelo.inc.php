<?php
	function connecter()
	{
		require_once("../classe/clstBaseMysql.classe.php") ;	
		$oSql = new clstBaseMysql("localhost", "Vlyon", "mpvlyon", "vlyon") ;
		return ($oSql) ;
	}	
	
	FUNCTION getEtats()
	{
		$lesEtats = array() ;
		$oSql= connecter() ;
		
		$sReq = " SELECT Eta_Code, Eta_Libelle
				FROM etat";
		$sReqExe = $oSql->query($sReq);
				
		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesEtats[] =  $uneLigne ;
		}
		
		return $lesEtats ;
	}
				
?>