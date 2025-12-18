<?php
class Evenement extends CI_Controller {


	public function lecture($id)
	{
		$variables = initSession("");
		$this->load->model('Evenement_model','Evenement');
		$variables['evenement']=$this->Evenement->get($id)[0];
		$variables['titrePage']=$variables['evenement']['titre']." | Agenda scout";
		$this->load->view('evenement',$variables);
	}
}
