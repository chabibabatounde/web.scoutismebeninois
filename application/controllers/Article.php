<?php
class Article extends CI_Controller {


	public function lecture($id)
	{
		$variables = initSession("");
		$this->load->model('Article_model','Article');
		$id = base_convert($id, 14,10);
		$variables['article']=$this->Article->get($id)[0];
		$variables['titrePage']=$variables['article']['titre'];
		$this->load->view('article',$variables);
	}

	public function index()
	{
		$variables = initSession("Actualités, Nouvelles et Informations scoutes");
		$this->load->model('Article_model','Article');
		$this->load->model('Categorie_model','Categorie');
		$variables['categories']=$this->Categorie->gets();
		$variables['articles']=$this->Article->gets();
		$this->load->view('blogs',$variables);
	}

	public function categorie($id, $intitule)
	{
		$variables = initSession("Actualités, Nouvelles et Informations scoutes");
		$this->load->model('Article_model','Article');
		$this->load->model('Categorie_model','Categorie');
		$variables['categories']=$this->Categorie->gets();
		$variables['articles']=$this->Article->getByCategorie($id);
		$this->load->view('blogs',$variables);
	}

	
	
}
