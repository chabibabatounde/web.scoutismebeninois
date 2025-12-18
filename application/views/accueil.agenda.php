
	<!--================ Start Upcoming Event Area =================-->
	<section class="upcoming_event_area section-gap-top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<div class="section-title">
						<h2><span>Evénements scouts</span> </h2>
					</div>
				</div>
			</div>

			<div class="row" id='agenda-page'>
				

				<?php
					foreach ($evenements as $evenement) {
				?>
					<div class="col-lg-6">
						<div class="single_upcoming_event">
							<div class="row align-items-center">
								<div class="col-lg-6 col-md-6">
									<figure>
										<img class="img-fluid w-100" src="<?php echo img_url('event/thumb-'.$evenement['couverture']); ?>" alt="">
									</figure>
								</div>
								<div class="col-lg-6 col-md-6">
									<div class="content_wrapper">
										<h3 class="title">
											<a href="<?php echo lien("Evenement",'lecture/'.$evenement['idEvenement']); ?>"><?php echo $lessEvent($evenement['titre']); ?></a>
										</h3>
										<p>
											<?php echo ($evenement['nomCategorie']); ?>
										</p>
										<div class="d-flex count_time justify-content-lg-start justify-content-center" id="clockdiv1">
											<div class="single_time">
												<h4 class="days"><?php echo $getDate($evenement['dateEvenement']); ?> </h4>
											</div>
											<div class="single_time">
												<h4 class="hours"><?php echo $getMois($evenement['dateEvenement']); ?> </h4>
											</div>
											<div class="single_time">
												<h4 class="minutes"><?php echo $getAnnee($evenement['dateEvenement']); ?> </h4>
											</div>
										</div>
										<a href="<?php echo lien("Evenement",'lecture/'.$evenement['idEvenement']); ?>" class="primary-btn2">Voir les détails</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</section>
	<!--================ End Upcoming Event Area =================-->
