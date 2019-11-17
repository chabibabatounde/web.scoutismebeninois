

	<!--================ Start CTA Area =================-->
	<div class="cta-area" id="newslettersection">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-7">
					<h1>Abonnez-vous dès maintenant et recevez nos nouvelles assez souvent</h1>
					<div id="mc_embed_signup">
						<div class="row align-items-center">
							<div class="col-lg-5 mb-lg-0 mb-3">
								<input class="form-control" id='newsNom' placeholder="Votre nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre nom'"
								 required="" type="email" />
							</div>
							<div class="col-lg-5 mb-lg-0 mb-3">
								<input class="form-control" id="newsMailtxt" placeholder="Votre adresse email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Votre adresse email'"
								 required="" type="email" />
							</div>
							<div class="col-lg-2">
								<button class="primary-btn" onclick="getmail()" type="submit">Valider</button>
								<div style="position: absolute; left: -5000px;">
									<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text" />
								</div>

								<div class="info"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================ End CTA Area =================-->

	<script type="text/javascript">
		
	function validateEmail(email) {
    var chrbeforAt = email.substr(0, email.indexOf('@'));
    if (!($.trim(email).length > 127)) {
        if (chrbeforAt.length >= 2) {
            var re = /^(([^<>()[\]{}'^?\\.,!|//#%*-+=&;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
            return re.test(email);
        } else {
            return false;
        }
    } else {
        return false;
    }
}

    function getmail() {
    	let email = $('#newsMailtxt').val();
    	let nom = $('#newsNom').val();
		if(validateEmail(email)){
			$.post("<?php echo lien('Newsletter','add')?>",{
				email:email,
				nom:nom
			},function(data, statut) {
				swal("Newsletter","votre adresse mail a été enregisté!","success");
				$('#newsNom').val('');
				$('#newsMailtxt').val('');
			});
		}else{
          swal("Newsletter","votre adresse mail est invalide","error");
        }
    }

	</script>