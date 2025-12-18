<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evenement_model extends CI_Model
{
	public function last()
	{
		$query = $this->db->query('SELECT * FROM Categorie, Evenement where Categorie.idCategorie = Evenement.categorie ORDER BY idEvenement DESC LIMIT 4 ', array());
		return ($query->result_array());
	}
	public function get($id)
	{
		$query = $this->db->query('SELECT * FROM Categorie, Evenement where Categorie.idCategorie = Evenement.categorie AND Evenement.idEvenement = ? ORDER BY idEvenement DESC LIMIT 6 ', array($id));
		return ($query->result_array());
	}
	public function getAll()
	{
		$query = $this->db->query('SELECT * FROM Categorie, Evenement where Categorie.idCategorie = Evenement.categorie ORDER BY idEvenement DESC', array());
		return ($query->result_array());
	}
	public function add($post, $image)
	{
		$resultat = false;

		$operation = $this->db->query('INSERT INTO Evenement VALUES (Null,?,?,?,?,?)',array(
			$post['titre'],
			$post['dateEvenement'],
			$post['categorie'],
			$post['contenu'],
			$image
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
		$operation = $this->db->query('DELETE FROM Evenement WHERE idEvenement = ?',array($id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}
	public function update($tableau, $id)
	{
		$this->db->where('idEvenement',$id);
		return $this->db->update('Evenement',$tableau);
	}
}