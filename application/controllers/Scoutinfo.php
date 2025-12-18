<?php
class Scoutinfo extends CI_Controller {

	

	public function index()
	{
		$variables = initSession("SCOUT Info, le magazine officiel du Scoutisme Béninois");
		$this->load->model('Journal_model','Journal');
		$variables['journals']=$this->Journal->gets();
		$this->load->view('magIndex',$variables);
	}
	public function buy($id)
	{
		$this->load->model('Journal_model','Journal');
		$this->load->model('AchatMagazine_model', 'AchatMagazine');
		$variables['magazine']=$this->Journal->get($id)[0];
		$data = [
			"amount" => $variables['magazine']['prix'],
			"apiKey" => 'g4huzbd95717106uhzh690z9yi3y257',
			"mode" => 'prod',
			"email" => "",
			"telephone" => "",
			"title" => "",
			"callbackurl" => lien('Scoutinfo','callback/page'),
			"img_url" => img_url('mag/Journal-'.$variables['magazine']['idJournal'].".png"),
			"image" => img_url('mag/Journal-'.$variables['magazine']['idJournal'].".png"),
			"description" => 'Achat du magazine Scout Info N°'.$variables['magazine']['numero'],
		];
		$server_output = sendHttpPost("https://stanza.babatounde.com/init",$data);
		$response = json_decode($server_output);
		$this->AchatMagazine->add($variables['magazine']['idJournal'], $variables['magazine']['prix'], $response->data->transactionId);
		header("Location:".$response->data->url);
	}

	public function callback($page)
	{	
		if (isset($_GET['transaction_id'])){
			$transactionId =  $_GET['transaction_id'];
			$server_output = sendHttpGET("https://stanza.babatounde.com/check/".$transactionId);
			$variables = initSession("SCOUT Info, le magazine officiel du Scoutisme Béninois");
			$response = json_decode($server_output);
			//http://localhost/scoutismebeninoisV3/index.php/Scoutinfo/callback/page?transaction_id=a0d60d3b746edd270fa0b7a61f3b93c9
			$jour =  366;
			if($response->status=="paid"){
				$this->load->model('AchatMagazine_model', 'AchatMagazine');
				$achat=$this->AchatMagazine->getFromTransat($transactionId);
				if(sizeof($achat)==1){
					$achat = $achat[0];
					if($achat['counter']<3){
						$userKey = uniqid().uniqid().uniqid().uniqid() ;
						$achat['userKey'] = $userKey;
						$achat['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
						$achat['counter'] = $achat['counter'] + 1;
						$this->AchatMagazine->update($achat, $achat['idAchatMagazine']);
						$variables['achat'] = $achat;
						setcookie("Scoutinfomag_".$achat['idJournal'], $userKey, time() + (86400 * 30 * $jour), "/");
						$lien = lien("Scoutinfo","v/".$achat['idJournal']."/".uniqid());
						header('Location: '.$lien);
					}else{
						header('Location:'.lien("Scoutinfo","index"));
					}
				}
				else{
					header('Location:'.lien("Scoutinfo","index"));
				}
			}
			else{
				header('Location:'.lien("Scoutinfo","index"));
			}
		}
		else{
			header('Location:'.lien("Scoutinfo","index"));
		}
	}

	public function v($id, $random)
	{
		$variables = initSession("SCOUT Info, le magazine officiel du Scoutisme Béninois");
		$this->load->model('Journal_model','Journal');
		$variables['magazine']=$this->Journal->get($id);
		if(sizeof($variables['magazine'])==1){
			$variables['magazine'] = $variables['magazine'][0];
			$variables['titrePage'] = "SCOUT Info N° ".$variables['magazine']['numero']." du ".$variables['magazine']['datePublication']." | le magazine officiel du Scoutisme Béninois";
			$this->Journal->lecture($id);
			$this->load->view('viewer_new',$variables);

			/*$cookie_name = "Scoutinfomag_".$variables['magazine']['idJournal'];			
			if(isset($_COOKIE[$cookie_name])) {
				$userKey = $_COOKIE[$cookie_name];
				$this->load->model('AchatMagazine_model', 'AchatMagazine');
				$document=$this->AchatMagazine->getDataString($userKey);
				if(sizeof($document)==1){
					$document = $document[0];
					if($document['userAgent'] == $_SERVER['HTTP_USER_AGENT']){
						//$b64Doc = base64_encode(file_get_contents(mag_url($document['fileName'])));
						$this->Journal->lecture($id);
						$variables['magazine'] = $document;
						$this->load->view('viewer_new',$variables);
					} 
				}
			}

			else{
				header('Location:'.lien("Scoutinfo","index"));
			}*/
		}
	}


	public function filerender($id)
	{
		$variables = [];
		$this->load->model('Journal_model','Journal');
		$variables['magazine']=$this->Journal->get($id)[0];
		$file_url = mag_url($variables['magazine']['fileName']);
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
		readfile($file_url);


		/*if(sizeof($variables['magazine'])==1){
			$variables['magazine'] = $variables['magazine'][0];
			$cookie_name = "Scoutinfomag_".$variables['magazine']['idJournal'];
			if(isset($_COOKIE[$cookie_name])) {
				$userKey = $_COOKIE[$cookie_name];
				$this->load->model('AchatMagazine_model', 'AchatMagazine');
				$document=$this->AchatMagazine->getDataString($userKey);
				if(sizeof($document)==1){
					$document = $document[0];
					if($document['userAgent'] == $_SERVER['HTTP_USER_AGENT']){
						$file_url = mag_url($document['fileName']);
						header('Content-Type: application/octet-stream');
						header("Content-Transfer-Encoding: Binary"); 
						header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
						readfile($file_url); 
					} 
				}
			}
		}*/
	}

	public function don()
	{
		$this->load->model('Cotisation_model', 'Cotisation');
		$data = [
			"amount" => $_POST['montant'],
			"apiKey" => 'g4huzbd95717106uhzh690z9yi3y257',
			"mode" => 'prod',
			"email" => "",
			"telephone" => "",
			"title" => "",
			"callbackurl" => lien('Scoutinfo','thanksucces'),
			"img_url" => img_url('transact.jpg'),
			"description" => 'Soutien Commission Communication et Marketing',
		];
		$server_output = sendHttpPost("https://stanza.babatounde.com/init",$data);
		$response = json_decode($server_output);
		header("Location:".$response->data->url);
	}



	public function thanksucces()
	{
		$variables = initSession("Merci pour votre don ! - Soutien à la Commission Nationale à la Communication et au Marketing");

		$this->load->view('merci',$variables);
	}
}
