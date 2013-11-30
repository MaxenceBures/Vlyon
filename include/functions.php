<?php
//session_start();
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
                        $_SESSION['id'] = $user->Tec_Matricule;
                        //$_SESSION['login'] = $user->login;
                          header('Location: ../index.php');
 
                    }
                    else {
                        echo 'Mauvais mot de passe pour cet utilisateur.';
                    }
 
                } 
                else {
                var_dump($query);
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
       // header ('Location:../index.php');
        ?>
             	<script language="Javascript">
			alert("Vous êtes deconnecté");
			window.location.replace("../index.php")
			</script>
		<?php
    }
   
    function ListeDeroulanteStation()
    {       
     //   $oSql= connect() ;        
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
/*function listedemandeint(){
	
 	
			
	$query = mysql_query("SELECT DemI_Num, DemI_Velo, DemI_Date, DemI_Motif, DemI_Traite FROM DEMANDEINTER WHERE DemI_Technicien='".$id."'") or die (mysql_error());
             var_dump($query);
	}		*/
	function listedemandeint()
	{		
		
        $id = $_SESSION['id'];
		//$oSql=  mysql_connect("localhost", "Vlyon", "mpvlyon");	
		$sReq = " SELECT DemI_Num, DemI_Velo, DemI_Attache, DemI_Station, DemI_Date, DemI_Motif, DemI_Traite  FROM DEMANDEINTER WHERE DemI_Technicien='".$id."' ";
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
     //   $oSql=  mysql_connect("localhost", "Vlyon", "mpvlyon"); 
        $sReq = "SELECT DemI_Num, DemI_Velo, DemI_Attache, DemI_Station, DemI_Date, DemI_Motif, DemI_Traite, DemI_Technicien FROM DEMANDEINTER ";
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

    function SuppDem()
    {
         if (isset($_POST['go_SuppDem'])) 
         {
             $id = $_POST['code'];
                echo ($id);
                var_dump($id);            
              // $query = mysql_query("DELETE * FROM DEMANDEINTER WHERE DemI_Num ='".$id."'") or die (mysql_error());
            //var_dump($query);
         }
    }

	function createdemandeint(){
		 if (isset($_POST['go_createint'])) 
		 {
			// connect();
			 $date = date("Y-m-d");
			 $id = $_SESSION['id'];
			 $velo = $_POST['velo'];
			 $motif = $_POST['motif'];
             $attache = $_POST['attache'];
             $station = $_POST['station'];
            // Si les deux champs ne sont pas vides
            if( !empty($_POST['velo']) && !empty($_POST['motif'])) 
            {
            	$motif = $_POST['motif'];
				//echo($_POST['velo']);
				//echo($_POST['motif']);
				if (empty($_POST['traite']))
				{
					$traite = 0;
				}
				else
				{
					$traite = 1;
				}
				echo($traite);
				
				$count = mysql_fetch_row(mysql_query("SELECT max(DemI_Num) from DEMANDEINTER"));
				$test = $count[0] + 1;
				$query = mysql_query("INSERT INTO DEMANDEINTER(DemI_Num, DemI_Velo, DemI_Date, DemI_Technicien, DemI_Motif, DemI_Traite, DemI_Attache, DemI_Station) VALUES('".$test."', '".$velo."','".$date."', '".$id."', '".$motif."', '".$traite."','".$attache."','".$station."')") or die (mysql_error());
             var_dump($query);
		?>
             	<script language="Javascript">
			alert("Demande enregistré");
			window.location.replace("../index.php")
			</script>
		<?php
			 }
	}
	}
?>