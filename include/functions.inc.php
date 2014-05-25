<?php
include('connexion.inc.php');
connect();

function login() {
    // Si on a soumit le formulaire (si on a cliqué sur "Se connecter")
    if(isset($_POST['go_login']))
    {
        // Si les deux champs ne sont pas vides
        if(!empty($_POST['login']) && !empty($_POST['password']))
        {
            // On éxécute une requête pour détecter si le login entré existe dans la base
            $query = mysql_query("SELECT * FROM TECHNICIEN WHERE TEC_MATRICULE = '". mysql_real_escape_string($_POST['login'])."'");
            // Si on a un résultat => il existe
            if (mysql_num_rows($query) == 1)
            {
                $user = mysql_fetch_object($query);
                // On vérifie la concordance des mots de passe (en md5)
                if(sha1($_POST['password']) == $user->TEC_PWD)
                {
                    // Si on arrive jusque ici c'est que le couple login / mot de passe est résolu
                    // On lance donc la session
                   // session_start();
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
  //  session_start();
    unset($_SESSION);
    session_destroy();
    header('Location: ../index.php');
   /* echo '<script language="Javascript">'.
       'alert("Vous êtes deconnecté");'.
       'window.location.replace("../index.php")'.
       '</script>';*/
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
    $sReq = "SELECT BI_NUM, BI_VELO, BI_DATDEBUT, BI_DATFIN, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_CPTERENDU, BI_TECHNICIEN
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

function listedemandeNumint($id)
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
    if (isset($_POST['go_createint']))
    {       

    $date = date("Y-m-d");
    $id = $_SESSION['id'];
    $velo = mysql_real_escape_string($_POST['velo']);
    $motif = mysql_real_escape_string($_POST['motif']);
    $attache = mysql_real_escape_string($_POST['attache']);
    $station = mysql_real_escape_string($_POST['station']);
    $motif = mysql_real_escape_string($_POST['motif']);

    if (empty($_POST['traite']))
        $traite = 0;
    else
        $traite = 1;

    $nb = mysql_fetch_row(mysql_query("SELECT max(DEMI_NUM) from DEMANDEINTER"));
    $max = $nb[0] + 1;

    $query = mysql_query("INSERT INTO DEMANDEINTER (DEMI_NUM, DEMI_VELO, DEMI_DATE, DEMI_TECHNICIEN, DEMI_MOTIF, DEMI_TRAITE, DEMI_ATTACHE, DEMI_STATION, DEMI_VALIDE)
                        VALUES('".$max."', '".$velo."','".$date."', '".$id."', '".$motif."', '".$traite."','".$attache."','".$station."', '1')") ;
    var_dump($query);
        echo '<script language="Javascript">'.
        'alert("Demande enregistré");'.
        'window.location.replace("index.php")'.
        '</script>';
    }
}

function createint(){
    if (isset($_POST['go_createinter']))
{        
    //   $date = date("Y-m-d");
    $id = $_SESSION['id'];
    $velo = mysql_real_escape_string($_POST['velo']);
    $ddebut = mysql_real_escape_string($_POST['ddebut']);
    $dfin = mysql_real_escape_string($_POST['dfin']);
    $compterendu = mysql_real_escape_string($_POST['compterendu']);
    $duree = mysql_real_escape_string($_POST['duree']);

    if (empty($_POST['demande']))
    {
    $demande = 0;
    }
    else
    {
    $demande = 1;
    }
    if (empty($_POST['surplace']))
    {
    $surplace = 0;
    }
    else
    {
    $surplace = 1;
    }
    if (empty($_POST['reparable']))
    {
    $reparable = 0;
    }
    else
    {
    $reparable = 1;
    }

    $count = mysql_fetch_row(mysql_query("SELECT max(BI_NUM) from BONINTERV"));
    $test = $count[0] + 1;
    $query = mysql_query("INSERT INTO BONINTERV(BI_NUM, BI_VELO, BI_DATDEBUT, BI_DATFIN,BI_CPTERENDU, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_TECHNICIEN) VALUES('".$test."', '".$velo."','".$ddebut."', '".$dfin."', '".$compterendu."', '".$reparable."','".$demande."','".$surplace."', '".$duree."', '".$id."')") or die (mysql_error());
    echo '<script language="Javascript">
            alert("intevention enregistré");
            window.location.replace("index.php")
            </script>';
}}

  function modifinter()
{

     if (isset($_POST['go_modifint']))
     {
       $id = mysql_real_escape_string($_POST['id']);
       $dfin = mysql_real_escape_string($_POST['dfin']);
       $compterendu = mysql_real_escape_string($_POST['compterendu']);
       $duree = mysql_real_escape_string($_POST['duree']);
        if (isset($_POST['demande']))
        {
          $demande = 1;
        }
        else
        {
          $demande = 0;
        }
        if (isset($_POST['surplace']))
        {
          $surplace = 1;
        }
        else
        {
          $surplace = 0;
        }
         if (isset($_POST['reparable']))
        {
          $reparable = 1;
        }
        else
        {
          $reparable = 0;
        }
        $query = mysql_query("UPDATE BONINTERV SET BI_CPTERENDU='".$compterendu."', BI_DATFIN='".$dfin."', BI_DUREE ='".$duree."', BI_DEMANDE='".$demande."', BI_SURPLACE='".$surplace."', BI_REPARABLE='".$reparable."'  Where BI_NUM='".$id."'") or die (mysql_error());
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

       $id = mysql_real_escape_string($_POST['id']);
       $motif = mysql_real_escape_string($_POST['motif']);
       $attache = mysql_real_escape_string($_POST['attache']);
       $station = mysql_real_escape_string($_POST['station']);
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

       $code = mysql_real_escape_string($_POST['code']);
       $qte = mysql_real_escape_string($_POST['txt_qte']);
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
    function getAllProduits()
    {
        $oSql= connecter() ;
        $sReq = " SELECT PDT_CODE, PDT_LIBELLE
                  FROM PRODUIT ";
        $rstPdt = $oSql->query($sReq) ;
        $iNb = 0 ;
        $lesProduits = array() ;
        while ($uneLigne = $oSql->tabAssoc($rstPdt) )
        {
            $iNb = $iNb + 1 ;
            $lesProduits[$iNb] =  $uneLigne ;
        }
        return ($lesProduits) ;
    }

    function getAllCommandes()
    {
        $oSql = connecter();
        $sReq = "SELECT COM_CODE, COM_DATE, COM_QTE, COM_PRODUIT, COM_VALIDE, PDT_LIBELLE
                 FROM COMMANDE, PRODUIT
                 WHERE COMMANDE.COM_PRODUIT = PRODUIT.PDT_CODE
                 Order By COM_CODE Asc";
        //echo ($sReq) ; die;
        $rstCde = $oSql->query($sReq);
        //var_dump($rstCde); die ;
        $iNb = 0;
        $lesCommandes = array();
        while ($uneLigne = $oSql->tabAssoc($rstCde))
        {
            $iNb = $iNb + 1;
            $lesCommandes[$iNb] = $uneLigne;
        }
        return ($lesCommandes);
    }

    function getUneCommande($code)
    {
        $oSql = connecter();
        $sReq = "SELECT *
                 FROM COMMANDE
                 WHERE COM_CODE = '".$code."'";
        $rstCde = $oSql->query($sReq);

        if($uneLigne = $oSql->tabAssoc($rstCde))
        {
            return($uneLigne);
        }
    }

function getAllStation()
    {
        $lesStations = array() ;
        $oSql= connecter() ;

        $sReq = " SELECT STA_CODE, STA_NOM, STA_QUARTIER, QUA_ID, QUA_LIB
                FROM STATION, QUARTIER
                WHERE STA_QUARTIER = QUA_ID
                ORDER BY STA_CODE ASC";
        $sReqExe = $oSql->query($sReq);

        while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
            $lesStations[] =  $uneLigne ;
        }

        return $lesStations ;
    }

    function getAllInfo($pInfo)
    {
        $lesInfos = array() ;
        $oSql= connecter() ;
        $i=1;
        $sReq = " SELECT VEL_NUM, VEL_ETAT, DEMI_MOTIF, DEMI_NUM
                FROM VELO, DEMANDEINTER
                WHERE VEL_NUM = DEMI_VELO
                AND DEMI_STATION='". $pInfo ."'
                ORDER BY DEMI_NUM ASC";
        $sReqExe = $oSql->query($sReq);

        while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
            $lesInfos[$i] =  $uneLigne ;
            $i=$i+1;
        }

        return $lesInfos ;
    }

    function getAllVelo()
    {
        $lesInfos = array() ;
        $oSql= connecter() ;
        $i=1;
        $sReq = " SELECT VEL_NUM
                FROM VELO
                ORDER BY VEL_NUM ASC";
        $sReqExe = $oSql->query($sReq);

        while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
            $lesInfos[$i] =  $uneLigne ;
            $i=$i+1;
        }

        return $lesInfos ;
    }
        function getAllInfoE($pInfo)
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

    function getEtats()
    {
        $lesEtats = array() ;
        $oSql= connecter() ;

        $sReq = " SELECT ETA_CODE, ETA_LIBELLE
                FROM ETAT";
        $sReqExe = $oSql->query($sReq);

        while ($uneLigne = $oSql->tabAssoc($sReqExe) ){
            $lesEtats[] =  $uneLigne ;
        }

        return $lesEtats ;
    }

     function ajoutCommande(){

     if (isset($_POST['go_ajoutcde']))
        {    
    $dDateCde = date("Y-m-d");
    //réception des valeurs saisies
    $sCodePdt   = mysql_real_escape_string($_POST["lst_produit"]);
    $sQtePdt    = mysql_real_escape_string($_POST["txt_qte"]);

    //génération d'un numéro d'intervention
    $sReq = "SELECT MAX(COM_CODE) FROM COMMANDE" ;
    $iNumCde = mysql_fetch_row(mysql_query($sReq));
    //$iNumCde  = $oSql->getNombre($sReq) ;
    $iNumCde = $iNumCde[0]  +  1 ;

    //insertion des données dans la base
    $sReq = "INSERT INTO COMMANDE(COM_CODE, COM_DATE, COM_QTE, COM_VALIDE, COM_PRODUIT)
             VALUES (".$iNumCde.",'".$dDateCde."',".$sQtePdt .",'Non', '" .$sCodePdt."')";
    $oSql= mysql_query($sReq);
    ?>
    <script language="Javascript">
        alert("Commande enregistrée");
        window.location.replace("index.php")
    </script>
    <?php
        }
    }

    function paginationCommande(){
        $per_page = 5;

//getting number of rows and calculating no of pages
$sql = "SELECT * FROM COMMANDE";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);
return($pages);
    }
        function paginationIntervention(){
        $per_page = 5;

//getting number of rows and calculating no of pages
$sql = "   SELECT *
                FROM BONINTERV";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);
return($pages);
    }

   function paginationDemande(){
$per_page = 5;

//getting number of rows and calculating no of pages
$sql = "   SELECT *
                FROM DEMANDEINTER WHERE DEMI_VALIDE = 1";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);
return($pages);
    }

function paginationDemandeAdmin(){
$per_page = 5;

//getting number of rows and calculating no of pages
$sql = "   SELECT *
                FROM DEMANDEINTER ";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page);
return($pages);
    }

function pagination_ProduitListe($page){
$per_page = 5;
$start = ($page-1)*$per_page;
$sql = "select * from COMMANDE, PRODUIT WHERE COM_PRODUIT = PDT_CODE ORDER BY COM_CODE ASC limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);
return($rsd);
}

function pagination_DemandeAdminListe($page){
$per_page = 5;
$start = ($page-1)*$per_page;
$sql = "select * from DEMANDEINTER ORDER BY DEMI_NUM ASC limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);
return($rsd);
}


function pagination_InterventionListe($page){
$per_page = 5;
$start = ($page-1)*$per_page;
$sql = "SELECT BI_NUM, BI_VELO, BI_DATDEBUT, BI_DATFIN, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_CPTERENDU, BI_TECHNICIEN FROM BONINTERV  limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);
return($rsd);
}

function pagination_DemandeListe($page){
$per_page = 5;
$start = ($page-1)*$per_page;
$sql = "select * from DEMANDEINTER where DEMI_VALIDE = 1 ORDER BY DEMI_NUM ASC limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);
return($rsd);
}

function InterventionListe($demande){
$per_page = 5;
$start = ($page-1)*$per_page;
$sql = "SELECT BI_NUM, BI_VELO, BI_DATDEBUT, BI_DATFIN, BI_REPARABLE, BI_DEMANDE, BI_SURPLACE, BI_DUREE, BI_CPTERENDU, BI_TECHNICIEN FROM BONINTERV  limit $start,$per_page";//order by demi_num
$rsd = mysql_query($sql);
return($rsd);
}

function infosDemande($id){
$requete = "SELECT * FROM DEMANDEINTER where DEMI_NUM= '".$id."'";
$enreg = mysql_query($requete);
return($enreg);
}

function modifDemanInter(){
    if (isset($_POST['go_modif']))
    {
        
        $id = mysql_real_escape_string($_POST["idVelModif"]);
        $etat =  mysql_real_escape_string($_POST["lst_Modif"]);
        $motif =  mysql_real_escape_string($_POST["motif_Intervention"]);
       // $etat = mysql_real_escape_string($_POST["rad_Intervention"]);
        $velo = mysql_real_escape_string($_POST["idVelCode"]);
        if (empty($_POST['rad_Intervention'])){
        $sRadIntervention= '1';
        }
     else{
        $sRadIntervention='0';
        }

$sReq = mysql_query("UPDATE DEMANDEINTER SET DEMI_MOTIF = '".$motif."', DEMI_TRAITE = '".$sRadIntervention."' WHERE DEMI_NUM = '".$id."'");
$sReq2 = mysql_query("UPDATE VELO SET VEL_ETAT ='".$etat."' WHERE VEL_NUM = '".$velo."'");
    }
      

}

function ajoutDemanInter(){
    if (isset($_POST['go_modif']))
    {
        $station = mysql_real_escape_string($_POST["idStation"]);
        $attache = mysql_real_escape_string($_POST["Attache"]);
        //$id = mysql_real_escape_string($_POST["idVelModif"]);
        $etat =  mysql_real_escape_string($_POST["lst_Modif"]);
        $motif =  mysql_real_escape_string($_POST["motif_Intervention"]);
       // $etat = mysql_real_escape_string($_POST["rad_Intervention"]);
        $velo = mysql_real_escape_string($_POST["idVelCode"]);
        if (empty($_POST['rad_Intervention'])){
        $sRadIntervention= '1';
        }
     else{
        $sRadIntervention='0';
        }
$nb= mysql_fetch_row(mysql_query("SELECT max(DEMI_NUM) from DEMANDEINTER"));
$max = $nb[0] + 1;
$sReq = mysql_query("INSERT INTO DEMANDEINTER (DEMI_NUM,DEMI_VELO,DEMI_DATE,DEMI_TECHNICIEN,DEMI_MOTIF, DEMI_TRAITE, DEMI_STATION, DEMI_ATTACHE) VALUES('".$max."', '".$velo."','".date("Y-m-d")."' ,'".$_SESSION['id']."','".$motif."', '".$sRadIntervention."','".$station."','".$attache."')") or mysql_error();
var_dump($sReq);
//$sReq2 = mysql_query("UPDATE VELO SET VEL_ETAT ='".$etat."' WHERE VEL_NUM = '".$velo."'");
    ?>
    <script language="Javascript">
        alert("enregistrée");
        window.location.replace("index.php")
    </script>
    <?php
    }
      

}

/*function modifcommande()
    {

     if (isset($_POST['go_modifcde']))
     {

       $code = mysql_real_escape_string($_POST['code']);
       $qte = mysql_real_escape_string($_POST['txt_qte']);
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
    }*/
/*function modifdem(){
if (isset($_POST['go_ajout']))
     {
        $id = mysql_real_escape_string($_POST["idVelModif"]);
        $motif =  mysql_real_escape_string($_POST["lst_Modif"]);
        $etat = mysql_real_escape_string($_POST["rad_Intervention"]);
        $velo = mysql_real_escape_string($_POST["idVelCode"]);
        if (empty($_POST['rad_Intervention'])){
        $sRadIntervention= '1';
    }
    else
        $sRadIntervention='0';
}

$sReq = mysql_query("UPDATE DEMANDEINTER(DEMI_MOTIF) SET DEMI_MOTIF = '".$motif."', DEMI_TRAITE = '".$sRadIntervention."' WHERE DEMI_NUM = '".$id."'");
$sReq2 = mysql_query("UPDATE VELO(VEL_ETAT) SET VEL_ETAT ='".$etat."' WHERE VEL_NUM = '".$velo."'");
 
      getEtats();
        $sNumVelo = mysql_real_escape_string($_POST['idVelModif']);
        $id = $_SESSION['id'];

    $sMotif = mysql_real_escape_string($_POST["motif_Intervention"]);
    $sEtatVelo= mysql_real_escape_string($_POST["lst_Modif"]);
    if (empty($_POST['rad_Intervention'])){
        $sRadIntervention= '1';
    }
    else
        $sRadIntervention='0';
   // $dDate=date("y-m-d");

   // $count = mysql_fetch_row(mysql_query("SELECT MAX(DEMI_NUM) FROM DEMANDEINTER "));
                $test = $count[0] + 1;

    $sReq = "UPDATE VELO
            SET VEL_ETAT='". $sEtatVelo ."'
            WHERE VEL_NUM='". $sNumVelo ."'";
    $sReqExe=mysql_query($sReq);
    if ($RadIntervention='1')
    {
        $sReq = "INSERT INTO DEMANDEINTER (DEMI_NUM, DEMI_VELO, DEMI_DATE, DEMI_TECHNICIEN, DEMI_MOTIF, DEMI_TRAITE)
                VALUES ('". $test ."',
                        '". $sNumVelo ."',
                        '". $dDate ."',
                        '". $id ."',
                        '". $sMotif ."',
                        '0')";
        $reqExe=mysql_query($sReq);
    }
?>
    <script language="Javascript">alert("les enreistrements ont ete effectué avec succès");
       window.location.replace("index.php")
    </script>

<?php
    

   
}*/