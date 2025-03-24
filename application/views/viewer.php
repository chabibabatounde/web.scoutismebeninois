<?php
	require 'header.php';
?>

	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">SCOUT Info</h1>
					<p>Numéro <?php echo $magazine['numero']?> du <?php echo $magazine['datePublication']?></p>
				</div>
			</div>
		</div>
	</section>



	<section class="blog_area section-gap">
        <div class="container">
            <div class="row">

            	<div class="col-lg-12" style="margin-bottom:20px">

            		
                </div>



            	<div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="<?php echo lien('Magazine', 'don'); ?>" method="post">
                                <div class="form-group">
                                	<h4>Avant d'aller plus loin...</h4>

                                	<div style="text-align:justify;">
                                		<br>
                                		Souhaitez-vous soutenir cette initiative de la Commission Nationale Chargée de la Communication et du Marketing ainsi que ses actions? Veuillez saisir le montant de votre choix puis procédez au paiement. Une version pdf de Scout Info vous sera transmise dans les meilleurs délais.
                                		<br>
                                		<br>
                                	</div>

                                    <div class="input-group mb-3">
                                        <input required="" min="500" class="form-control" placeholder="Saisir montant" name="montant" type="number">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="fa fa-money"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button primary-btn w-100" type="submit">Soutenir</button>
                                <br><br>
                                <img src="https://qinowaticket.com/images/site/cards.png">
                            </form>
                        </aside>
                    </div>
                </div>

                <div class="col-lg-8 pdfviewer">


                </div>



                <!--div class="col-lg-8">
                    NB: selon le debit de votre connexion internet, le chargement des pages peut prendre un peu de temps.
                    <div class="row iframe-container">
                        <iframe frameBorder="0" align="center" src="<?php echo mag_url($magazine['fileName'])?>#toolbar=0" width="95%"></iframe>
                    </div>
                </div-->

                <!--link rel="stylesheet" href="<?php echo css_url('pdf_view'); ?>">
                <div class="col-lg-8">
                	<div id="app">
				      <div role="toolbar" id="toolbar">
				        <div id="pager">
				        	<button data-pager="prev">
				          		<i class="fa fa-backward" aria-hidden="true"></i> Prev
				        	</button>
				        	<button data-pager="next">
				          		<i class="fa fa-forward" aria-hidden="true"></i> Next
				    		</button>
				        </div>
				        <div id="page-mode" style="display: none;">
				          <label>Page Mode <input type="number" value="2" min="1"/></label>
				        </div>
				      </div>


				      <div id="viewport-container">
				      	<div role="main" id="viewport"></div>
				      </div>


				    </div>
                </div>

				<script src="https://unpkg.com/pdfjs-dist@2.0.489/build/pdf.min.js"></script>
				<script src="<?php echo js_url('pdf_view'); ?>"></script>

				<script>
					window.onload = () => {
						console.log(initPDFViewer);
						initPDFViewer('<?php echo mag_url($magazine['fileName'])?>');
					};
				</script-->
            </div>
        </div>
    </section>

<?php
require 'footer.php';
?>