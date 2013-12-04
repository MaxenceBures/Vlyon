<?php
try
{
  
  function connect(){
     mysql_connect('localhost', 'Vlyon', 'mpvlyon'); // Votre serveur (ex : 'localhost'), login serveur (ex : 'root'), mot de passe (ex : '')
     mysql_select_db('Vlyon'); // Nom de votre base de données
  } 

 }
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
        echo"connexion non fonctionnel";
}
     connect();
    function login() {
 
        // Si on a soumit le formulaire (si on a cliqué sur "Se connecter")
        if(isset($_POST['go_login'])) {
 
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
                    if(sha1($_POST['password']) == $user->Tec_Pwd) 
                    {
 
                        // Si on arrive jusque ici c'est que le couple login / mot de passe est résolu
                        // On lance donc la session
 
                        session_start();
                        $_SESSION['Resp'] = $user->Tec_Responsable;
                        $_SESSION['id'] = $user->Tec_Matricule;
                        header('Location: ../index.php');
 
                    }
                    else {
                        echo 'Mauvais mot de passe pour cet utilisateur.';
                    }
 
                } 
                else {
                
                    echo 'Ce login nexiste pas dans notre base.';
                }
            } 
            else {
            
                echo 'Vous devez remplir tous les champs !';
            }
        }
    }
   
    function logout() {
    
        session_start();
        unset($_SESSION);
        session_destroy();
        ?>
         	<script language="Javascript">
		      	alert("Vous êtes deconnecté");
			      window.location.replace("../../index.php")
    			</script>
		<?php
    }
   
    function ListeDeroulanteStation()
    {       
        $sReq = " SELECT Sta_Code, Sta_Nom 
                  FROM Station ";
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
        $sReq = " SELECT Tec_Nom, Tec_Prenom, Tec_Responsable FROM TECHNICIEN Where Tec_Matricule='".$id."'";
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
		    $sReq = " SELECT DemI_Num, DemI_Velo, DemI_Attache, DemI_Station, DemI_Date, DemI_Motif, DemI_Traite  FROM DEMANDEINTER WHERE DemI_Technicien='".$id."' AND DemI_Valide=1 ";
	     	$rstPdt = mysql_query($sReq) ;
		    $iNb = 0 ;
		    $demande = array() ;		
		      while ($demande2 = mysql_fetch_assoc($rstPdt) )
		         {
			         $iNb = $iNb + 1 ;
			         $demande[$iNb] =  $demande2 ;
		         }
		  return ($demande) ;
	}

     function listeint()
    {   
        $id = $_SESSION['id'];
        $sReq = " SELECT BI_Num, BI_Velo, BI_DatDebut, BI_DatFin, BI_Reparable, BI_Demande, BI_SurPlace, BI_Duree, BI_CpteRendu, BI_Technicien  FROM boninterv";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $intevention = array() ;    
          while ($intevention2 = mysql_fetch_assoc($rstPdt) )
             {
               $iNb = $iNb + 1 ;
               $intevention[$iNb] =  $intevention2 ;
             }
      return ($intevention) ;
  }

  function listedemande2int($id)
    {   
        
        $sReq = " SELECT DemI_Num, DemI_Velo, DemI_Attache, DemI_Station, DemI_Date, DemI_Motif, DemI_Traite  FROM DEMANDEINTER WHERE DemI_Num='".$id."' AND DemI_Valide=1 ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $demande = array() ;    
          while ($demande2 = mysql_fetch_assoc($rstPdt) )
             {
               $iNb = $iNb + 1 ;
               $demande[$iNb] =  $demande2 ;
             }
      return ($demande) ;
  }

    function listedemandeintAdmin()
    {       
        $id = $_SESSION['id'];
        $sReq = "SELECT DemI_Num, DemI_Velo, DemI_Attache, DemI_Station, DemI_Date, DemI_Motif, DemI_Traite, DemI_Technicien, DemI_Valide FROM DEMANDEINTER ";
        $rstPdt = mysql_query($sReq) ;
        $iNb = 0 ;
        $demande = array() ;        
          while ($demande2 = mysql_fetch_assoc($rstPdt) )
            {
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
			 $velo = $_POST['velo'];
			 $motif = $_POST['motif'];
       $attache = $_POST['attache'];
       $station = $_POST['station'];
       $motif = $_POST['motif'];
			  	if (empty($_POST['traite']))
			     {
				      	$traite = 0;
			     }
				  else
				   {
					      $traite = 1;
				   }
				$count = mysql_fetch_row(mysql_query("SELECT max(DemI_Num) from DEMANDEINTER"));
				$test = $count[0] + 1;
				$query = mysql_query("INSERT INTO DEMANDEINTER(DemI_Num, DemI_Velo, DemI_Date, DemI_Technicien, DemI_Motif, DemI_Traite, DemI_Attache, DemI_Station, DemI_Valide) VALUES('".$test."', '".$velo."','".$date."', '".$id."', '".$motif."', '".$traite."','".$attache."','".$station."', '1')") or die (mysql_error());
		?>
             	<script language="Javascript">
			alert("Demande enregistré");
			window.location.replace("../../index.php")
			</script>
		<?php 
	 }
	}

  function createint(){
     if (isset($_POST['go_createinter'])) 
     {
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
        $count = mysql_fetch_row(mysql_query("SELECT max(BI_Num) from boninterv"));
        $test = $count[0] + 1;
        $query = mysql_query("INSERT INTO boninterv(BI_Num, BI_Velo, BI_DatDebut, BI_DatFin,BI_CpteRendu, BI_Reparable, BI_Demande, BI_SurPlace, BI_Duree, BI_Technicien) VALUES('".$test."', '".$velo."','".$db."', '".$df."', '".$cr."', '".$rp."','".$de."','".$dr."', '".$sp."', '".$id."')") or die (mysql_error());
    ?>                                                                                                                                                                                      
              <script language="Javascript">
      alert("intevention enregistré");
      window.location.replace("../../index.php")
      </script>
    <?php 
   }
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
        $query = mysql_query("UPDATE boninterv SET BI_CpteRendu='".$cr."', BI_DatFin='".$df."', BI_Duree ='".$dr."', BI_Demande='".$de."', BI_SurPlace='".$sp."', BI_Reparable='".$rp."'  Where BI_Num='".$id."'") or die (mysql_error());
         ?>
              <script language="Javascript">
                alert("Modification enregistré");
                window.location.replace("../../index.php")
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
        $query = mysql_query("UPDATE demandeinter SET DemI_Motif='".$motif."', DemI_Attache='".$attache."', DemI_Station='".$station."', DemI_Traite='".$traite."'  Where DemI_Num='".$id."'") or die (mysql_error());
            
         ?>
              <script language="Javascript">
                alert("Modification enregistré");
                window.location.replace("../../index.php")
              </script>
          <?php
       
      }
    }

?>