<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('maCle')){
  function maCle(){
  $Cle="*w9s!?y²";
  return $Cle;
  }
}

if ( ! function_exists('GenerationCle')){
function GenerationCle($Texte,$CleDEncryptage)
  {
  $CleDEncryptage = md5($CleDEncryptage);
  $Compteur=0;
  $VariableTemp = "";
  for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
    {
    if ($Compteur==strlen($CleDEncryptage))
      $Compteur=0;
    $VariableTemp.= substr($Texte,$Ctr,1) ^ substr($CleDEncryptage,$Compteur,1);
    $Compteur++;
    }
  return $VariableTemp;
  }
}


if ( ! function_exists('compressImg')){
  function compressImg($input, $output, $q)
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
}


if ( ! function_exists('crypter')){
 function crypter($Texte){

  $Cle=maCle();


  srand((double)microtime()*1000000);
  $CleDEncryptage = md5(rand(0,32000) );
  $Compteur=0;
  $VariableTemp = "";
  for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
    {
    if ($Compteur==strlen($CleDEncryptage))
      $Compteur=0;
    $VariableTemp.= substr($CleDEncryptage,$Compteur,1).(substr($Texte,$Ctr,1) ^ substr($CleDEncryptage,$Compteur,1) );
    $Compteur++;
    }
  $var = base64_encode(GenerationCle($VariableTemp,$Cle) );
  return $var;
  }
}


if ( ! function_exists('decrypter')){

  function decrypter($Texte)
  {



    $Cle=maCle();



  $Texte = GenerationCle(base64_decode($Texte),$Cle);
  $VariableTemp = "";
  for ($Ctr=0;$Ctr<strlen($Texte);$Ctr++)
    {
    $md5 = substr($Texte,$Ctr,1);
    $Ctr++;
    $VariableTemp.= (substr($Texte,$Ctr,1) ^ $md5);
    }
  return $VariableTemp;
  }
}
