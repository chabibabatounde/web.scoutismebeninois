<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article_model extends CI_Model
{
	public function last()
	{
		$query = $this->db->query('SELECT * FROM Categorie, Article where Categorie.idCategorie = Article.categorie ORDER BY idArticle DESC LIMIT 9 ', array());
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

	public function add($post, $name, $fichiers)
	{
		print_r($fichiers);
		$resultat = false;
		$operation = $this->db->query('INSERT INTO Article VALUES (Null,?,?,?,?,?,?,NOW())',array($post['categorie'],$post['titre'],$name,$post['contenu'],$post['youtube'],0));
		if($operation)
		{
			$resultat = true;
			foreach ($fichiers as $fichier) {
				$exten = explode(".", $fichier);
				$images = ['jpg',"JPG",'png',"PNG","gif","GIF"];
				$videos = ['mp4',"MP4",'avi',"AVI","3GP","3gp"];
				$type = "others";
				if( in_array($exten[count($exten)-1], $images)){
					$type = "images";
				}
				if( in_array($exten[count($exten)-1], $videos)){
					$type = "videos";
				}
				$query = $this->db->query('SELECT * FROM Article ORDER BY idArticle DESC LIMIT 1 ', array());
				$idArticle = ($query->result_array())[0]['idArticle'];
				print_r($fichier);
				print_r($idArticle);
				$this->db->query('INSERT INTO PieceJointe VALUES (Null,?,?,?)',array(
					$fichier,
					$type,
					$idArticle
				));
			}
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
