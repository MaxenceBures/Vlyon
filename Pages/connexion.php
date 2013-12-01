<?php
	//session_start();
    include('../include/functions.php');
    login();
?>
<html>
<head>
<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->	
</head>
<body>
	<div id="header" class="skel-panels-fixed">
	<form id="connexion_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<label for="login">Matricule : </label>
		<input type="text" required="" id="login" name="login"/></br>
		<label for="password">Mot de passe : </label>
		<input type="password" required="" id="password" name="password"/></br>
		<input type="submit" name="go_login" id="go_login" value="Se connecter"/>
		</form>
	</div>	
</body>
</html>