<?php
class Portofolio extends CI_Controller {


	public function inscription()
	{
		$variables = initSession("Bienvenu");
		$this->load->view('accueil',$variables);
	}
	public function consulter()
	{
		$variables = initSession("Bienvenu");
		$this->load->view('accueil',$variables);
	}
}
