<?php
include('../include/functions.php');
connect();
$id = $_GET['variable'];
//$id = $_POST['DemI_Num'];
$query = mysql_query("DELETE FROM DEMANDEINTER WHERE DemI_Num ='".$id."'") or die (mysql_error());
   header('Location: ListeFiche.php');
?>