<?php
 try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=vlyon', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$user = 1;
$mdp ="tes";
// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Technicien Where Tec_Matricule ="1" ');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
	$d = $donnees['Tec_Matricule'];
	$e = $donnees['Tec_Pwd'];
	echo $d;
	
	if ($d == $user){
		if ($e == $mdp){
			echo "utilisateur connectée";
			}
		else
		{
			echo"mot de passe incorrecte";
		}	
	}
	else
	{
		echo "utilisateur inconnue";
	}
?>


  Code : <?php echo $donnees['Tec_Matricule']; ?><br />
    Libelle : <?php echo $donnees['Tec_Pwd']; ?>   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>