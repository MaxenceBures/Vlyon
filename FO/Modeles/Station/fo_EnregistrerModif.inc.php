<?php
//session_start();

//require_once ("../../../FO/Vues/Station/fo_ModifierVelo.php");
require_once ("../../../include/functions.php");

	/*function connecter()
	{
		require_once("classe/clstBaseMysql.classe.php") ;		
		$oSql = new clstBaseMysql("localhost", "root", "", "Vlyon") ;
		return ($oSql) ;
	}	*/

	//recuperer tout les variables que l'on as besoin
function test(){	
if (isset($_POST['go_modifint'])) 
{
	connecter();
	$id = $_SESSION['id'];
	$sNumVelo = $_POST['sVelo'];
	//sNumVelo = $_POST['sVelo'];
	//var_dump($sNumVelo);die;
	$sMotif = $_POST["motif_Intervention"];
	//var_dump($sMotif);die;
	$sEtatVelo= $_POST["frm_SelecModif"];
	//var_dump($sEtatVelo);die;
	$dDate=date("y-m-d");
	// selectionner la demande max de l'intervention

	$count = mysql_fetch_row(mysql_query("SELECT MAX(DEMI_NUM) FROM DEMANDINTER "));
	$test = $count[0] + 1;

	//Changer l'etat de velo
	$sReq = "UPDATE VELO
			SET VEL_ETAT='". $sEtatVelo ."'
			WHERE VEL_NUM='". $sNumVelo ."'";
	$sReqExe=mysql_query($sReq);
	?>

	<script language="Javascript">alert("les enregistrements ont ete effectué avec succès");</script>

	<?php
	//var_dump($sReq);
/*	
	//Ajouter une demande
	$sReq = "Insert Into demandeinter (demi_num, demi_velo, demi_date, demi_technicien, demi_modif, demi_traite)
			values (demi_num='". $test ."',
					demi_velo='". $sNumVelo ."',
					demi_date='". $dDate ."',
					demi_technicien='". $id ."',
					demi_motif='". $sMotif ."',
					demi_traite='0')";
	$reqExe=mysql_query($sReq);*/
?>		
		

<?php
}
}
?>