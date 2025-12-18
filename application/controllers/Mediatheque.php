<?php
class Mediatheque extends CI_Controller {


	public function bibliotheque()
	{
		$variables = initSession("Retrouvez tous nos documents en téléchargement libre dans la bibliotheque du scoutisme béninois");
		$this->load->model('Bibliotheque_model','Bibliotheque');
		$variables['livres']=$this->Bibliotheque->gets();
		$this->load->view('bibliotheque',$variables);
	}
}
