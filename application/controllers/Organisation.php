<?php
class Organisation extends CI_Controller {


	public function directionExecutive()
	{
		$variables = initSession("Direction Exécutive du scoutisme béninois");
		$this->load->view('directionExecutive',$variables);
	}
	public function bureauNational()
	{
		$variables = initSession("Bureau national du scoutisme béninois");
		$this->load->view('bureauNational',$variables);
	}
	public function commissariatDeRegion()
	{
		$variables = initSession("Commissariat de Région Scoute");
		$this->load->view('region',$variables);
	}
	public function jeuneConseillers()
	{
		$variables = initSession("Forum des jeunes du scoutisme béninois");
		$this->load->view('jeuneConseillers',$variables);
	}
	public function comiteNational(){
		$variables = initSession("Comité National");
		$this->load->view('comiteNational',$variables);
	}
	public function verificateurs(){
		$variables = initSession("Vérificatreurs de Comptes");
		$this->load->view('verificateurs',$variables);
	}
	public function ancienscomissaires(){
		$variables = initSession("Anciens Secrétaires/Commissaires Généraux du Scoutisme Béninois depuis 1974");
		$this->load->view('ancienscomissaires',$variables);
	}
	
	
}
