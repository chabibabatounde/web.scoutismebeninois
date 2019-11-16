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
	public function forumDesJeunes()
	{
		$variables = initSession("Forum des jeunes du scoutisme béninois");
		$this->load->view('forumDesJeunes',$variables);
	}
	
}
