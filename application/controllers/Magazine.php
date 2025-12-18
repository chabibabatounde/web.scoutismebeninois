<?php
class Magazine extends CI_Controller {

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
			"callbackurl" => lien('Magazine','thanksucces'),
			"img_url" => img_url('transact.jpg'),
			"description" => 'Soutien Commission Communication et Marketing',
		];
		$server_output = sendHttpPost("https://stanza.rodolpho-babatounde.net/init",$data);
		$response = json_decode($server_output);
		header("Location:".$response->data->url);
	}

	public function viewer($token)
	{
		$variables = initSession("SCOUT Info, le magazine officiel du Scoutisme Béninois");
		$this->load->model('Journal_model','Journal');
		$id = base_convert($token, 16, 10) / 22051994;
		$variables['magazine']=$this->Journal->get($id)[0];
		$this->Journal->lecture($id);
		$this->load->view('viewer',$variables);
	}

	public function thanksucces()
	{
		
		
		$variables = initSession("Merci pour votre don ! - Soutien à la Commission Nationale à la Communication et au Marketing");

		$this->load->view('merci',$variables);
	}
}
