<?php
	function connecter()
	{
		require_once("../../../classe/clstBaseMysql.classe.php") ;	
		$oSql = new clstBaseMysql("localhost", "Vlyon", "mpvlyon", "vlyon") ;
		return ($oSql) ;
	}	
	
	FUNCTION getAllInfo($pInfo)
	{
		$lesInfos = array() ;
		$oSql= connecter() ;
		$i=1;
		$sReq = " SELECT Vel_Num, Vel_Etat, DemI_Motif
				FROM velo, demandeinter
				WHERE Vel_Num = DemI_Velo
				AND Vel_Station='". $pInfo ."'";
		$sReqExe = $oSql->query($sReq);
				
		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesInfos[$i] =  $uneLigne ;
			$i=$i+1;
		}
		
		return $lesInfos ;
	}
		FUNCTION getAllInfoE($pInfo)
	{
		$lesInfosE = array() ;
		$oSql= connecter() ;
		$i=1;
		$sReq = " SELECT Vel_num, Vel_etat
				FROM velo
				WHERE vel_num NOT
				IN (

				SELECT demI_velo
				FROM demandeinter
				)
				AND Vel_Station='". $pInfo ."'";
		$sReqExe = $oSql->query($sReq);
				
		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesInfosE[$i] =  $uneLigne ;
			$i=$i+1;
		}
		
		return $lesInfosE ;
	}
				
?>