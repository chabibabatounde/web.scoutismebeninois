<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PieceJointe_model extends CI_Model
{
	public function addPiece($filename, $type, $article)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO PieceJointe VALUES (Null,?,?,?)',array($filename, $type, $article));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function getFiles($article)
	{
		$query = $this->db->query('SELECT * FROM PieceJointe where article = ?', array($article));
		return ($query->result_array());
	}

	public function setExperience($tableau)
	{
		/*$data=array('periode'=>$tableau['periode'],'poste'=>$tableau['poste'],'structure'=>$tableau['structure'],'commentaire'=>$tableau['commentaire']);
		$this->db->where('idExperience',$tableau['idExperience']);
		return $this->db->update('Experience',$data);*/
	}

}