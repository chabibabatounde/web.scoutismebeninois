	<?php
	require 'header.php';
	?>
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row justify-content-lg-end align-items-center banner-content">
				<div class="col-lg-5">
					<h1 class="text-white">Cotisation annuelle</h1>
					<p>

          </p>
				</div>
			</div>
		</div>
	</section>

	<section class="section-gap">
    	<div class="container">
	      <div class="row">
        <div class="col-12" style="margin-bottom:20px;">
          <h2 class="contact-title">Veuillez remplir le formulaire puis procédez au paiement</h2>
          <img src="https://qinowaticket.com/images/site/cards.png">
          <br>
          <span>
            Selon les informations saisies, nous calculons votre cotisation annuelle.
            <br>
            Un taux supplémenataire de 4% de votre montant final, sera appliqué pour les frais de transation.
            <br>
            Besoin d'aide? <a target="_blank" href="https://wa.me/22940168496?text=Bonjour, j'ai besoin d'aide pour payer ma cotisation annuelle sur le site web du Scoutisme Béninois.">Cliquez ici pour</a> envoyez un message whatsapp à l'administrateur du site. 
          </span>
        </div>
        <div class="col-lg-12">
          <div class="form-contact contact_form" id="contactForm" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="nom" type="text" placeholder="Votre nom">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="prenom" type="text" placeholder="Votre prénom">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="telephone" type="text" placeholder="Numero de téléphone (où vous êtes joignable)">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="email" type="email" placeholder="Votre adresse mail">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <select style="width:100%" class="form-control" name="name" id="annee" type="text" placeholder="Votre prénom">
                    <option value=""> -- Année de cotisation -- </option>
                    <?php
                      for ($i=date('Y')+3; $i > date('Y')-2; $i--) {
                    ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <select onchange="loadDistrict(this)" style="width:100%" class="form-control" name="name" id="region" type="text" placeholder="Votre prénom">
                    <option value=""> -- Région scoute -- </option>
                    <?php
                    foreach ($regions as $region) {
                    ?>
                    <option value="<?php echo $region['idRegion'] ?>"><?php echo $region['nomRegion'] ?></option>
                    <?php
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group" id='listeDistrict'>
                  <input class="form-control" name="name" id="prenom" type="text" disabled="" placeholder=" -- District scout -- ">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <select  onchange="calculeMontant()"   class="form-control" name="name" id="categorie">
                    <option value=""> -- Catégorie -- </option>
                    <option value="6#Louvette/Louveteau"> Louvette / Louveteau </option>
                    <option value="5#Eclaireuse/Eclaireur"> Eclaireuse / Eclaireur </option>
                    <option value="4#Leader"> Leader </option>
                    <option value="3#Guide/Routier"> Guide / Routier </option>
                    <option value="2#Responsable/Cadre"> Responsable / Cadre </option>
                    <option value="1#Soutien"> Cotisation de Soutien </option>
                  </select>
                </div>
              </div>

              

              <div class="col-md-12" id='soutientsec' style='display: none;'>
                  <span> Vous avez choisi la cotisation de soutien. Veuillez saisir le montant que vous souhaitez payer (5 000 Fcfa au moins) </span> <br><br>
                  <input class="form-control" min="0" step="500" onchange="calculeMontant()" onkeyup="calculeMontant()" name="name" id="montant" type="number" placeholder="Montant à payer">
              </div>

              <div class="col-md-12">
                  <h6> Selon les informations saisies, le montant calculé pour votre cotisation annuelle est de <span id="vvaleur"> 0 </span> F CFA <br><br><br> </h6>
              </div>

              <div class="form-group col-md-12">
                <center>
                  <div id="resume"></div>
                  <br>
                  <button onclick="payerCotisation()" type="submit" class="button button-contactForm primary-btn">Payer <span id='montantBtn'> ma cotisation</span> </button>
                </center>
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>

	<?php
	require 'footer.php';
	?>
  <script type="text/javascript">
    var donnees = {};
    var montant = 0;
    var taux = 0.04;
    var tableDesPrix = [0,5000,4000,3000,2500,2000,1000];
    var time = 1;
    var intervalID =  0;

    function calculeMontant(){
      getData();

      if(donnees.categorie[0]==1){
        $("#soutientsec").show();
        $("#montant").attr("min","5000");
        montant = parseFloat($("#montant").val());
      }
      else{
        $("#soutientsec").hide();
        $("#montant").val(tableDesPrix[donnees.categorie[0]]);
        $("#montant").attr("min", tableDesPrix[donnees.categorie[0]]);
        montant = tableDesPrix[donnees.categorie[0]];
      }
      

      if (isNaN(montant)){
        donnees.montant = $("#montant").val();
        let resume = "<strong>Montat de la cotisation : </strong>0 F CFA <br>";
        resume += "<strong>Frais de transation ("+taux*100+"%) : </strong>0 F CFA <br>";
        resume += "<strong>Net à payer : 0 F CFA </strong>";
        $("#resume").html(resume);
        $("#vvaleur").html("0");
        $("#montantBtn").html("0 F Cfa");
      }else{
        donnees.montant = $("#montant").val();
        let resume = "<strong>Montat de la cotisation : </strong>"+montant+" F CFA <br>";
        resume += "<strong>Frais de transation ("+taux*100+"%) : </strong>"+(montant * taux)+" F CFA <br>";
        resume += "<strong>Net à payer : "+((montant * taux)+montant)+" F CFA </strong>";
        $("#resume").html(resume);
        $("#vvaleur").html(montant);
        $("#montantBtn").html(((montant * taux) +montant) +" F Cfa");
      }
    }

    function payerCotisation(){
      calculeMontant();
      if (donnees.nom == "") {
        swal("Veuillez saisir votre nom","","error")
      }
      else{
        if (donnees.prenom == "") {
          swal("Veuillez saisir votre prenom","","error")
        }
        else{
          if (donnees.region == "") {
            swal("Veuillez choisir votre region scoute","","error")
          }
          else{
            if (donnees.district == "") {
              swal("Veuillez choisir votre district","","error")
            }
            else{
              if (donnees.annee == "") {
                swal("Veuillez sélectionner l'année de cotisation","","error")
              }
              else{
                if (montant == 0 || isNaN(montant)) {
                  swal("Veuillez sélectionner votre categorie (ou le montant à payer)","","error")
                }
                else{
                  let montantcontrole = false;
                  if(donnees.categorie=="1#Soutien"){
                    if(donnees.montant >= 5000){
                      montantcontrole = true;
                    }
                  }else{
                    montantcontrole=true;
                  }
                  if(!montantcontrole){
                    swal("Cotisation de soutien","Vous devez payer un montant d'au moins 5 000 Fcfa","error")
                  }else{
                      calculeMontant();
                      swal("Traitement en cours... Veuillez patientez...");
                      $.post("<?php lien('Collecte','cotisation')?>", donnees, function(data, status){
                          document.location.href=data;
                      })
                      intervalID = setInterval(function(){
                        time += 1;
                        if(time >= 6){
                          clearInterval(intervalID);
                          alert("Votre transaction n'a pas aboutie. Merci de réessayer dans au moins 5 minutes");
                          location.reload();
                        }
                        $.post("<?php lien('Collecte','cotisation')?>", donnees, function(data, status){
                          console.log(data);
                          document.location.href=data;
                        })
                      },25000);
                  }
                }
              }
            }
          }
        }
      }
      return false;
    }

    function getData(){
      donnees.nom = $("#nom").val();
      donnees.telephone = $("#telephone").val();
      donnees.prenom = $("#prenom").val();
      donnees.montant = $("#montant").val();
      donnees.email = $("#email").val();
      donnees.annee = $("#annee").val();
      donnees.region = $("#region").val();
      donnees.categorie = $("#categorie").val();
      donnees.district = $("#district").val();
    }

    function loadDistrict(element){
      idRegion = element.value;
      $.ajax({
        url: '<?php echo lien('Collecte','getDistrict/'); ?>'+idRegion,
      }).done(function(data) {
        let content = "<select class='form-control' name='name' id='district' type='text'> <option value=''> -- District scout -- </option>";
        let contents = JSON.parse(data);
        for (let i = contents.length - 1; i >= 0; i--) {
          content += "<option value='"+contents[i].idDistrict+"'>"+contents[i].nomDistrict+"</option>"
        }
        content += '</select>'
        $('#listeDistrict').html(content);
        $('#district').niceSelect();
      });
    }
  </script>