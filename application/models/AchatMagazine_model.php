<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AchatMagazine_model extends CI_Model
{
	public function add($idJournal, $montant, $transactionId)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO AchatMagazine VALUES (Null,?,?,?,?,NOW(),?,?)',
		array(
			$idJournal,
			"",
			"",
			$montant,
			$transactionId,
			0
		));
	}

	public function getFromTransat($id){
		$query = $this->db->query('SELECT * FROM AchatMagazine where AchatMagazine.transactionId = ?', array($id));
		return ($query->result_array());
	}


	public function getDataString($userKey){
		$query = $this->db->query('SELECT * FROM AchatMagazine, Journal where AchatMagazine.userKey = ? AND Journal.idJournal = AchatMagazine.idJournal', array($userKey));
		return ($query->result_array());
	}


	public function update($tableau, $id)
	{
		$this->db->where('idAchatMagazine',$id);
		return $this->db->update('AchatMagazine',$tableau);
	}

}