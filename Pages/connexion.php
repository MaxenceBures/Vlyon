<?php
	// include('include/functions.php');
	include('../include/functions.inc.php');
    login();
    //Bures Maxence
?>
<html>
<head>

</head>
<body>
	<form id="connexion_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="login">Matricule : </label>
		<input type="text" required="" id="login" name="login"/></br>
		<label for="password">Mot de passe : </label>
		<input type="password" required="" id="password" name="password"/></br>
		<input type="submit" name="go_login" id="go_login" value="Se connecter"/>
		</form>
</body>
</html>