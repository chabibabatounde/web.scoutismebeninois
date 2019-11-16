<?php
class Contact extends CI_Controller {


	public function index()
	{
		$variables = initSession("Voulez vous nous contacter? Utilisez notre formulaire de contact");
		$this->load->view('contact',$variables);
	}
}
