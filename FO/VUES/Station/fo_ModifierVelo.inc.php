<?php
	function connecter()
	{
		$oSql = new clstBaseMysql("localhost", "vlyon", "vlyon", "Vlyon") ;
		return ($oSql) ;
	}

	FUNCTION getEtats()
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

?>
