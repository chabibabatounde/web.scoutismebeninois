
	<!--================ start footer Area =================-->
	<footer class="footer" >
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap" id="footterHide">
					<div class="col-lg-8 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title large_title">Scoutisme Béninois</h4>
							<p>
								Association éducative pour les jeunes, membre de L’OMMS depuis 1964, volontaire, non politique,
					            non militaire, ouverts à tous. Mouvement de jeunes et d’adultes engagés volontairement pour promouvoir une éducation non formelle, 
					            complémentaire de la famille et de l’école. En tant que Organisation Non gouvernementale, il s’adresse à tous les jeunes, garçons et filles, sans aucune distinction d’origine sociale et ethnique, religieuse ou culturelle.
							</p>
							<p>
								Copyright &copy;

								<script>document.write(new Date().getFullYear());</script>
								Tous droits reservés <br>
								Conçu par
								<a href="https://rodolpho-babatounde.net" style="color:white" target="_blank">@chabibabatounde</a><br>

								<a target="_blank" href="https://mail46.lwspanel.com/webmail/" style="color:green">Webmail</a> | 
								<a target="_blank" href="<?php echo lien('Web','login')?>" style="color:green">Connexion</a>  |		
								<a target="_blank" href="<?php echo lien('Finances','login/2024')?>" style="color:green">CNFP</a> 

								<br>
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Nos médias sociaux</h4>
							<ul class="list">
								<li>
									<a href="https://www.facebook.com/scoutismebeninois" target="_blank">
									<span class="fa fa-facebook"></span> @scoutismebeninois
									</a>
								</li>
								<li>
									<a href="https://twitter.com/ScoutsBenin" target="_blank">
									<span class="fa fa-twitter"></span> @ScoutsBenin
									</a>
								</li>

								<li>
									<a href="https://www.instagram.com/scoutisme_beninois/" target="_blank">
									<span class="fa fa-instagram"></span> @scoutisme_beninois
									</a>
								</li>
								<li>
									<a href="https://www.youtube.com/channel/UCg92jxoNi1UjjPoG8ilTAqQ" target="_blank">
									<span class="fa fa-youtube"></span> @Scoutisme Béninois Officiel
									</a>
								</li>
								<li>
									<?php
										try{
											if(file_exists('compteur_visites.txt')){
												$compteur_f = fopen('compteur_visites.txt', 'r+');
												$compte = fgets($compteur_f);
											}
											else{
												$compteur_f = fopen('compteur_visites.txt', 'a+');
												$compte = 0;
											}
											$now = time();
											if(isset($_SESSION['compteur_de_visite'])){
												if($now > $_SESSION['compteur_de_visite']) {
													$_SESSION['compteur_de_visite'] = $now + 300;
													$compte++;
													fseek($compteur_f, 0);
													fputs($compteur_f, $compte);
												}
											}
											else{
												$_SESSION['compteur_de_visite'] = $now + 300;
												$compte++;
												fseek($compteur_f, 0);
												fputs($compteur_f, $compte);
											}
											echo "<a href='#'>".($compte+1)." visites depuis le 25/01/2022 </a>";
											fclose($compteur_f);
										}
										catch (Exception $e) {

										}
									?>
								</li>
							</ul>
						</div>
					</div>

					<div class="offset-lg-12 col-lg-12 col-md-12 col-sm-12">
						<center>

						</center>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area =================-->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="<?php echo js_url('vendor/bootstrap.min'); ?>"></script>
	<script src="<?php echo js_url('vendor/jquery.ajaxchimp.min'); ?>"></script>
	<script src="<?php echo js_url('parallax.min'); ?>"></script>
	<script src="<?php echo js_url('owl.carousel.min'); ?>"></script>
	<script src="<?php echo js_url('isotope.pkgd.min'); ?>"></script>
	<script src="<?php echo js_url('jquery.nice-select.min'); ?>"></script>
	<script src="<?php echo js_url('jquery.magnific-popup.min'); ?>"></script>
	<script src="<?php echo js_url('jquery.sticky'); ?>"></script>
	<script src="<?php echo js_url('main'); ?>"></script>
	<script src="<?php echo js_url('sweet'); ?>"></script>
	
</body>
</html>