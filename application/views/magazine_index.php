<?php
	require 'header.php';
?>
<section class="banner-area relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row justify-content-lg-end align-items-center banner-content">
			<div class="col-lg-5">
				<h1 class="text-white">Magazine SCOUT Info</h1>
			</div>
		</div>
	</div>
</section>



<section class="blog_area section-gap">
    <div class="container">
        <div class="row">
		<?php
			foreach ($journals as $magazine) {
		?>
			<div class="col-lg-6">
				<div class="single_upcoming_event">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6">
							<?php
								$cookie_name = "Scoutinfomag_".$magazine['idJournal'];
								if(isset($_COOKIE[$cookie_name])) {
							?>
							<a style="font-size:15px; text-decoration: none;" href="<?php echo lien("Scoutinfo",'v/'.$magazine['idJournal']."/page"); ?>" class="primary-btn2">
							<?php
								}
								else{
							?>
							<a style="font-size:15px; text-decoration: none;" href="<?php echo lien("Scoutinfo",'buy/'.$magazine['idJournal']); ?>" class="primary-btn2">
							<?php
								}
							?>
							<figure>
								<img class="img-fluid w-100" src="<?php echo img_url('mag/Journal-'.$magazine['idJournal'].".png"); ?>" alt="">
							</figure>
							 </a>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="content_wrapper">
								<h3 class="title">
									<a href="<?php echo lien("Scoutinfo",'v/'.$magazine['idJournal']); ?>">SCOUT Info N° <?php echo $magazine['numero']?> <br> <span style="font-size: 12px;"> du </span> <br><br> <?php echo $magazine['datePublication']?></a>
								</h3>
								<p>
									Lu <?php echo ($magazine['compteur']); ?> fois
								</p>

								<?php
								$cookie_name = "Scoutinfomag_".$magazine['idJournal'];
								if(isset($_COOKIE[$cookie_name])) {
								?>
									<br>
									<br>

									<a style="font-size:15px;" href="<?php echo lien("Scoutinfo",'v/'.$magazine['idJournal']."/page"); ?>" class="primary-btn2"> Ouvrir 📖 </a>


								<?php
								}
								else{
								?>
								<br>
									<h5>💵 : <?php echo $magazine['prix']?> F CFA </h5>
								<br>

								<a style="font-size:15px;" href="<?php echo lien("Scoutinfo",'buy/'.$magazine['idJournal']); ?>" class="primary-btn2"> Acheter 🛒  </a>
								<?php
									}
								?>
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
	</div>
</section>
<?php
	require 'footer.php';
?>