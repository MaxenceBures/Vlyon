<?php
//session_start();
if(isset($_SESSION['id'])) {
	//require_once('include/functions.php');
	connect();
	//Bures Maxence
	$id = $_GET['variable'];
	$query = mysql_query("UPDATE DEMANDEINTER SET DEMI_VALIDE='0' WHERE DEMI_NUM ='".$id."'") or die (mysql_error());
	header('Location:?page=listeDemande');
	
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
