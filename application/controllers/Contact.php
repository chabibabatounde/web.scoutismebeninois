<?php
class Contact extends CI_Controller {

	public function index()
	{
		$variables = initSession("Voulez vous nous contacter? Utilisez notre formulaire de contact");
		$variables['message'] ="Trouvez ici tous nos moyens de contact";
		if(isset($_POST['email'])){
			$variables['message'] ="Nous avons reçu votre méssage! Nous vous remercions.";
		}
		$this->load->view('contact',$variables);
	}
}
