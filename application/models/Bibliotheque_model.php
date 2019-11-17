<?php
class Bibliotheque_model extends CI_Model
{
	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Bibliotheque ORDER BY nomDocument ASC', array());
		return ($query->result_array());
	}
}