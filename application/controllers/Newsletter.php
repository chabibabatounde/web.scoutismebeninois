<?php
class Newsletter extends CI_Controller {
	public function add()
	{
		$variables = initSession("Bienvenu");
		$this->load->model('Newsletter_model','Newsletter');
		$this->Newsletter->add($_POST);
	}
}
