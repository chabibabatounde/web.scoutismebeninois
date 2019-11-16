<?php
class Welcome extends CI_Controller {


	public function index()
	{
		$variables = initSession("Bienvenu");
		$this->load->view('accueil',$variables);
	}
}
