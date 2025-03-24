	<?php
	require 'header.php';
	?>
	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Actualités scoutes</h1>
					<p><?php echo $article['titre']?></p>
				</div>
			</div>
		</div>
	</section>

  	<section class="blog_area single-post-area section-gap">
  		<div class="container">
	      	<div class="row">
	      		<div class="col-lg-12 posts-list">
			        <div class="single-post">
			            <div class="blog_details">
							<h2><?php echo $article['titre']?></h2>
							<ul class="blog-info-link mt-3 mb-4">
								<li><a href="#"><i class="fa fa-agenda"></i><?php echo $article['publication']?></a></li>
								<li><a href="#"><i class="fa fa-eye"></i> <?php echo $article['nmbreLu']?> Fois</a></li>
							</ul>
			            </div>
			        </div>
			    </div>

	      		<!--div class="col-lg-4 posts-list">
			        <div class="single-post">
			            <div class="feature-img">
			              <img style="width: 100%" class="img-fluid" src="<?php echo img_url('news/'.$article['couverture']); ?>" alt="">
			            </div>
			        </div>
			    </div-->
			    
		        <div class="col-lg-12 posts-list">
		        	<div class="single-post">
			            <div class="feature-img">
			            	<center>
			              		<img style="width:80%" class="img-fluid" src="<?php echo img_url('news/'.$article['couverture']); ?>" alt="">
			            	</center>
			            </div>
			        </div>

			        <div class="single-post">
			            <div class="blog_details">
							<p class="excert" style="text-align: justify;">
								<?php echo $article['contenu']?>
							</p>
							<p class="excert">
									<?php
										foreach ($pieceJointes as $pieceJointe) {
											if ($pieceJointe['type']=="others") {
											?>
												<a download="<?php echo $pieceJointe['filename'] ?>" href="<?php echo urlDeBase()."/assets/piecejointe/".$pieceJointe['filename']  ?>">
				              						<img style="width:18px;" class="img-fluid" src="<?php echo img_url('raw.png'); ?>" alt="">
													Télécharger [<?php echo $pieceJointe['filename'] ?>] <br>
												</a>
											<?php
											}
										}
									?>
									<center>
									<?php
										if(trim($article['youtube'])!=""){
											$lien = explode("/", $article['youtube']);
											$pos = strpos($lien[count($lien)-1], "?v=");
											$videoId = "";
											if($pos > 0){
												$lien = explode("?v=", $lien[count($lien)-1]);
												$videoId = $lien[count($lien)-1];
											}else{
												$videoId = $lien[count($lien)-1];
											}
									?>
											<center>cliquez sur l'image ci-dessous pour lire la vidéo <br><br></center>

										<div class="videocontainer">
										<iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo $videoId ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
										<div>
										<br><br>
									<?php
										}
									?>
										<div class="row">
									<?php
										foreach ($pieceJointes as $pieceJointe) {
											if ($pieceJointe['type']=="images") {
											?>
											<div class="col-lg-6">
													<img src="<?php echo urlDeBase()."/assets/piecejointe/".$pieceJointe['filename']  ?>" style="display: inline; width: 100%; margin-top: 10px;"> <br>
												</div>
											<?php
											}
										}
									?>
										</div>
									<?php
									foreach ($pieceJointes as $pieceJointe) {
										if ($pieceJointe['type']=="videos") {
											?>
											<br>
											<br>
											<video controls style="width:85%; height:300px" src="<?php echo urlDeBase()."/assets/piecejointe/".$pieceJointe['filename']  ?>"></video>
											<?php
										}
									}
								?>
								</center>
							</p>
			            </div>
			        </div>
			    </div>
			    
			</div>
	    </div>
	</section>
	<style type="text/css">
		.videocontainer {
		  position: relative;
		  overflow: hidden;
		  width: 100%;
		  padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
		}

		/* Then style the iframe to fit in the container div with full height and width */
		.responsive-iframe {
		  position: absolute;
		  top: 0;
		  left: 0;
		  bottom: 0;
		  right: 0;
		  width: 100%;
		  height: 100%;
		}
	</style>

	<?php
	require 'footer.php';
	?>