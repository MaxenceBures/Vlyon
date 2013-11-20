<?php
    include('../include/functions.php');
    createdemandeint();
?>
<html>
	<head>
	</head>
<body>
	<form id="ajout_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
		<table>
			<tr>
				<td>
					<label for="velo">Velo : </label>
				</td>
				<td>
					<input type="text" id="velo" name="velo"/>
				</td>
			</tr>
			</br>
			<tr>
				<td>
					<label for="motif">Motif : </label>
				</td>
				<td>
					<textarea rows="4" cols="50"id="motif" name="motif"></textarea>
				</td>
			</tr>
			</br>
			<tr>
				<td>
					<label for="traite">Intervention realise ? </label>
				</td>
				<td>
					<input type="checkbox" id="traite" name="traite"/>
				</td>
			</tr>
		</table>
		</br>
					<input type="submit" name="go_createint" id="go_createint" value="Creer"/>
	</form>
</body>
</html>