<?php
class Maps extends CI_Controller {
	public function marquerPharmacie()
	{
		$currentPosition="6.3702928,2.3912362";
		//centre de la carte
		$config['center']=$currentPosition;
		//hauteur de la carte
		$config['map_height']='430px';
		//zoom de la carte
		$config['zoom']='9';
		$this->googlemaps->initialize($config);
		$marker = array();

		$marker['position'] = '6.374320, 2.538810';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.359264, 2.435813';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.371377, 2.407532';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.384982, 2.331186';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.400847, 2.342343';
		$this->googlemaps->add_marker($marker);

		$data=array();		
		$data['map'] = $this->googlemaps->create_map();
		$this->load->view('acceuil',$data);
	}
}




/*

$marker = array();

		$marker['position'] = '6.374320, 2.538810';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.359264, 2.435813';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.371377, 2.407532';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.384982, 2.331186';
		$this->googlemaps->add_marker($marker);

		$marker['position'] = '6.400847, 2.342343';
		$this->googlemaps->add_marker($marker);


$address = 'BTM 2nd Stage, Bengaluru, Karnataka 560076'; // Address

// Get JSON results from this request
$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
$geo = json_decode($geo, true); // Convert the JSON to an array

if (isset($geo['status']) && ($geo['status'] == 'OK')) {
  $latitude = $geo['results'][0]['geometry']['location']['lat']; // Latitude
  $longitude = $geo['results'][0]['geometry']['location']['lng']; // Longitude
}
die($latitude);*/