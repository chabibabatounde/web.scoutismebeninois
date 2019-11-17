<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model extends CI_Model
{
	public function gets()
	{
		$query = $this->db->query('SELECT nom, email FROM Newsletter', array());
		return ($query->result_array());
	}

	public function add($data)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Newsletter VALUES (Null,?,?)',array($data['nom'], $data['email']));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

}