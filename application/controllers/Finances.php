<?php
class Finances extends CI_Controller {


	public function login($year="")
	{
		if(isset($_POST['cnfp_login'])){
			if(trim($_POST['cnfp_login'])=="r.@zancheme" and trim($_POST['cnfp_password'])=="#scoutcot2022"){
				$_SESSION['cnfp_login'] = 'connecté';
				$url = lien("Finances","liste");
				$this->load->model('Cotisation_model', 'Cotisation');
				$variables = [];
				if($year!=""){
					$variables['cotisations'] = $this->Cotisation->getByYear($year);
					$variables['message_titre'] = "Total année ".$year;
					$variables['message_titre'] .= ': <span id="montant-sec"></span>  F CFA';
					$variables['message_titre'] .= "<br><br>";
					$variables['message_titre'] .= "<a href='".lien('Finances','login')."' style='color:red;'> 👉🏻 Voir toute la liste </a>";
				}
				else{
					$variables['cotisations'] = $this->Cotisation->getAll();
					$variables['message_titre'] = "Total toutes les années";
					$variables['message_titre'] .= ': <span id="montant-sec"></span>  F CFA';
					$variables['message_titre'] .= "<br><br>";
					$variables['message_titre'] .= "<a href='".lien('Finances','login/2023')."' style='color:red;'> 👉🏻 Revenir à l'année 2023 </a>";
				}
				$_SESSION['cnfp_login'] = 'connecté';
				$this->load->view('finances/liste',$variables);
			}
			else{
				echo "<br><center>Identifiant / mot de passe incorrecte <br></center>";
				$this->load->view('finances/login');
			}
		}else{
			$this->load->view('finances/login');
		}
	}

	public function deconnect()
	{
		session_destroy();
		$url = lien("Finances","login");
		header('Location:'.$url);
	}
	
}