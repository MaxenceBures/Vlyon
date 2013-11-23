<?php
//session_start();
 try
{
  
    mysql_connect('localhost', 'Vlyon', 'mpvlyon'); // Votre serveur (ex : 'localhost'), login serveur (ex : 'root'), mot de passe (ex : '')
    mysql_select_db('Vlyon'); // Nom de votre base de données
 }
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
        echo"connexion non fonctionnel";
}
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
    
        //session_start();
        unset($_SESSION);
        session_destroy();
        header ('Location:../index.php');
    }
   
	function createdemandeint(){
		 if (isset($_POST['go_createint'])) 
		 {
			 
			 $date = date("d-m-Y");
			 $id = $_SESSION['id'];
			 $velo = $_POST['velo'];
			 $motif = $_POST['motif'];
            // Si les deux champs ne sont pas vides
            if( !empty($_POST['velo']) && !empty($_POST['motif'])) 
            {
            	$motif = $_POST['motif'];
				//echo($_POST['velo']);
				//echo($_POST['motif']);
				if (empty($_POST['traite']))
				{
					$traite = false;
				}
				else
				{
					$traite = true;
				}
				echo($traite);
			
				$count = mysql_num_rows(mysql_query("SELECT count(DemI_Num) from DEMANDEINTER"));
						//echo ($count);
				$query = mysql_query("INSERT INTO DEMANDEINTER(DemI_Num, DemI_Velo, DemI_Date, DemI_Technicien, DemI_Motif, DemI_Traite) VALUES('".$count."','".$date."', '".$velo."', '".$id."', '".$motif."', '".$traite."')") or die (mysql_error());
             var_dump($query);
             
			 }
	}
	}
?>