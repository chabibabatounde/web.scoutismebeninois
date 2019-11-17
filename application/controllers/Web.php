<?php
class Web extends CI_Controller {
	public function login()
	{
		$variables = initSession("Administration");
		if(isset($_POST['login']) AND isset($_POST['password'])){
			if($_POST['login']=='ccom2019' AND $_POST['password']=='@sbccom2019'){
				$_SESSION['ccom'] = 'connecté';
				$this->load->model('Article_model','Article');
				$variables['articles']= $this->Article->getAll();
				$this->load->model('Categorie_model','Categorie');
				$variables['categories']= $this->Categorie->gets();
				///REDIRECT TO ARTICLE - INDEX
				$this->load->view('admin_article',$variables);
			}else{
				echo "<center>Informations de connexion sont incorrectes</center>";				
				$this->load->view('admin',$variables);
			}
		}
		else{
			$this->load->view('admin',$variables);
		}	
	}

	public function deconnect()
	{
		session_destroy();
		$this->load->view('admin');
	}

	public function articles($page, $id='0')
	{
		$variables = initSession("Administration");
		$this->load->model('Article_model','Article');
		$this->load->model('Categorie_model','Categorie');
		$variables['categories']= $this->Categorie->gets();

		if(isset($_SESSION['ccom'])){	
			switch ($page) {
			case 'index':
				if(isset($_POST['categorie'])){
						echo ('Article ajouté!');
						$this->Article->add($_POST);
						$variables['articles']= $this->Article->getAll();
						$this->load->view('admin_article',$variables);
				}else{
					$variables['articles']= $this->Article->getAll();
					$this->load->view('admin_article',$variables);
				}
				break;
			case 'delete':
				if($id!=0){
					$this->Article->del($id);
				}
				break;
			case 'update':
				if($id!=0){
					if(isset($_POST['categorie'])){
						echo ('Article modifié!');
						$this->Article->update($_POST,$id);
						$variables['articles']= $this->Article->getAll();
						$this->load->view('admin_article',$variables);
					}else{
						$variables['article']= $this->Article->get($id);
						$this->load->view('admin_editArticle',$variables);
					}
				}
				break;
			default:
				break;
			}
		}else{
			$this->load->view('admin',$variables);
		}
	}

	public function newsletter()
	{
		$variables = initSession("Administration");
		if(isset($_SESSION['ccom'])){	
			if(isset($_POST['contenu'])){
				$this->load->model('Newsletter_model','Newsletter');
				$liste = $this->Newsletter->gets();
				//mail(to, subject, message)
				echo ('Mail envoyé!');
			}
			$this->load->view("admin_newsletter",$variables);
		}else{
			$this->load->view('admin',$variables);
		}
	}


	public function evenements($page, $id='0')
	{
		$variables = initSession("Administration");
		$this->load->model('Evenement_model','Evenement');
		$this->load->model('Categorie_model','Categorie');
		$variables['categories']= $this->Categorie->gets();

		if(isset($_SESSION['ccom'])){	
			switch ($page) {
			case 'index':
				if(isset($_POST['categorie'])){
						echo ('Evenement ajouté!');
						$this->Evenement->add($_POST);
						$variables['evenements']= $this->Evenement->getAll();
						$this->load->view('admin_evenement',$variables);
				}else{
					$variables['evenements']= $this->Evenement->getAll();
					$this->load->view('admin_evenement',$variables);
				}
				break;
			case 'delete':
				if($id!=0){
					$this->Evenement->del($id);
				}
				break;
			case 'update':
				if($id!=0){
					if(isset($_POST['categorie'])){
						echo ('Evenement modifié!');
						$this->Evenement->update($_POST,$id);
						$variables['evenements']= $this->Evenement->getAll();
						$this->load->view('admin_evenement',$variables);
					}else{
						$variables['evenement']= $this->Evenement->get($id);
						$this->load->view('admin_editEvenement',$variables);
					}
				}
				break;
			default:
				break;
			}
		}else{
			$this->load->view('admin',$variables);
		}
	}

}
