<?php
function login() {
    // Si on a soumit le formulaire (si on a cliqué sur "Se connecter")
    if(isset($_POST['go_login']))
    {

        // Si les deux champs ne sont pas vides
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {

            // On éxécute une requête pour détecter si le login entré existe dans la base
            $query = mysql_query("SELECT * FROM TECHNICIEN WHERE TEC_MATRICULE = '".$_POST['login']."'");

            // Si on a un résultat => il existe
            if (mysql_num_rows($query) == 1)
            {
                $user = mysql_fetch_object($query);

                // On vérifie la concordance des mots de passe (en md5)
                if(sha1($_POST['password']) == $user->TEC_PWD)
                {

                    // Si on arrive jusque ici c'est que le couple login / mot de passe est résolu
                    // On lance donc la session

                    session_start();
                    $_SESSION['Resp'] = $user->TEC_RESPONSABLE;
                    $_SESSION['id'] = $user->TEC_MATRICULE;
                    header('Location: index.php');

                }
                else
                    echo 'Mauvais mot de passe pour cet utilisateur.';
            }
            else
                echo 'Ce login nexiste pas dans notre base.';
        }
        else
            echo 'Vous devez remplir tous les champs !';
    }
}

function logout() {
    session_start();
    unset($_SESSION);
    session_destroy();

    echo '<script language="Javascript">';
	echo 'alert("Vous êtes deconnecté")';
	echo 'window.location.replace("index.php")';
	echo '</script>';
}

function ListeDeroulanteStation()
{
    $sReq = " SELECT STA_CODE, STA_NOM
              FROM STATION ";
    $rstPdt = mysql_query($sReq) ;
    $iNb = 0 ;
    $oStation = array() ;
    while ($Station = mysql_fetch_assoc($rstPdt) )
    {
        $iNb = $iNb + 1 ;
        $oStation[$iNb] =  $Station ;
    }
    return ($oStation) ;
}

function utilisateur()
{
    $id = $_SESSION['id'];
    $sReq = " SELECT TEC_NOM, TEC_PRENOM, TEC_RESPONSABLE
                FROM TECHNICIEN
                WHERE TEC_MATRICULE='".$id."'";
    $rstPdt = mysql_query($sReq) ;
    $iNb = 0 ;
    $oUtilisateur = array() ;
    $Utilisateur = mysql_fetch_assoc($rstPdt);

    $oUtilisateur[1] =  $Utilisateur ;

    return ($oUtilisateur) ;
}

function listedemandeint()
{
    $id = $_SESSION['id'];
    $sReq = " SELECT DEMI_NUM, DEMI_VELO, DEMI_ATTACHE, DEMI_STATION, DEMI_DATE, DEMI_MOTIF, DEMI_TRAITE
                FROM DEMANDEINTER
                WHERE DEMI_TECHNICIEN='".$id."' AND DEMI_VALIDE=1 ";
 	$rstPdt = mysql_query($sReq) ;
    $iNb = 0 ;
    $demande = array() ;
    while ($demande2 = mysql_fetch_assoc($rstPdt) ){
        $iNb = $iNb + 1 ;
        $demande[$iNb] =  $demande2 ;
    }

    return ($demande) ;
}

function listeint()
{
    $id = $_SESSION['id'];
    /**
     * @todo a ce tarif la fait un select *
     */
    $sReq = "SELECT BI_NUM, BI_VELO, BI_DATEDEBUT, BI_DATFIN, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_CPTERENDU, BI_TECHNICIEN
                FROM BONINTERV";
    $rstPdt = mysql_query($sReq) ;
    $iNb = 0 ;
    $intevention = array() ;
    while ($intevention2 = mysql_fetch_assoc($rstPdt) ){
        $iNb = $iNb + 1 ;
        $intevention[$iNb] =  $intevention2 ;
    }

    return ($intevention) ;
}

function listedemande2int($id)
{
    $sReq = " SELECT DEMI_NUM, DEMI_VELO, DEMI_ATTACHE, DEMI_STATION, DEMI_DATE, DEMI_MOTIF, DEMI_TRAITE
                FROM DEMANDEINTER
                WHERE DEMI_NUM='".$id."' AND DEMI_VALIDE=1 ";
    $rstPdt = mysql_query($sReq) ;
    $iNb = 0 ;
    $demande = array() ;
    while ($demande2 = mysql_fetch_assoc($rstPdt) ){
        $iNb = $iNb + 1 ;
        $demande[$iNb] =  $demande2 ;
    }

    return ($demande) ;
}

function cmd_Inf()
{
    if(isset($_POST['cmd_Inf']))
        header('Location: VUES/fo_InformationStation.php');
}

function listedemandeintAdmin()
{
    $id = $_SESSION['id'];
    /**
     * @todo a ce tarif la fait un select *
     */
    $sReq = "SELECT DEMI_NUM, DEMI_VELO, DEMI_ATTACHE, DEMI_STATION, DEMI_DATE, DEMI_MOTIF, DEMI_TRAITE, DEMI_TECHNICIEN, DEMI_VALIDE
                FROM DEMANDEINTER ";
    $rstPdt = mysql_query($sReq) ;
    $iNb = 0 ;
    $demande = array() ;
    while ($demande2 = mysql_fetch_assoc($rstPdt) ){
        $iNb = $iNb + 1 ;
        $demande[$iNb] =  $demande2 ;
    }

    return ($demande) ;
}

function createdemandeint(){
    if (!isset($_POST['go_createint']))
        return false;

    $date = date("Y-m-d");
    $id = $_SESSION['id'];
    $velo = $_POST['velo'];
    $motif = $_POST['motif'];
    $attache = $_POST['attache'];
    $station = $_POST['station'];
    $motif = $_POST['motif'];

    if (empty($_POST['traite']))
        $traite = 0;
    else
        $traite = 1;

    $count = mysql_fetch_row(mysql_query("SELECT max(DEMI_NUM) from DEMANDEINTER"));
    $test = $count[0] + 1;
    $query = mysql_query("INSERT INTO DEMANDEINTER(DEMI_NUM, DEMI_VELO, DEMI_DATE, DEMI_TECHNICIEN, DEMI_MOTIF, DEMI_TRAITE, DEMI_ATTACHE, DEMI_STATION, DEMI_VALIDE)
                        VALUES('".$test."', '".$velo."','".$date."', '".$id."', '".$motif."', '".$traite."','".$attache."','".$station."', '1')") or die (mysql_error());
    echo '<script language="Javascript">'.
        'alert("Demande enregistré");'.
        'window.location.replace("index.php")'.
        '</script>';
}

function createint(){
    if (!isset($_POST['go_createinter']))
        return false;

    //   $date = date("Y-m-d");
    $id = $_SESSION['id'];
    $velo = $_POST['velo'];
    $db = $_POST['db'];
    $df = $_POST['df'];
    $cr = $_POST['cr'];
    $dr = $_POST['dr'];

    if (empty($_POST['de']))
    {
    $de = 0;
    }
    else
    {
    $de = 1;
    }
    if (empty($_POST['sp']))
    {
    $sp = 0;
    }
    else
    {
    $sp = 1;
    }
    if (empty($_POST['rp']))
    {
    $rp = 0;
    }
    else
    {
    $rp = 1;
    }

    $count = mysql_fetch_row(mysql_query("SELECT max(BI_NUM) from BONINTERV"));
    $test = $count[0] + 1;
    $query = mysql_query("INSERT INTO BONINTERV(BI_NUM, BI_VELO, BI_DATEDEBUT, BI_DATFIN,BI_CPTERENDU, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_TECHNICIEN) VALUES('".$test."', '".$velo."','".$db."', '".$df."', '".$cr."', '".$rp."','".$de."','".$dr."', '".$sp."', '".$id."')") or die (mysql_error());
    echo '<script language="Javascript">
            alert("intevention enregistré");
            window.location.replace("index.php")
            </script>';
}

  function modifinter()
{

     if (isset($_POST['go_modifint']))
     {
       $id = $_POST['id'];
       $df = $_POST['df'];
       $cr = $_POST['cr'];
       $dr = $_POST['dr'];
        if (isset($_POST['de']))
        {
          $de = 1;
        }
        else
        {
          $de = 0;
        }
        if (isset($_POST['sp']))
        {
          $sp = 1;
        }
        else
        {
          $sp = 0;
        }
         if (isset($_POST['rp']))
        {
          $rp = 1;
        }
        else
        {
          $rp = 0;
        }
        $query = mysql_query("UPDATE BONINTERV SET BI_CPTERENDU='".$cr."', BI_DATFIN='".$df."', BI_DUREE ='".$dr."', BI_DEMANDE='".$de."', BI_SURPLACE='".$sp."', BI_REPARABLE='".$rp."'  Where BI_NUM='".$id."'") or die (mysql_error());
         ?>
              <script language="Javascript">
                alert("Modification enregistré");
                window.location.replace("index.php")
              </script>
          <?php

      }
    }

  function modifdemandeint()
    {

     if (isset($_POST['go_modifint']))
     {

       $id = $_POST['id'];
       $motif = $_POST['motif'];
       $attache = $_POST['attache'];
       $station = $_POST['station'];
        if (empty($_POST['traite']))
        {
          $traite = 0;
        }
        else
        {
          $traite = 1;
        }
        $query = mysql_query("UPDATE DEMANDEINTER SET DEMI_MOTIF='".$motif."', DEMI_ATTACHE='".$attache."', DEMI_STATION='".$station."', DEMI_TRAITE='".$traite."'  Where DEMI_NUM='".$id."'") or die (mysql_error());

         ?>
              <script language="Javascript">
                alert("Modification enregistré");
                window.location.replace("index.php")
              </script>
          <?php

      }
    }

	function modifcommande()
    {

     if (isset($_POST['go_modifcde']))
     {

       $code = $_POST['code'];
       $qte = $_POST['txt_qte'];
        if (empty($_POST['valide']))
        {
          $valide = 0;
        }
        else
        {
          $valide = 1;
        }
        $query = mysql_query("UPDATE COMMANDE SET COM_QTE='".$qte."', COM_VALIDE='".$valide."' Where COM_CODE='".$code."'") or die (mysql_error());

         ?>
              <script language="Javascript">
                alert("Modification enregistré");
                window.location.replace("index.php")
              </script>
          <?php

      }
    }
