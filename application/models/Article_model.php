<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{
	public function last()
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie ORDER BY idArticle DESC LIMIT 6 ', array());
		return ($query->result_array());
	}
	
	public function get($id)
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie AND Article.idArticle = ? ORDER BY idArticle DESC LIMIT 6 ', array($id));
		return ($query->result_array());
	}

	public function gets()
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie ORDER BY idArticle DESC LIMIT 24 ', array());
		return ($query->result_array());
	}
	public function getByCategorie($id)
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie AND Categorie.idCategorie = ? ORDER BY idArticle DESC LIMIT 24 ', array($id));
		return ($query->result_array());
	}





	public function delete()
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Newsletter VALUES (Null,?)',array($mail));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}
	public function update()
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