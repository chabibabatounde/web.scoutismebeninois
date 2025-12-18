<?php


class Web extends CI_Controller {
	public function compressImg($input, $output, $q)
  {
  $api_key = "f5q6jRD3f4Jh1Vv79WwtpDwvVSw6BZg0";
  $request = curl_init();
  curl_setopt_array($request, array(
      CURLOPT_URL => "https://api.tinify.com/shrink",
      CURLOPT_USERPWD => "api:" . $api_key,
      CURLOPT_POSTFIELDS => file_get_contents($input),
      CURLOPT_BINARYTRANSFER => true,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HTTPHEADER => array("Content-Type: application/octet-stream")
  ));

  $response = curl_exec($request);
  $response_data = json_decode($response, true);

  $compressed_url = $response_data["output"]["url"];
  file_put_contents($output, file_get_contents($compressed_url));
  }


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
		if(true){
			switch ($page) {
			case 'index':
				if(isset($_POST['categorie'])){
					$basename = getcwd().'/assets/img/news/';
				    $name = date("siHdmYmdHis").".jpg";
				    $source = $basename.$name;
				    if(move_uploaded_file($_FILES['coover-input']["tmp_name"], $source)){
					    $destination = $basename."thumb-".$name;
					    $quality = 50;
					    $this->compressImg($source, $destination, $quality);
					    $basename = getcwd().'/assets/piecejointe/';
					    $fichiers =[];
					    for ($i=1; $i < 11; $i++) {
					    	if(isset($_FILES['file'.($i)])){
					    		$name = "joined-".$i."-".date("siHdmYmdHis").".jpg";
							    move_uploaded_file($_FILES['file'.($i)]["tmp_name"], $basename.$name);
					    		$source = $basename.$name;
							    $destination = $basename."pj-".$name;
							    $quality = 50;
							    $this->compressImg($source, $destination, $quality);
							    unlink($source);
					    		$fichiers[] =  "pj-".$name;
					    	}
					    }
				    	$this->Article->add($_POST, $name, $fichiers);
						echo ('Article ajouté!<br>');
				    }
				}
				$variables['articles']= $this->Article->getAll();
				$this->load->view('admin_article',$variables);
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

	public function bibliotheque($page, $id=0){
		$variables = initSession("Administration");
		$this->load->model('Bibliotheque_model','Bibliotheque');
		$variables['bibliotheques']= $this->Bibliotheque->gets();
		switch ($page) {
		case 'index':
			if(isset($_SESSION['ccom'])){
				if(isset($_POST['nomDocument'])){
					$basename = getcwd().'/assets/mediatheque/livre/';
					$exten = explode(".", $_FILES["fichier"]['name']);
		    		$name = date("siHdmYmdHis").".".$exten[count($exten)-1];
				    move_uploaded_file($_FILES['fichier']["tmp_name"], $basename.$name);
					$liste = $this->Bibliotheque->add($_POST['nomDocument'], $name);
					$variables['bibliotheques']= $this->Bibliotheque->gets();
				}
				$this->load->view("admin_bibliotheque",$variables);
			}
			else{
				$this->load->view('admin',$variables);
			}
			break;
		case 'delete':
			if($id!=0){
				$this->Bibliotheque->del($id);
			}
			break;
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
						$basename = getcwd().'/assets/img/event/';
					    $name = date("siHdmYmdHis").".jpg";
					    move_uploaded_file($_FILES['couverture']["tmp_name"], $basename.$name);

					    $source = $basename.$name;
					    $destination = $basename."thumb-".$name;
					    $quality = 50;
					    $info = getimagesize($source);
					    if ($info['mime'] == 'image/jpeg') 
					        $image = imagecreatefromjpeg($source);
					    elseif ($info['mime'] == 'image/gif') 
					        $image = imagecreatefromgif($source);
					    elseif ($info['mime'] == 'image/png') 
					        $image = imagecreatefrompng($source);
					    compressImg($image, $destination, $quality);


						$this->Evenement->add($_POST, $name);
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
