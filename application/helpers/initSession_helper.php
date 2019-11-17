<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('initSession')){
	function initSession($titre, $sessionImage=''){
	$reponse = array(
		'titrePage'=>$titre,
		'sessionImage'=>img_url($sessionImage),
	);

	$reponse['showDate'] = function ($date)
	{
		return substr($date, 8 , 2).'/'.substr($date, 5 , 2).'/'.substr($date, 0 , 4);
	};

	$reponse['getMois'] = function ($date)
	{
		$mois = substr($date, 5 , 2);
		$leMois = array('Jan','Fev','Mar','Avr','Mai','Juin','Juil','Aou','Sep','Oct','Nov','Dec');
		return $leMois[$mois-1];
	};

	$reponse['getDate'] = function ($date)
	{
		return  substr($date, 8 , 2);
	};

	$reponse['getHeure'] = function ($date)
	{
		return  substr($date, 10 , 6);
	};


	

	$reponse['titleLess'] = function ($titre)
	{
		$taille = 40;
		if (strlen($titre)>$taille) {
			return substr($titre, 0 , $taille).'...';	
		}else{
			return $titre;
		}
	};

	$reponse['getAnnee'] = function ($titre)
	{
		return  substr($titre, 0 , 4);
	};
	
	$reponse['lessEvent'] = function ($titre)
	{
		$taille = 40;
		if (strlen($titre)>$taille) {
			return substr($titre, 0 , $taille).'...';	
		}else{
			return $titre;
		}
	};

	return $reponse;
	}
}