<?php
class Apropos extends CI_Controller {


	public function historique()
	{
		$variables = initSession("Historique du Scoutisme");

		$variables['sessionImage'] =  img_url("common-banner (4).jpg");
		
		$this->load->view('historique',$variables);
	}
	public function produitsEtServices()
	{
		$variables = initSession("Produits et servis du Scoutisme Béninois");
		$this->load->view('produits',$variables);
	}
	public function realisations()
	{
		$variables = initSession("Réalisations et projets concretisés par le Scoutisme Béninois");
		$this->load->view('realisations',$variables);
	}
}
