<!DOCTYPE html>
<html lang="fr" class="no-js">

<head>
	<meta charset="UTF-8">
    <title><?php echo $titrePage ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="keywords" content="Scoutisme, Benin, Scout"/>
    <?php
    $animage = 0;
    if(isset($article['titre'])){
    $animage = 1;
    ?>
    <meta property="og:url" content="<?php echo lien('Article','r/'.$article['idArticle']."/".$urlTitle($article['titre'])); ?>"/>
	<meta property="og:title" content="<?php echo $article['titre']; ?>"/>
    <meta property="og:description" content="Découvrez l'intégratlité de cet article sur le site web officiel du scoutisme béninois."/>
    <meta property="og:image" content="<?php echo img_url('news/thumb-'.$article['couverture']); ?>"/>

    <?php
    }

    
    if(isset($evenement['titre'])){
    $animage = 1;
    ?>
    <meta property="og:url" content="<?php echo lien('Evenement/','lecture/'.$evenement['idEvenement']); ?>"/>
	<meta property="og:title" content="<?php echo $evenement['titre']; ?>"/>
    <meta property="og:description" content="Découvrez l'intégratlité de cet evenement sur le site web officiel du scoutisme béninois."/>
    <meta property="og:image" content="<?php echo img_url('event/thumb-'.$evenement['couverture']); ?>"/>
    <?php
    }
    if($animage==0){
    ?>
    <meta property="og:url" content="scoutismebeninois.org"/>
	<meta property="og:title" content="<?php echo $titrePage ?>"/>
    <meta property="og:description" content="Découvrez notre association, notre actualité via notre site web officel et nos médias sociaux"/>
    <meta property="og:image" content="<?php echo img_url('min-logo.jpg'); ?>"/>
    <?php
    }
    ?>
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="fr_FR"/>
    <meta property="og:locale:alternate" content="fr_FR"/>
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:creator" content="@ScoutsBenin" />
    <meta name="twitter:site" content="@ScoutsBenin" />

	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto:300,400" rel="stylesheet">
	<!-- CSS============================================= -->
	<link rel="stylesheet" href="<?php echo css_url('font-awesome.min'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('themify-icons'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('bootstrap'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('owl.carousel'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('magnific-popup'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('nice-select'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('main'); ?>">

	<script src="<?php echo js_url('vendor/jquery-2.2.4.min'); ?>"></script>

</head>

<body>

	<!--================ Start Header Area =================-->
	<header class="default-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">
				<a class="navbar-brand" href="<?php echo lien('Welcome',''); ?>">
					<img src="<?php echo img_url('logo.png'); ?>" alt="">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fa fa-bars"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
					<ul class="navbar-nav">
						<li><a class="" href="<?php echo lien('Welcome',''); ?>">Accueil</a></li>
						
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								A Propos
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo lien('Apropos','historique'); ?>">Historique</a>
								<a class="dropdown-item" href="<?php echo lien('Apropos','produitsEtServices'); ?>">Produits et services</a>
								<a class="dropdown-item" href="<?php echo lien('Apropos','realisations'); ?>">Nos Réalisations</a>
							</div>
						</li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Organisation
							</a>
							<div class="dropdown-menu">

							<!--a class="dropdown-item" href="<?php echo lien('Organisation','comiteNational'); ?>"> Comité National</a-->

							<a class="dropdown-item" href="<?php echo lien('Organisation','bureauNational'); ?>"> Commissariat Général</a>
							

							<a class="dropdown-item" href="<?php echo lien('Organisation','directionExecutive'); ?>">Direction Exécutive</a>

							<a class="dropdown-item" href="<?php echo lien('Organisation','comiteNational'); ?>"> Comité National</a>


							<a class="dropdown-item" href="<?php echo lien('Organisation','verificateurs'); ?>"> Vérificateurs de Comptes </a>

							<a class="dropdown-item" href="<?php echo lien('Organisation','commissariatDeRegion'); ?>">Commissariats Régionaux</a>
							
							<a class="dropdown-item" href="<?php echo lien('Organisation','jeuneConseillers'); ?>">Comité National des Jeunes Conseillers</a>

							<a class="dropdown-item" href="<?php echo lien('Organisation','ancienscomissaires'); ?>">Anciens Secrétaires/Commissaires Généraux</a>
							</div>
						</li>

						<li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Presse
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo lien('Article',''); ?>"> Actualités </a>
								<a class="dropdown-item" href="<?php echo lien('Scoutinfo',''); ?>">Magazine SCOUT Info</a>
							</div>
						</li>




						<li><a class="" href="<?php echo lien('Welcome','#agenda-page'); ?>">Agenda</a></li>
						<li><a class="" href="<?php echo lien('Mediatheque','bibliotheque'); ?>">Bibliothèque</a></li>
						<li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Collecte
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo lien('Collecte','cotisation'); ?>">Cotisation annuelle</a>
								<a class="dropdown-item" href="<?php echo lien('Collecte','verification'); ?>">Vérifier un reçu</a>
							</div>
						</li>

						<!--li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Portofolio
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo lien('Portofolio','inscription'); ?>">S'inscrire</a>
								<a class="dropdown-item" href="<?php echo lien('Portofolio','consulter'); ?>">Consulter</a>
							</div>
						</li-->
						<li><a href="<?php echo lien('Contact',''); ?>">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!--================ End Header Area =================-->
