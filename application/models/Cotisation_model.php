<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotisation_model extends CI_Model
{
	public function add($post, $transactionId)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Cotisation VALUES (Null,?,?,?,?,?,?,?,?,?,?,NOW(),?,?)',
		array(
			$post['nom'],
			$post['prenom'],
			$post['telephone'],
			$post['email'],
			$post['region'],//Region
			$post['district'],//district
			substr($post['categorie'], 2, strlen($post['categorie'])-1),
			$post['annee'],
			$post['montant'],
			$post['montant']+($post['montant'] * 0.04) ,
			$transactionId,//TransactionId,
			0
		));
	}

	public function getFromTransat($id){
		$query = $this->db->query('SELECT * FROM Cotisation, Region, District where Cotisation.transactionId = ? AND Cotisation.region = Region.idRegion AND Cotisation.district = District.idDistrict  ORDER BY idCotisation DESC LIMIT 1 ', array($id));
		return ($query->result_array());
	}

	public function getAll(){
		$query = $this->db->query('SELECT * FROM Cotisation, Region, District where Cotisation.status=1 AND Cotisation.region = Region.idRegion AND Cotisation.district = District.idDistrict  ORDER BY datePaiement DESC', array());
		return ($query->result_array());
	}

	public function getByYear($annee){
		$anneeDebut = $annee-1;
		$request = 'SELECT * FROM Cotisation, Region, District where (Cotisation.datePaiement BETWEEN "'.$anneeDebut.'-09-01" AND "'.$annee.'-08-31") AND Cotisation.status=1 AND Cotisation.region = Region.idRegion AND Cotisation.district = District.idDistrict  ORDER BY datePaiement ASC' ;
		$query = $this->db->query($request, array());
		return ($query->result_array());
	}

	

	public function payer($id){
		$this->db->where('idCotisation',$id);
		return $this->db->update('Cotisation',array("status"=>1));
	}
}