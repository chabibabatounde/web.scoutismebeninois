<?php
class Portofolio extends CI_Controller {


	public function inscription()
	{
		$variables = initSession("Bienvenu sur notre site web officiel ");


		$this->load->model('Article_model','Article');
		$variables['nouvelles']=$this->Article->last();
		$this->load->model('Evenement_model','Evenement');
		$variables['evenements']=$this->Evenement->last();


		$this->load->view('accueil',$variables);
	}
	public function consulter()
	{
		$variables = initSession("Bienvenu sur notre site web officiel ");


		$this->load->model('Article_model','Article');
		$variables['nouvelles']=$this->Article->last();
		$this->load->model('Evenement_model','Evenement');
		$variables['evenements']=$this->Evenement->last();


		$this->load->view('accueil',$variables);
	}

	
}
