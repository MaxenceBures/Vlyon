<?php
	function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;	
		$oSql = new clstBaseMysql("localhost", "root", "", "Vlyon") ;
		return ($oSql) ;
	}	
	
	FUNCTION getAllInfo()
	{
		$lesInfos = array() ;
		$oSql= connecter() ;
		
		$sReq = " SELECT Sta_Code, Sta_Nom, Sta_Quartier, Qua_id, Qua_lib
				FROM station, quartier
				WHERE Sta_Quartier = Qua_id
				ORDER BY Sta_Code ASC";
		$sReqExe = $oSql->query($sReq);
				
		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesInfos[] =  $uneLigne ;
		}
		
		return $lesInfos ;
	}
				
?>