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
}