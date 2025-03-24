<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Journal_model extends CI_Model
{
	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Journal ORDER BY idJournal DESC', array());
		return ($query->result_array());
	}

	public function get($id)
	{
		$query = $this->db->query('SELECT * FROM Journal WHERE idJournal = ?', array($id));
		return ($query->result_array());
	}

	public function lecture($id)
	{
		$resultat = false;
		$operation = $this->db->query('UPDATE Journal SET compteur = compteur+1 WHERE idJournal = ?',array($id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

}