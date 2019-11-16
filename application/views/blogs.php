	<?php
	require 'header.php';
	?>
	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Nouvelles scoutes</h1>
					<p></p>
				</div>
			</div>
		</div>
	</section>

	<section class="blog_area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    	<?php
                    		foreach ($articles as $article) {
                    	?>
	                    	<article class="blog_item">
	                            <div class="blog_item_img">
	                                <img class="card-img rounded-0" src="<?php echo img_url('news/'.$article['couverture']); ?>" alt="">
	                                <span href="" class="blog_item_date">
	                                    <h3><?php echo $getDate($article['publication'])?></h3>
	                                    <p><?php echo $getMois($article['publication'])?></p>
	                                </span>
	                            </div>

	                            <div class="blog_details">
	                                <a class="d-inline-block" href="<?php echo lien('Article','lecture/'.base_convert($article['idArticle'], 10,14)) ?>">
	                                    <h2><?php echo $article['titre']; ?></h2>
	                                </a>
	                                <ul class="blog-info-link">
	                                    <li><span><i class="fa fa-agenda"></i><?php echo $article['publication']?></span></li>
										<li><span><i class="fa fa-eye"></i> <?php echo $article['nmbreLu']?> Fois</span></li>
	                                </ul>
	                            </div>
	                        </article>

                    	<?php
                    		}
                    	?>
                        
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Que cherchez-vous">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button primary-btn w-100" type="submit">Rechercher</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Catégories</h4>
                            <ul class="list cat-list">
                            	<?php
                            		foreach ($categories as $categorie) {
                            	?>
                            	<li>
                                    <a href="<?php echo lien('Article','categorie/'.$categorie['idCategorie'].'/'.$categorie['nomCategorie']) ?>" class="d-flex">
                                        <p><?php echo $categorie['nomCategorie']?></p>
                                    </a>
                                </li>
                            	<?php
                            		}
                            	?>
                                
                            </ul>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<?php
	require 'footer.php';
	?>