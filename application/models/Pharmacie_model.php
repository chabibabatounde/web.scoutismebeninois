<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pharmacie_model extends CI_Model
{
	public function addNewsletter($mail)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Newsletter VALUES (Null,?)',array($mail));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function search($pays, $ville)
	{
		$query = $this->db->query('SELECT * FROM Pharmacie, Ville where Pharmacie.ville = Ville.idVille AND Pharmacie.pays = ? AND Pharmacie.ville = ?', array($pays, $ville));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}