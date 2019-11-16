<?php

class ProjetCommunautaires extends CI_Controller {
	public function mop()
	{
		$variables = initSession("Projet communautaires : Messagers De La Paix ");
		$this->load->view('projet_mop',$variables);
	}
	public function FoodForLife()
	{
		$variables = initSession("Projet communautaires : Food For Life");
		$this->load->view('projet_ffl',$variables);
	}
	public function jeuxSansTabou()
	{
		$variables = initSession("Projet communautaires : Jeux Sans Tabou");
		$this->load->view('projet_jst',$variables);
	}
}
