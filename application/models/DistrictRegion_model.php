<?php
class DistrictRegion_model extends CI_Model
{
	public function regions()
	{
		$query = $this->db->query('SELECT * FROM Region ORDER BY nomRegion ASC', array());
		return ($query->result_array());
	}

	public function district($region)
	{
		$query = $this->db->query('SELECT * FROM District WHERE region = ? ORDER BY nomDistrict ASC', array($region));
		return ($query->result_array());
	}

	public function groupe($district)
	{
		$query = $this->db->query('SELECT * FROM Groupe WHERE district = ? ORDER BY nomGroupe ASC', array($district));
		return ($query->result_array());
	}

	public function communes($region)
	{
		if($region=="6"){
			$query = $this->db->query('SELECT * FROM Commune ORDER BY nomCommune ASC', array());
		}else{
		$query = $this->db->query('SELECT * FROM Commune WHERE region = ? ORDER BY nomCommune ASC', array($region));
		}
		return ($query->result_array());
	}

	public function arrondissement($commune)
	{
		$query = $this->db->query('SELECT * FROM Arrondissement WHERE commune = ? ORDER BY nomArrondissement ASC', array($commune));
		return ($query->result_array());
	}
	
}