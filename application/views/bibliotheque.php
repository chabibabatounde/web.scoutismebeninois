	<?php
	require 'header.php';
	?>
	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Bibliothèque scoute</h1>
					<p>Scoutisme Béninois </p>
				</div>
			</div>
		</div>
	</section>

	<section class="whole-wrap">
		<div class="container">
			<div class="section-top-border">
				<h3 class="mb-30">Retrouvez tous nos documents en téléchargement libre dans la bibliotheque du scoutisme béninois</h3>
				<div class="progress-table-wrap">
					<div class="progress-table">
						<center>
							<input style="width:99%; border:none; padding-bottom:05px;	 padding-top:05px;	 border-bottom: solid 1px black;"  onkeyup="rechercher(this)" id="recherche" type="" name="" placeholder="Que cherchez-vous?">
						</center>
						<br>
						<?php
							foreach ($livres as $livre) {
						?>
							<div title="<?php echo $livre['nomDocument']; ?>" class="table-row" style="padding-left: 20px;">
								<a href="<?php echo biblio_url($livre['fichier']) ?>">
									<?php echo $livre['nomDocument']; ?>
									<span style="display: block; color: black;">
										Mise à jour le 
										<?php echo $getDate($livre['dateAjout']); ?> 
										<?php echo $getMois($livre['dateAjout']); ?> 
										<?php echo $getAnnee($livre['dateAjout']); ?>
									</span>
								</a>
							</div>
						<?php
							}
						?>
					</div>
				</div>
			</div>
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