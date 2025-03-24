<?php
class Welcome extends CI_Controller {
	public function index()
	{
		//die(phpversion());
		//echo(function_exists('curl_version'));
		$variables = initSession("Bienvenu sur notre site web officiel ");

		$this->load->model('Article_model','Article');
		$variables['nouvelles']=$this->Article->last();
		$this->load->model('Evenement_model','Evenement');
		$variables['evenements']=$this->Evenement->last();
		$fichiers = array(
			"logo.jpg",
		);
		foreach ($fichiers as $name) {
			$basename = getcwd().'/assets/img/';
		    $source = $basename.$name;
		    if($name!='logo.jpg'){
				$destination = $basename."thumb-".$name;

			    $quality = 1;
			    $info = getimagesize($source);
			    if ($info['mime'] == 'image/jpeg') 
			        $image = imagecreatefromjpeg($source);
			    elseif ($info['mime'] == 'image/gif') 
			        $image = imagecreatefromgif($source);
			    elseif ($info['mime'] == 'image/png') 
			        $image = imagecreatefrompng($source);
			    imagejpeg($image, $destination, $quality);
		    }
		}
		$this->load->view('accueil',$variables);
	}
}
