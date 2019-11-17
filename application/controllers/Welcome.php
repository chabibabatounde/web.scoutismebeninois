<?php
class Welcome extends CI_Controller {


	public function index()
	{
		$variables = initSession("Bienvenu sur notre site web officiel ");


		$this->load->model('Article_model','Article');
		$variables['nouvelles']=$this->Article->last();
		$this->load->model('Evenement_model','Evenement');
		$variables['evenements']=$this->Evenement->last();


		$this->load->view('accueil',$variables);
	}
}
