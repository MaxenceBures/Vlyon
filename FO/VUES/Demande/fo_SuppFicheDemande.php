<?php
if(isset($_SESSION['id'])) {
	$id = $_GET['variable'];
	$query = mysql_query("UPDATE DEMANDEINTER SET DEMI_VALIDE='0' WHERE DEMI_NUM ='".$id."'") or die (mysql_error());
?>
    <script language="Javascript">
        alert("Demande supprimée");
        window.location.replace("index.php");
    </script>
<?php
}
else{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
