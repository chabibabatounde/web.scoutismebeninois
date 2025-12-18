<?php
class Bibliotheque_model extends CI_Model
{
	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Bibliotheque ORDER BY nomDocument ASC', array());
		return ($query->result_array());
	}

	public function add($nomDocument, $filename)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Bibliotheque VALUES (Null,?,?,?,?)',array(
			$nomDocument,
			$filename,
			date("Ymd"),
			0,
		));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function del($id)
	{
		$resultat = false;
		$operation = $this->db->query('DELETE FROM Bibliotheque WHERE idBibliotheque = ?',array($id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}
}