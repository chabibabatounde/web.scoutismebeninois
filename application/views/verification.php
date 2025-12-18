	<?php
	require 'header.php';
	?>
	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Authentification de reçu</h1>
					<p>Vérifiez ici si votre reçu de paiement est authentique et reconnu par le mouvement</p>
				</div>
			</div>
		</div>
	</section>

	<section class="whole-wrap" style="background-color: white;">
		<div class="container">
			<?php
			if(!isset($_GET['find'])){
			?>
			<div class="section-top-border">
				<h3 class="mb-30">Veuillez saisir la référence de votre reçu.</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
							<form action="" method="GET">
								<input style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;"  name="find" placeholder="Saisir sla référence"><br><br>

								<center>
									<strong>
										Ou vérifiez par Nom, prénom, et année
									</strong>
								</center>

								<br><br>

								<input style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;"  name="find" placeholder="Nom">

								<br><br>

								<input style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;"  name="find" placeholder="Prénom">

								<br><br>

								<select style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;">
									<option value=""> -- Année de cotisation -- </option>
				                    <?php
				                      for ($i=date('Y')+3; $i > 2021; $i--) {
				                    ?>
				                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
				                    <?php
				                      }
				                    ?>
								<select>

								<br><br><br>

			                  	<button type="submit" class="button button-contactForm primary-btn">Vérifier la référence</button>
							</form>
						<br>
					</div>
				</div>
			</div>
			<?php
			}
			else{
				?>
				<div class="section-top-border">
				<?php
				if(sizeof($cotisation)==1){
					$cotisation = $cotisation[0];
				?>
				<h3 class="mb-30">Chèr(e) <?php echo $cotisation['prenom']." ".$cotisation['nom'] ?>, <br><br> <span class="fa fa-hand-peace-o"></span> Votre reçu est authentique </h3>
				<?
			?>
					<div class="progress-table">
						<h4 style="display: inline;">Date de Paiement : </h4> <?php echo $cotisation['datePaiement']; ?><br>
						<h4 style="display: inline;">N° de Transaction : </h4> 00<?php echo $cotisation['idCotisation']; ?><br><br>

						<h4 style="display: inline;">Année de cotisation : </h4> <?php echo $cotisation['annee']; ?><br>
						<h4 style="display: inline;">Région : </h4> <?php echo $cotisation['nomRegion']; ?><br>
						<h4 style="display: inline;">District : </h4> <?php echo $cotisation['nomDistrict']; ?><br>
						<h4 style="display: inline;">Categorie : </h4><?php echo $cotisation['categorie']; ?><br><br>

						<h4 style="display: inline;">Montant de la cotisation : </h4><?php echo $cotisation['montantNet']; ?> F CFA<br>
						<h4 style="display: inline;">Frais de transaction : </h4><?php echo ($cotisation['montantPaye'] - $cotisation['montantNet']); ?> F CFA<br>
						<h4 style="display: inline;">Montant Net payé : </h4><?php echo $cotisation['montantPaye']; ?> F CFA<br><br>
						<h4 style="display: inline;">Référence : </h4> <?php echo $cotisation['transactionId']; ?><br>
						<br>
					</div>
					<?php
					}
					else{
					?>
					<h3 class="mb-30"><span class='fa fa-window-close'></span> Désolé nous n'avons pas pu authentifier votre référence </h3>
					Merci de vous assurez que :
					<ol style="padding: 15px;">
						<li>- Votre référence est bien saisie</li>
						<li>- Vous avez saisie la référence sans des espaces</li>
						<li>- Vous faites bien la différence entre le chiffre zéro et la lettre "O"</li>
					</ol>

					Besoin d'aide? <a target="_blank" href="https://wa.me/22940168496?text=Bonjour, Je n'arrive pas à authentifier mon reçu dont le numéro est le suivant :<?php echo $_GET['find'] ?> ">Cliquez ici pour</a> envoyez un message whatsapp à l'administrateur du système pour plus d'information. <br><br><br>

					<?php
					}
					?>
					<center>
						<h4>Un autre reçu à vérifier?</h4>
					</center>
					<form action="" method="GET">
	                  	<input style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;"  name="find" placeholder="Saisir sla référence"><br><br>

							<center>
								<strong>
									Ou vérifiez par Nom, prénom, et année
								</strong>
							</center>

							<br><br>

							<input style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;"  name="find" placeholder="Nom">

							<br><br>

							<input style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;"  name="find" placeholder="Prénom">

							<br><br>

							<select style="margin-top: 20px; width:99%; border:none; padding-bottom:05px; padding-top:05px;	 border-bottom: solid 1px black;">
								<option value=""> -- Année de cotisation -- </option>
			                    <?php
			                      for ($i=date('Y')+3; $i > 2021; $i--) {
			                    ?>
			                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
			                    <?php
			                      }
			                    ?>
							<select>

							<br><br><br>

		                  	<button type="submit" class="button button-contactForm primary-btn">Vérifier la référence</button>
					</form>
			</div>
			<?php
			}
			?>
		</div>
	</section>
	<?php
	require 'footer.php';
	?>

	<script>
		function rechercher(input) {
			let recherche = input.value;
			recherche = recherche.toUpperCase();
  			let table = document.getElementsByClassName("table-row");
  			for (var i = table.length - 1; i >= 0; i--) {
  				let titre = table[i].getAttribute('title').toUpperCase();
  				if (titre.indexOf(recherche) > -1) {
					table[i].style.display = "";
				} else {
					table[i].style.display = "none";
				}
  			}
		}
	</script>
