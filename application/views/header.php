<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title><?php echo $titrePage ?></title>

	<link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto:300,400" rel="stylesheet">
	<!-- CSS============================================= -->
	<link rel="stylesheet" href="<?php echo css_url('font-awesome.min'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('themify-icons'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('bootstrap'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('owl.carousel'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('magnific-popup'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('nice-select'); ?>">
	<link rel="stylesheet" href="<?php echo css_url('main'); ?>">
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
								<a class="dropdown-item" href="<?php echo lien('Organisation','bureauNational'); ?>">Commissariat Général</a>
								<a class="dropdown-item" href="<?php echo lien('Organisation','directionExecutive'); ?>">Direction Exécutive</a>
								<a class="dropdown-item" href="<?php echo lien('Organisation','commissariatDeRegion'); ?>">Commissariat Régionaux</a>
								<a class="dropdown-item" href="<?php echo lien('Organisation','forumDesJeunes'); ?>">Forum des jeunes</a>
							</div>
						</li>
						<li><a class="" href="<?php echo lien('Mediatheque','bibliotheque'); ?>">Bibliothèque</a></li>

						<li class="dropdown">
							<a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
								Portofolio
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="<?php echo lien('Portofolio','inscription'); ?>">S'inscrire</a>
								<a class="dropdown-item" href="<?php echo lien('Portofolio','consulter'); ?>">Consulter</a>
							</div>
						</li>
						<li><a href="<?php echo lien('Contact',''); ?>">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<!--================ End Header Area =================-->