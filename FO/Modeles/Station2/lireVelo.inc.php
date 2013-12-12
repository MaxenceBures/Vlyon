<?php

	function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;
		$oSql = new clstBaseMysql("localhost", "root", "", "Vlyon") ;
		return ($oSql) ;
	}

	FUNCTION getEtats()
	{
		$lesEtats = array() ;
		$oSql= connecter() ;

		$sReq = " SELECT ETAT_CODE, ETA_LIBELLE
				FROM ETAT";
		$sReqExe = $oSql->query($sReq);

		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesEtats[] =  $uneLigne ;
		}

		return $lesEtats ;
	}

?>
