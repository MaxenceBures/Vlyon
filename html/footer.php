	</article>
		</div>
		</div>
		<div id="sidebar">
			<div id="logo">
				<?php
				$utilisateur =utilisateur();
					foreach ($utilisateur as $utilisateurs)
				{
					echo strtoupper($utilisateurs["TEC_NOM"]);
					echo" - ";
					echo strtoupper($utilisateurs["TEC_PRENOM"]);
					$resp = $utilisateurs["TEC_RESPONSABLE"];
				}
				?>
			</div>
			<nav id="nav">
				<ul>
					<?php
					if($resp == '1')
					{
						/**
						 * @todo virer les xxx/xxx/xxx.zz et utiliser des ?page=action
						 */
						?>
						<li><a href="?page=ListeDemandeAdmin">Liste Demande</a></li>
						<li><a href="?page=listeIntervention">Liste Intervention</a></li>
						<?php
					}
					else
					{
						?>
						<li><a href="?page=listeDemande">Liste Demande</a></li>
						<?php
					}
					?>
					<li><a href="?page=afficherStation">Afficher les Stations</a></li>
					<li><a href="?page=FicheAjout">Ajout Demande</a></li>
					<li><a href="?page=InterventionAjout">Ajout Intervention</a></li>
					<li><a href="?page=CommandeProd">Commander Produit</a></li>
					<li><a href="?page=CommandeListe">Liste Commande</a></li>
					<li><a href="Pages/deconnexion.php">Se deconnecter</a></li>
				</ul>
			</nav>
		</div>
	</body>
</html>