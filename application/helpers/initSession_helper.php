<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('initSession')){
	function initSession($titre){
	$reponse = array(
		'titrePage'=>$titre
	);
		return $reponse;
	}
}