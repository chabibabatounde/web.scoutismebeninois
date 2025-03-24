<?php

class Collecte extends CI_Controller {

	public function cotisation()
	{
		if (isset($_POST['montant'])) {
			$this->load->model('Cotisation_model', 'Cotisation');
			$data = [
				"amount" => $_POST['montant']+($_POST['montant'] * 0.04),
				"apiKey" => '530ca9f72e3383c356808973cba8cfc1',
				"mode" => 'prod',
				"email" => $_POST['email'],
				"telephone" => $_POST['telephone'],
				"title" => $_POST['prenom']." ".$_POST['nom'],
				"callbackurl" => lien('Collecte','callback/cotisation'),
				"img_url" => img_url('transact.jpg'),
				"image" => img_url('transact.jpg'),
				"description" => 'Paiement de cotisation - Scoutisme Béninois',
			];
			$server_output = sendHttpPost("https://stanza.rodolpho-babatounde.net/init",$data);
			$response = json_decode($server_output);
			echo($response->data->url);
			$this->Cotisation->add($_POST,$response->data->transactionId);
		}else{
			$variables = initSession("Payer sa cotisation annuelle");
			$this->load->model('DistrictRegion_model', 'DistrictRegion');
			$variables['regions']=$this->DistrictRegion->regions();
			$this->load->view('cotisation',$variables);
		}
	}
	public function callback($page){
		if($page == "cotisation"){
			if ( isset($_GET['transaction_id']) ){
				$transactionId =  $_GET['transaction_id'];
				$variables = initSession("Payer sa cotisation annuelle");
				$this->load->model('Cotisation_model', 'Cotisation');
				$server_output = sendHttpGET("https://stanza.rodolpho-babatounde.net/check/".$transactionId);
				$response = json_decode($server_output);
				if($response->status=="paid"){
					$variables['cotisation']=$this->Cotisation->getFromTransat($transactionId);
					if(sizeof($variables['cotisation'])==1){
						$variables['cotisation'] =  $variables['cotisation'][0];
						$this->Cotisation->payer($variables['cotisation']['idCotisation']);
						$this->load->view('cotisation_success',$variables);
					}else{
						header('Location:'.lien("Collecte","cotisation"));
					}
				}
				else{
					header('Location:'.lien("Collecte","cotisation"));
				}
			}
		}
	}

	public function verification(){
		$variables = initSession("Vérifier l'authenticité d'un reçu de paiement");
		$this->load->model('Cotisation_model', 'Cotisation');
		if ( isset($_GET['find']) ){
			$variables['cotisation']=$this->Cotisation->getFromTransat($_GET['find']);
		}
		else{

		}
		$this->load->view('verification',$variables);
	}


	public function regen_card(){
		if (isset($_GET['transaction_id']) ){
			$transactionId =  $_GET['transaction_id'];
			$variables = initSession("Payer sa cotisation annuelle");
			$this->load->model('Cotisation_model', 'Cotisation');
			$variables['cotisation']=$this->Cotisation->getFromTransat($transactionId);
			$cotisation = $variables['cotisation'][0];
			if(sizeof($variables['cotisation'])==1){
				$variables['cotisation'] = $variables['cotisation'][0];
				$this->load->view('cotisation_success',$variables);
			}else{
				header('Location:'.lien("Collecte","cotisation"));
			}
		}
		else{
			header('Location:'.lien("Collecte","cotisation"));
		}
	}

	public function download(){
		if (isset($_GET['transaction_id']) ){
			$transactionId =  $_GET['transaction_id'];
			$variables = initSession("Payer sa cotisation annuelle");
			$this->load->model('Cotisation_model', 'Cotisation');
			$variables['cotisation']=$this->Cotisation->getFromTransat($transactionId);
			$cotisation = $variables['cotisation'][0];
			if(sizeof($variables['cotisation'])==1){
				$variables['cotisation'] = $variables['cotisation'][0];
				$server_output = sendHttpGET("https://stanza.rodolpho-babatounde.net/qrcode/getcode/".$variables['cotisation']['transactionId']."@".$variables['cotisation']['idCotisation']);
				$response = json_decode($server_output);
				$variables['cotisation']['qrcode'] = $response->qrcode;
				//$this->load->view('cotisation_success',$variables);
				$this->load->view('pdf_page',$variables);
			}else{
				header('Location:'.lien("Collecte","cotisation"));
			}
		}
		else{
			header('Location:'.lien("Collecte","cotisation"));
		}
	}


	public function allRegion(){
		$this->allow_origin();
		$this->load->model('DistrictRegion_model', 'DistrictRegion');
		$regions=$this->DistrictRegion->regions();
		print_r(json_encode($regions));
	}

	public function getDistrict($id){
		$this->allow_origin();
		$this->load->model('DistrictRegion_model', 'DistrictRegion');
		$district=$this->DistrictRegion->district($id);
		print_r(json_encode($district));
	}

	public function getGroupe($id){
		$this->allow_origin();
		$this->load->model('DistrictRegion_model', 'DistrictRegion');
		$groupe=$this->DistrictRegion->groupe($id);
		print_r(json_encode($groupe));
	}

	public function getCommunes($region){
		$this->allow_origin();
		$this->load->model('DistrictRegion_model', 'DistrictRegion');
		$communes=$this->DistrictRegion->communes($region);
		print_r(json_encode($communes));
	}

	public function getArrondissement($arrondissement){
		$this->allow_origin();
		$this->load->model('DistrictRegion_model', 'DistrictRegion');
		$arrondissement=$this->DistrictRegion->arrondissement($arrondissement);
		print_r(json_encode($arrondissement));
	}


	public function allow_origin(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: GET, POST');
		header("Access-Control-Allow-Headers: X-Requested-With");
	}


	public function recu($id){
		// Instanciation de la classe dérivée
	}
}
