<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorie_model extends CI_Model
{
	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Categorie ORDER BY nomCategorie ASC', array());
		return ($query->result_array());
	}
}

?>