	<?php
	require 'header.php';
	?>
	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Agenda scout</h1>
					<p><?php echo $evenement['titre']?> </p>
				</div>
			</div>
		</div>
	</section>

  	<section class="blog_area single-post-area section-gap">
  		<div class="container">
	      	<div class="row">
		        <div class="col-lg-8 posts-list">
			        <div class="single-post">
			            <div class="blog_details">
							<h2><?php echo $evenement['titre']?></h2>
							<ul class="blog-info-link mt-3 mb-4">
							<li><a href="#"><i class="fa fa-agenda"></i>
								<?php echo $getDate($evenement['dateEvenement']); ?>
								<?php echo $getMois($evenement['dateEvenement']); ?>
								<?php echo $getAnnee($evenement['dateEvenement']); ?> 

							</a></li>
							</ul>
							<p class="excert" style="text-align: justify;">
								<?php echo $evenement['contenu']?>
							</p>
			            </div>
			        </div>
			    </div>
			    <div class="col-lg-4 posts-list">
			        <div class="single-post">
			            <div class="feature-img">
			              <img class="img-fluid" src="<?php echo img_url('event/'.$evenement['couverture']); ?>" alt="">
			            </div>
			            <!--div class="blog_details">
			            	<h3>Partager avec vos proches</h3>
			            	<ul class="blog-info-link mt-3 mb-4">
				                <li><a href="#"><i class="fa fa-whatsapp"></i> Whatsapp</a></li>
				                <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
				                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
			              	</ul>
			        	</div-->
			        </div>
			    </div>
			</div>
	    </div>
	</section>

	<?php
	require 'footer.php';
	?>