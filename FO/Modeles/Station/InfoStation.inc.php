<?php
	function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;

		$oSql = new clstBaseMysql("localhost", "root", "tioneb", "VLYON") ;
		return ($oSql) ;
	}

	FUNCTION getAllInfo($pInfo)
	{
		$lesInfos = array() ;
		$oSql= connecter() ;
		$i=1;
		$sReq = " SELECT VEL_NUM, VEL_ETAT, DEMI_MOTIF
				FROM VELO, DEMANDEINTER
				WHERE VEL_NUM = DEMI_VELO
				AND VEL_STATION='". $pInfo ."'";
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
		$sReq = " SELECT VEL_NUM, VEL_ETAT
				FROM VELO
				WHERE VEL_NUM NOT
				IN (

				SELECT DEMI_VELO
				FROM DEMANDEINTER
				)
				AND VEL_STATION='". $pInfo ."'";
		$sReqExe = $oSql->query($sReq);

		while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
			$lesInfosE[$i] =  $uneLigne ;
			$i=$i+1;
		}

		return $lesInfosE ;
	}
