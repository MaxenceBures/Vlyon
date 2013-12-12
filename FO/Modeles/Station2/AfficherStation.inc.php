<?php
	function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;
		$oSql = new clstBaseMysql("localhost", "Vlyon", "mpvlyon", "vlyon") ;
		return ($oSql) ;
	}

	FUNCTION getAllStation()
	{
		$lesStations = array() ;
		$oSql= connecter() ;

		$sReq = " SELECT STA_CODE, STA_NOM, STA_QUARTIER, QUA_ID, QUA_LIB
				FROM STATION, QUARTIER
				WHERE STA_QUARTIER = QUA_ID
				ORDER BY STA_CODE ASC";
		$sReqExe = $oSql->query($sReq);

		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesStations[] =  $uneLigne ;
		}

		return $lesStations ;
	}

?>
