<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ville_model extends CI_Model
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

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Ville ORDER BY nomVille ASC');
		return ($query->result_array());
	}
	public function get($id)
	{
		$query = $this->db->query('SELECT * FROM Ville WHERE idVille = ?',array($id));
		return ($query->result_array()['0']);
	}
	public function getByPays($pays)
	{
		$query = $this->db->query('SELECT * FROM Ville WHERE pays = ?',array($pays));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}