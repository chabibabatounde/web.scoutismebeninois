	<?php
	require 'header.php';
	?>
	<section class="banner-area relative" id="bbanner">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Cotisation payée</h1>
					<p>
						Paiement enregistré
           			</p>
				</div>
			</div>
		</div>
	</section>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>

	<section class="section-gap">
    	<div class="container">
	      <div class="row">
	        <div class="col-12" style="margin-bottom:20px;">
  				<div class="logo-print2"></div>

	          <center>
	          <h2 class="contact-title" style="text-decoration : underline">Reçu de paiement de cotisation</h2><br><br>
	          </center>

			


	          <h4 style="display: inline;">Reçu N°: </h4> 00<?php echo $cotisation['idCotisation']; ?><br>
		  <?php
		  $date_paiement = explode("-",$cotisation['datePaiement']);
		  ?>
	          <h4 style="display: inline;">Date de Paiement : </h4> <?php echo $date_paiement[2]."-".$date_paiement[1]."-".$date_paiement[0]; ?><br><br>


	          <h4 style="display: inline;">Nom : </h4> 	<?php echo $cotisation['nom']; ?><br>
	          <h4 style="display: inline;">Prenom : </h4> <?php echo $cotisation['prenom']; ?><br>
	          <h4 style="display: inline;">Téléphone : </h4> <?php echo $cotisation['telephone']; ?><br>
	          <h4 style="display: inline;">Email : </h4> <?php echo $cotisation['email']; ?><br><br>

	          <h4 style="display: inline;">Année de cotisation : </h4> <?php echo $cotisation['annee']; ?><br>
	          <h4 style="display: inline;">Région : </h4> <?php echo $cotisation['nomRegion']; ?><br>
	          <h4 style="display: inline;">District : </h4> <?php echo $cotisation['nomDistrict']; ?><br>
	          <h4 style="display: inline;">Categorie : </h4><?php echo $cotisation['categorie']; ?><br><br>

	          <h4 style="display: inline;">Montant de la cotisation : </h4><?php echo $cotisation['montantNet']; ?> F CFA<br>
	          <h4 style="display: inline;">Frais de transaction : </h4><?php echo ($cotisation['montantPaye'] - $cotisation['montantNet']); ?> F CFA<br>
	          <h4 style="display: inline;">Montant Net payé : </h4><?php echo $cotisation['montantPaye']; ?> F CFA<br><br>
	          <h4 style="display: inline;">Code d'authentification : </h4> <?php echo $cotisation['transactionId']; ?><br>

	        <span id='signaturetitre'><br>Le Commissaire National chargé <br>des Finances et du Patrimoine</span>
	        <span id='signaturetitre-2'><br><br><strong>Romaric AZANCHEME</strong></span>

			<div id="qr_code_img"> </div>


	        </div>
	        <div class="col-lg-12" id="btn-print">
				<div class="form-group col-md-12">
	                <center>
	                  <br>
	                  <a href="<?php echo lien('Collecte','recu/'.$cotisation['transactionId'])?>" target="_blank">
	                  </a>
	                  	<button onclick="telechergerPdf()" type="submit" class="button button-contactForm primary-btn">Télécharger le justificatif de paiement</button>
	                </center>
	            </div>
	        </div>
	    </div>
  	</section>




	<?php
	require 'footer.php';
	?>
	
	<script type="text/javascript">
	<?php 
		$data_dict = str_replace("'", "`", json_encode($cotisation));

	?>
	var ticket_data = JSON.parse('<?php print_r($data_dict) ?>');

	var qrcode = new QRCode("qr_code_img", {
		text: ticket_data.transactionId+"@"+ticket_data.idCotisation,
		width: 128,
		height: 128,
		colorDark : "#000000",
		colorLight : "#ffffff",
		correctLevel : QRCode.CorrectLevel.H
	});



	function telechergerPdf() {
		window.open("<?php echo lien('Collecte','download?transaction_id='.$cotisation['transactionId']); ?>", '_blank').focus();
		alert("Téléchargement terminé! Pour retrouver le reçu, veuillez consulter le dossier des fichiers téléchargés")
	    /*
	    var doc = new jsPDF();
		var logo="data:image/jpeg;base64,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"
		var signature="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIcAAACHCAMAAAALObo4AAAAAXNSR0IB2cksfwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAmdQTFRFAAAA+jVG+Sg27i89+DA//Cw980NU6kVS61Bf/u7v+Zuj9Upj9omS4UNS9XOC+0FU9Vlr6HR/6GNw7n+H9mp5+6Ss/+rq+pKc4k5c/9ze8SQz+X+L8zpE8pKZ9WNx/La77jRI+73B/MfL9kBM6jxM4jhI7iAq9yMt+FRh/+fo6Wx2/DlN+K649VBb/tPV+/z73y4+/+rp6ic2/bCy6lpq3iYx/eLk/+Pk7IaX5R0p/cnO8Jyj6S05/r7E/tzd8rK0/t7f/MbI/9zg/LvC6Wh94Fpo7vn6/tHT/tLU/crN/cjN/+PlZmW15IiPmZ3T8qms/tXX/97g5ZWe/dvc/c3QVE65+8fKe3q8+87Q75+w/dja6vL7qKrZ/tTW0io40kJSKgQS+b7ALCmR8Or0/9bb88bN+NjbvrzhYFuqcXOvUgYZGxqAt7bb/tXTQ0ScBAMK0l90gH3R+b3Ci4rF19n3/+zxx8L3zc73TlGVzEVa5tzq+8DG09TrOTeP/uTj3+Hq+9bXw1FoCwxm6MbITleh4+b4pxozMzR/lJbp3N726ub6/87mBgVDz4aatbbscWrNFgEEub3UGxZQ/dTV2tjgjofYycjvkZS609Hrx8jnZVyCzbrR/eXrUhgwJwQy+KjEQDes+ru9rylFf3OixXyNZS5SZVzKpqnvmjdZ1Nn5gRUz/OfvclVijg4cUTB9BwQrs7DAFgslPA4z4+n81sXQxcXg4eP6wsHFr6a72dPiOzJMQBFZPTts4LG9r7Hix5KwsLLUzKGvv6q4nExwz6Ci2Ob+k2uR47e/hHyWoqDdmpnjoJ+77KKmMh4v+AAAAM10Uk5TAP//////////CP///////////////xP//4H///////7//v7///////8s/////4D//yH/////aDf//4H//9Jd/nXvQIL//wjBmKbBTP////9FVP+SjP/j/9j/rhf/zf///+X/IHK0vYL/////////////lv98//+B//9+v4b/+mPq///7/zX///9Lav///////7b/YkX/vf+Z3P/JTf////+u/////////67/M/////////9OkP//9//5/////+r/mIC////H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"
		let qrcode = $('#qr_code_img img').attr('src');


		doc.addImage(logo, 10, 10, 40, 40);
		doc.setFontType("bold");
		doc.text("REÇU DE PAIEMENT DE COTISATION ANNUELLE", 63, 16);
		doc.line(63,19,196,19);
		doc.setFontSize(12);

		doc.text("Reçu N°: ", 63, 30);
		doc.setFontType("normal");
		doc.text("0"+ticket_data.idCotisation, 115, 30);


		doc.setFontType("bold");
		doc.text("Code d'authentification : ", 63, 48);
		doc.setFontType("normal");
		doc.text(ticket_data.transactionId, 115, 48);

		doc.setFontType("bold");
		doc.text("Date de paiement : ", 63, 39);
		doc.setFontType("normal");
		doc.text(ticket_data.datePaiement, 115, 39);


		doc.setFontType("bold");
		doc.text("Nom et prénoms : ", 10, 65);
		doc.rect(9, 59, 189, 9);
		doc.setFontType("normal");
		doc.text(ticket_data.nom.trim() + " " + ticket_data.prenom.trim(), 50, 65);


		doc.setFontType("bold");
		doc.text("Région : ", 10, 75);
		doc.rect(9, 69, 88, 9);

		doc.setFontType("normal");
		doc.text(ticket_data.nomRegion, 35, 75);
		doc.rect(98, 69, 100, 9);


		doc.setFontType("bold");
		doc.text("District : ", 100, 75);
		doc.setFontType("normal");
		doc.text(ticket_data.nomDistrict.trim(), 128, 75);


		doc.setFontType("bold");
		doc.text("Téléphone : ", 10, 85);
		doc.rect(9, 79, 88, 9);
		doc.setFontType("normal");
		doc.text(ticket_data.telephone.trim(), 35, 85);

		doc.setFontType("bold");
		doc.text("Email : ", 100, 85);
		doc.rect(98, 79, 100, 9);
		doc.setFontType("normal");
		doc.text(ticket_data.email.trim(), 128, 85);


		doc.setFontType("bold");
		doc.text("Année de cotisation : ", 10, 100);
		doc.rect(9, 94, 88, 9);
		doc.setFontType("normal");
		doc.text(ticket_data.annee, 55, 100);

		doc.setFontType("bold");
		doc.text("Catégorie : ", 100, 100);
		doc.rect(98, 94, 100, 9);
		doc.setFontType("normal");
		doc.text(ticket_data.categorie, 128, 100);

		doc.setFontType("bold");
		doc.text("Cotisation : ", 10, 110);
		doc.rect(9, 104, 88, 9);
		doc.setFontType("normal");
		doc.text(ticket_data.montantNet +" F CFA", 55, 110);

		doc.setFontType("bold");
		doc.text("Frais : ", 100, 110);
		doc.rect(98, 104, 100, 9);
		doc.setFontType("normal");
		doc.text((ticket_data.montantPaye - ticket_data.montantNet).toString()+" F CFA", 128, 110);

		doc.setFontType("bold");
		doc.text("Montant net payé : ", 10, 120);
		doc.setFontType("normal");
		doc.text(ticket_data.montantPaye +" F CFA", 55, 120);
		doc.rect(9, 114, 189, 9);

		doc.addImage(qrcode, 10, 130, 30, 30);

		doc.text("Le Commissaire National chargé des", 105, 130);
		doc.text("Finances et du Patrimoine (CNFP)", 108, 137);

		doc.addImage(signature, 123, 130, 35, 35);

		doc.rect(9, 125, 189, 39);
		doc.rect(7, 7, 194, 160);


		doc.text("Romaric AZANCHEME", 113, 163);

		setTimeout(function() {
	    	doc.save(ticket_data.nom.trim()+"_"+ticket_data.prenom.trim()+"_"+ticket_data.annee.trim()+".pdf");
	    }, 2000);

	    doc.save(ticket_data.nom.trim()+"_"+ticket_data.prenom.trim()+"_"+ticket_data.annee.trim()+".pdf");

		var myBlob =  doc.output();

		console.log(myBlob);

		var binaryData = [myBlob];
		let url = new Blob(binaryData, {type: "application/pdf"});
		url = window.URL.createObjectURL(url);
		window.open(url);


		window.open( '/regen-ticket?data='+data,'_blank');


	    doc.save(ticket_data.nom.trim()+"_"+ticket_data.prenom.trim()+"_"+ticket_data.annee.trim()+".pdf");
	    */



	}
	</script>
    