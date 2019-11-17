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
	public function getAll()
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie ORDER BY idArticle DESC ', array());
		return ($query->result_array());
	}
	public function getByCategorie($id)
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie AND Categorie.idCategorie = ? ORDER BY idArticle DESC LIMIT 24 ', array($id));
		return ($query->result_array());
	}
	public function add($post)
	{
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Article VALUES (Null,?,?,?,?,?,NOW())',array(
			$post['categorie'],
			$post['titre'],
			$post['couverture'],
			$post['contenu'],
			0
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
		$operation = $this->db->query('DELETE FROM Article WHERE idArticle = ?',array($id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}
	public function lecture($id)
	{
		$resultat = false;
		$operation = $this->db->query('UPDATE Article SET nmbreLu = nmbreLu+1 WHERE idArticle = ?',array($id));
		if($operation)
		{
			$resultat = true;
		}
		return $resultat;
	}

	public function update($tableau, $id)
	{
		$this->db->where('idArticle',$id);
		return $this->db->update('Article',$tableau);
	}

	

}