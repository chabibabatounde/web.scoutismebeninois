	<?php
	require 'header.php';
	?>
	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Nous contacter</h1>
					<p>
          <?php
            echo $message;
          ?>
           </p>
				</div>
			</div>
		</div>
	</section>

	<section class="section-gap">
    	<div class="container">
	      <div class="row">
        <div class="col-12">
          <?php
            echo $message;
          ?>
          <h2 class="contact-title">Veuillez remplir le formulaire</h2>

        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" placeholder="Que voulez-vous nous dire?"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Quel est votre nom?">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Votre adresse e-mail">
                </div>
              </div>
            </div>
            <div class="form-group mt-2 mb-5 mb-lg-0">
              <button type="submit" class="button button-contactForm primary-btn">Envoyer le Message</button>
            </div>
          </form>
        </div>

        <div class="col-lg-4">
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fa fa-home"></i></span>
            <div class="media-body">
              <h3>Cotonou, Rép. Bénin</h3>
              <p>Qtier Wologuèdè</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fa fa-phone"></i></span>
            <div class="media-body">
              <h3><a href="tel:96089066">(+ 229) 96 08 90 66 / 96 01 04 92</a></h3>
              <p>Lundi au Vendredi de 9h à 18h</p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="fa fa-envelope-o"></i></span>
            <div class="media-body">
              <h3><a href="mailto:info@scoutismebeninois.org">info@scoutismebeninois.org</a></h3>
              <p>Ecrivez vous à tout moment!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>







	<?php
	require 'footer.php';
	?>