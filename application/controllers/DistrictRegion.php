<?php
class DistrictRegion_model extends CI_Model
{
	public function region()
	{
		$query = $this->db->query('SELECT * FROM Region ORDER BY nomRegion ASC', array());
		return ($query->result_array());
	}

	public function district($region)
	{
		$query = $this->db->query('SELECT * FROM District WHERE region = ? ORDER BY nomDistrict ASC', array($region));
		return ($query->result_array());
	}
}