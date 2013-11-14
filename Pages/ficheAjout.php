<?php
    include('../include/functions.php');
    login();
?>
<html>
<head>
	
</head>
<body>
<form id="login_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
<label for="velo">Velo : </label>
<input type="text" id="velo" name="velo"/></br>
<label for="motif">Motif : </label>
<input type="text" id="motif" name="motif"/></br>
<label for="traite">Intervention realise ? </label>
<input type="checkbox" id="traite" name="traite"/></br>
<input type="submit" name="go_createint" id="go_createint" value="Creer"/>
</form>
</body>
</html>