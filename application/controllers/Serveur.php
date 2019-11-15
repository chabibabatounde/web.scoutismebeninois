<?php
class Serveur extends CI_Controller {
	public function getVille($pays)
	{
		$this->load->model('Ville_model','Ville');
		$data=$this->Ville->getByPays($pays);
		foreach ($data as $ville) {
			echo "<option value='".$ville['idVille']."'>".$ville['nomVille']."</option>";
		}
	}
	public function getPharmacies($pays,$ville)
	{
		$this->load->model('Pharmacie_model','Pharmacie');
		$data=$this->Pharmacie->search($pays, $ville);
		$json=  "{";
			$json.=  '"pharmacies": [';
				foreach ($data as $ligne) {
				$json.=  "{";
					foreach ($ligne as $key => $value) {
						$json.= '"'.$key.'":"'.$value.'",';
					}
				$json = substr($json,0, -1);
				$json.=  "},";
				}
				$json = substr($json,0, -1);
			$json.=  "]";
		$json.=  "}";
	echo $json;
	$data = json_decode($json);
	//$version = $data->{'entete'}->{'version'};
	//$json = str_replace('"', '&', $json);
	}
}
