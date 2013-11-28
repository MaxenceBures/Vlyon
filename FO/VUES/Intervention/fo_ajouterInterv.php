<?php
	//require_once ("FO/Modeles/Intervention/lireIntervention.inc.php") ;
?>
	<form name="frm_ajouterInterv" id="frm_ajouterInterv" method="POST" action="?page=ajoutInterv">
		<input type="text" id="txt_date" name="txt_date" placeholder="Date Début"/>
		</br>
		<input type="text" id="txt_duree" name="txt_duree" placeholder="Durée (en heure)"/>
		</br>
		<textarea id="txt_detail" name="txt_detail" rows="4" cols="30" placeholder="Détails"></textarea>
		</br>
		<input type="radio" name="btn_termine" value="Oui"/>Oui
		<input type="radio" name="btn_termine" value="Non"/>Non
		</br>
		<input type="radio" name="btn_reparable" value="Oui"/>Oui
		<input type="radio" name="btn_reparable" value="Non"/>Non
		</br>
		<input type="radio" name="btn_surplace" value="Oui"/>Oui
		<input type="radio" name="btn_surplace" value="Non"/>Non
		</br>
		<input type="submit" id="cmd_valider" name="cmd_valider" value="Valider">
	</form>