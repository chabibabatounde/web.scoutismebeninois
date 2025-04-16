<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('css_url')){
	function css_url($nom){
		return urlDeBase() . 'assets/css/' . $nom . '.css';
	}
}
if ( ! function_exists('js_url')){
	function js_url($nom){
		return urlDeBase() . 'assets/js/' . $nom . '.js';
	}
}
if ( ! function_exists('mag_url')){
	function mag_url($nom){
		return urlDeBase() . 'assets/mediatheque/scout-mag/' . $nom ;
	}
}
if ( ! function_exists('img_url')){
	function img_url($nom){
		return urlDeBase() . 'assets/img/' . $nom ;
	}
}
if ( ! function_exists('lien')){
	function lien($controler, $method){
		return urlDeBase() . 'index.php/' . $controler."/".$method ;
	}
}
if ( ! function_exists('lib_url')){
	function lib_url($lib){
		return urlDeBase() . 'assets/lib/' . $lib ;
	}
}
if ( ! function_exists('biblio_url')){
	function biblio_url($lib){
		return urlDeBase() . 'assets/mediatheque/livre/' . $lib ;
	}
}
if ( ! function_exists('urlDeBase')){
	function urlDeBase(){
		//return 'http://13.48.58.6:2026/';
		//return "http://localhost/scoutismebeninoisV3/";
		return base_url();
		//return "https://scoutismebeninois.org/";
	}
}

if(!function_exists('sendHttpGET')){
	function sendHttpGET($url)
	{
	return file_get_contents($url);
/*
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $server_output = curl_exec($ch);
        curl_close($ch); 
		return $server_output;*/
	}
}

if(!function_exists('sendHttpPost')){
	function sendHttpPost($url, $data)
	{
		$options = array(
			'http' => array(
			    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
			    'method'  => 'POST',
			    'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		return $result;


		/*$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$headers = array(
		   "Accept: application/json",
		   "Content-Type: application/json",
		);
		$jsonData = json_encode($data);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$fields_string = http_build_query($data);
		$data = <<<DATA
		{
			"apiKey":"{$data['apiKey']}",
			"mode":"{$data['mode']}",
			"amount":"{$data['amount']}",
			"callbackurl":"{$data['callbackurl']}",
			"title":"{$data['title']}",
			"email":"{$data['email']}",
			"telephone":"{$data['telephone']}",
			"description":"{$data['description']}",
			"image":"{$data['img_url']}"
		}
		DATA;
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$server_output = curl_exec($ch);
		curl_close ($ch);
		return $server_output;*/
	}
}


if(!function_exists('outils_assets')){
	function outils_assets($nom)
	{
		return urlDeBase() . 'assets/finance/' . $nom;
	}
}



