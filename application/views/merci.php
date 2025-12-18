<?php
	require 'header.php';
?>

	<!-- Start top-section Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Merci !</h1>
					<p></p>
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
							<h2> Nous vous remercions pour votre geste de soutien.</h2>
							<ul class="blog-info-link mt-3 mb-4">
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
			            <div class="blog_details">
							<p class="excert" style="text-align: justify;">
								Au nom de la Commission National chargé de la Communication et du Marketing nous vous remercions.
								<br>
								Bonne lecture!
								<br>
								<br>

								<strong>Jean-Roland LOHENTO</strong>
								<br>
								Commissaire National chargé de la Communication et du Marketing
							</p>
			            </div>
			        </div>
			    </div>
			    
			</div>
	    </div>
	    
        <div class="container">
            <div class="row">
            	<div class="col-lg-12 pdfviewer">
					<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.min.js"></script>

					<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
					<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

					<script src="<?php echo js_url('pdfjs-viewer'); ?>"></script>
					<link rel="stylesheet" href="<?php echo css_url('pdfjs-viewer'); ?>">
					<link rel="stylesheet" href="<?php echo css_url('pdftoolbar'); ?>">

					<script type="text/javascript">
						var pdfjsLib = window['pdfjs-dist/build/pdf'];
						pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.worker.min.js';
					</script>

					<div class="pdftoolbar">
					  <!--button class="btn-first" onclick="pdfViewer.first()"><i class="material-icons-outlined">skip_previous</i></button-->
					  <button class="btn-prev" onclick="pdfViewer.prev(); return false;">
					  	<i class="material-icons-outlined">navigate_before</i>
					  </button>

					  <span class="pageno"></span>

					  <button class="btn-next" onclick="pdfViewer.next(); return false;">
					  	<i class="material-icons-outlined">navigate_next</i>
					  </button>

					  <!--button class="btn-last" onclick="pdfViewer.last()"><i class="material-icons-outlined">skip_next</i></button-->

					  <button onclick="pdfViewer.setZoom('out')"><i class="material-icons-outlined">zoom_out</i></button>
					  <span class="zoomval">100%</span>
					  <button onclick="pdfViewer.setZoom('in')"><i class="material-icons-outlined">zoom_in</i></button>

					  <!--button class="ms-3" onclick="pdfViewer.setZoom('width')"><i class="material-icons-outlined">swap_horiz</i></button>
					  <button onclick="pdfViewer.setZoom('height')"><i class="material-icons-outlined">swap_vert</i></button>
					  <button onclick="pdfViewer.setZoom('fit')"><i class="material-icons-outlined">fit_screen</i></button-->
					</div>

					<div class="pdfpages">
					  <div class="pdfpage placeholder">
					    <p>No file loaded</p>
					  </div>
					</div>

					<script type="text/javascript">
						// override the PDF path
						let PDFFILE="<?php echo mag_url('5309f253e4c4b5bb52c555fca368db781994.pdf')?>";

						let pdfViewer = new PDFjsViewer($('.pdfpages'), {
					        onZoomChange: function(zoom) {
					            zoom = parseInt(zoom * 10000) / 100;
					            $('.zoomval').text(zoom + '%');
					        },
					        onActivePageChanged: function(page, pageno) {
					            $('.pageno').text(pageno + '/' + this.getPageCount());
					        },
					    });
					    pdfViewer.loadDocument(PDFFILE).then(function() {
					        pdfViewer.setZoom('fit');
					    });



						// load a PDF file and returns a promise
						// the document can be either an url or a bin array.
						pdfViewer.loadDocument(document);

						// force re-init
						pdfViewer.forceViewerInitialization();

						// refresh all pages
						pdfViewer.refreshAll();

						// get the active page
						pdfViewer.getActivePage();

						// go to the first page
						pdfViewer.first();

						// go to the last page
						pdfViewer.last();

						// go to the next page
						pdfViewer.next();

						// back to the previous page
						pdfViewer.prev();

						// get the number of pages
						pdfViewer.getPageCount();

						// retrieve all the pages of the document
						pdfViewer.getPages();

						// go to a specific page
						pdfViewer.scrollToPage(i);

						// check if the page is visible
						isPageVisible(i);

						// set zoom level
						// it is possible to use a float value which represents a fraction or a keyword 'in', 'out', 'width', 'height' or 'fit'
						pdfViewer.setZoom(zoom);

						// get the current zoom level
						pdfViewer.getZoom();

						// rotate the pages
						pdfViewer.rotate(deg, accumulate = false);
					</script>



                </div>

                <style type="text/css">
                	.pdfpages{
						overflow: auto;
						border: 1px solid #aaa;
						background: #ccc;
						width: 100%;
                	}

                	
				.pdfjs-viewer {
				    overflow: auto;
				    border: 1px solid #aaa;
				    background: #ccc;
				    /* width: 100%; */
				}
				.pdfjs-viewer.horizontal-scroll {
				    display: flex;
				}
				.pdfjs-viewer.horizontal-scroll .pdfpage {
				    margin-left: 1em;
				    margin-top: 0.25em !important;
				    margin-bottom: 0.25em !important;
				    display: block;
				}
				.pdfpage {
				    position: relative;
				    margin-bottom: 1em;
				    margin-top: 1em;
				    margin-left: auto;
				    margin-right: auto;
				    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1), 0 6px 20px 0 rgba(0, 0, 0, 0.09);
				    display: flex;
				}
				.pdfpage canvas {
				    position: absolute;
				    left: 0;
				    top: 0;
				    height: 100%;
				    width: 100%;
				}
				.pdfpage.placeholder {
				    display: flex;
				    margin-bottom: 0em !important;
				    margin-top: 0em !important;
				    height: 100%;
				    width: 100%;
				}
				.pdfpage .content-wrapper {
				    margin: 0 !important;
				    padding: 0 !important;
				    display: flex !important;
				}
				.pdfpage .content-wrapper .loader {
				    border: 2px solid #f3f3f3;
				    border-top: 3px solid #3498db;
				    border-radius: 50%;
				    width: 24px;
				    height: 24px;
				    animation: spin 1s linear infinite;
				    margin: auto;
				}
				@keyframes spin {
				    0% { transform: rotate(0deg); }
				    100% { transform: rotate(360deg); }
				}

                </style>
            </div>
        </div>
    </section>




	<style type="text/css">

		.iframe-container{
			border:none;
			align:center;
			height: 1000px;
		}
		 
	</style>
		}


<?php
require 'footer.php';
?>