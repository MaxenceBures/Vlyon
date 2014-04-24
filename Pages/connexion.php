<?php
	//include('include/functions.inc.php');
    login();
    //Bures Maxence
?>
<html>
<head>
<link rel="stylesheet" href="css/login.css" />
<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,user-scalable=no" />
</head>
<body>
	<div id="login-form">
	<h3>Login</h3>
		<fieldset>
			<form id="connexion_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
				<label for="login">Matricule : </label></br>
				<input type="text" required=""  id="login" name="login"/></br>
				<label for="password">Mot de passe : </label>
				<input type="password" required="" id="password" name="password"/></br>
				<input type="submit" name="go_login" id="go_login" value="Se connecter"/>
			</form>
		</fieldset>
	</div>		
</body>
</html>