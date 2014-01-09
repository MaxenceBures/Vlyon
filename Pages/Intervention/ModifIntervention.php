<?php
//session_start();
if(isset($_SESSION['id'])) {
//	require_once('include/functions.php');
//	connect();
	//Bures Maxence
	$id = $_GET['variable'];
	modifinter();
	$requete = "SELECT * FROM boninterv where BI_NUM= '".$id."'";
	$enreg = mysql_fetch_assoc(mysql_query($requete));
	?>
	<html><body>
	<a href="index.php"><img src="css/Home.png" border="0" align="center" width=60 height=60></img></a></br>
	<form id="modif_form" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
	<input type='hidden' name="id" id="id" value='<?php echo($id); ?>'/>
	<table class="style1">
			<tr>
					<td>
						<label for="ni">Num Intervention : </label>
					</td>
					<td>
						<input type="text" id="ni" name="ni" disabled="" value="<?php echo($enreg["BI_NUM"]); ?>"/>
					</td>
				</tr>

				<tr>
					<td>
						<label for="velo">Velo : </label>
					</td>
					<td>
						<input type="text" id="velo" name="velo" disabled="" value="<?php echo($enreg["BI_VELO"]); ?>"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="attache">Date Fin: </label>
					</td>
					<td>
						<input type="date" id="df" value="<?php echo($enreg['BI_DATFIN']) ?>" name="df"/>
					</td>
				</tr>
				</br>
				<tr>
					<td>
						<label for="cr">Compte rendu : </label>
					</td>
					<td>
						<textarea rows="4" cols="50"id="cr" name="cr"><?php echo($enreg['BI_CPTERENDU']) ?></textarea>
					</td>
				</tr>

				</br>
				<tr>
					<td>
						<label for="rp">Reparable </label>
					</td>
					<td>
						<input type="checkbox" id="rp"  value="<?php echo($enreg['BI_REPARABLE']) ?>"name="rp"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="de">Demande </label>
					</td>
					<td>
						<input type="checkbox" id="de"  value="<?php echo($enreg['BI_DEMANDE']) ?>" name="de"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="sp">Sur Place </label>
					</td>
					<td>
						<input type="checkbox" value="<?php echo($enreg['BI_SURPLACE'])?>" id="sp" name="sp"/>
					</td>
				</tr>
					</br>
				<tr>
					<td>
						<label for="dr">Durée </label>
					</td>
					<td>
						<input type="text"  value="<?php echo($enreg['BI_DUREE'])?>" id="dr" name="dr"/>
					</td>
				</tr>
			</table>
			</br>
						<input type="submit" name="go_modifint" id="go_modifint" value="Modifier"/>
		</form>
	</body></html>
<?php
}
else
{
header('Location:/Vlyon/Pages/connexion.php');
}
?>
