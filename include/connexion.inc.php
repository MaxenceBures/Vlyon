<?php
function connect(){
    try{
        mysql_connect('localhost', 'vlyon', 'vlyon'); // Votre serveur (ex : 'localhost'), login serveur (ex : 'root'), mot de passe (ex : '')
        mysql_select_db('vlyon'); // Nom de votre base de données
    }
    catch(Exception $e){
        // En cas d'erreur, on affiche un message et on arrête tout
        echo"connexion non fonctionnel";
        die('Erreur : '.$e->getMessage());
    }
}
	function connecter()
	{
		$oSql = new clstBaseMysql("localhost", "root", "", "Vlyon") ;
		return ($oSql) ;
	}