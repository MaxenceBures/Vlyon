<?php
	function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;	
		$oSql = new clstBaseMysql("localhost", "root", "", "Vlyon") ;
		return ($oSql) ;
	}	
	
	//FUNCTION getAllStation
?>