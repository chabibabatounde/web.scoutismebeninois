




	


	<!--================ start footer Area =================-->
	<footer class="footer">
		<div class="footer-area">
			<div class="container">
				<div class="row section_gap">
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
								<a target="_blank" href="<?php echo lien('Web','login')?>" style="color:green">Connexion</a><br>
								une réalisation de 
								<a href="http://rodhousetechnology.com" style="color:red" target="_blank">Rod'House Technology</a><br>
							</p>
						</div>
					</div>
					<div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
						<div class="single-footer-widget tp_widgets">
							<h4 class="footer_title">Nos médias sociaux</h4>
							<ul class="list">
								<li>
									<a href="#">
									<span class="fa fa-facebook"></span> ScoutismeBéninois
									</a>
								</li>
								<li>
									<a href="#">
									<span class="fa fa-instagram"></span> ScoutBénin
									</a>
								</li>
								<li>
									<a href="#">
									<span class="fa fa-twitter"></span> ScoutBénin
									</a>
								</li>
								<li>
									<a href="#">
									<span class="fa fa-youtube"></span> Scoutisme Béninois
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--================ End footer Area =================-->

	<script src="<?php echo js_url('vendor/jquery-2.2.4.min'); ?>"></script>
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
<?php
	try {
	  if(file_exists('compteur_visites.txt'))
	  {
		$compteur_f = fopen('compteur_visites.txt', 'r+');
		$compte = fgets($compteur_f);
	  }
	  else
	  {
		$compteur_f = fopen('compteur_visites.txt', 'a+');
		$compte = 0;
	  }
	  if(!isset($_SESSION['compteur_de_visite']))
	  {
		$_SESSION['compteur_de_visite'] = 'visite';
		$compte++;
		fseek($compteur_f, 0);
		fputs($compteur_f, $compte);
	  }
	  fclose($compteur_f);
	}
	catch (Exception $e) {
	}
?>
</html>