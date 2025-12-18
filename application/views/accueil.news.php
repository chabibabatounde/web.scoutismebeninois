

	<!--================ Start Popular Causes Area =================-->
	<section class="popular-cause-area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span>Nouvelles</span> récentes</h2>
					</div>
				</div>
			</div>

			<div class="row">
				<?php
					foreach ($nouvelles as $nouvelle) {
				?>

						<div class="col-lg-4 col-md-6">
							<div class="card single-popular-cause">
								<div class="card-body">
									<figure>
											<img class="card-img-top img-fluid" src="<?php echo img_url('news/thumb-'.$nouvelle['couverture']); ?>" alt="Card image cap">
									</figure>
									<div class="card_inner_body">
										<div class="tag"><?php echo $nouvelle['nomCategorie'] ?></div>
										<h5 class="card-title"><?php echo $titleLess($nouvelle['titre']) ?></h5>
										<div class="d-flex justify-content-between raised_goal">
											<p><?php echo $showDate($nouvelle['publication']) ?></p>
											<p></p>
										</div>
										<div class="d-flex justify-content-between donation align-items-center">
											<a href="<?php echo lien('Article','r/'.$nouvelle['idArticle']."/".$urlTitle($nouvelle['titre'])) ?>" class="primary-btn">Lire l'article</a>
											<p><span class="ti-eye mr-1"></span><?php echo $nouvelle['nmbreLu'] ?>  Fois</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
				?>
			</div>
	</section>
	<!--================ End Popular Causes Area =================-->


	<!--================ Start callto Area =================-->
	<section class="callto-area section-gap relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="call-wrap mx-auto" >
						<h1>Voulez-vous avoir plus d'actualités?</h1>
						<a href="#newslettersection">
							<p class="top_text">Cliquez ici pour vous abonner à notre newsletter </p>
						</a>
						<a href="<?php echo lien('Article',''); ?>" class="primary-btn mt-5">Voir tous les articles <i class="ti-angle-right ml-1"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div id='agenda-page'></div>
	<!--================ End callto Area =================-->