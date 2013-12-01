<?php
include('../include/functions.php');
connect();
$id = $_GET['variable'];
$query = mysql_query("UPDATE DEMANDEINTER SET DemI_Valide='0' WHERE DemI_Num ='".$id."'") or die (mysql_error());
   header('Location: ListeFiche.php');
?>