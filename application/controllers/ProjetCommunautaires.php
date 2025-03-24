<?php

class ProjetCommunautaires extends CI_Controller {
	public function mop()
	{
		$variables = initSession("Projet communautaires : Messagers De La Paix ");
		$variables['sessionImage'] =  img_url("common-banner-mop.jpg");
		$this->load->view('projet_mop',$variables);
	}
	public function FoodForLife()
	{
		$variables = initSession("Projet communautaires : Food For Life");
		$variables['sessionImage'] =  img_url("common-banner.jpg");
		$this->load->view('projet_ffl',$variables);
	}
	public function jeuxSansTabou()
	{
		$variables = initSession("Projet communautaires : Jeux Sans Tabou");
		$variables['sessionImage'] =  img_url("common-banner.jpg");
		$this->load->view('projet_jst',$variables);
	}
}
