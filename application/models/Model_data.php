<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_data extends CI_Model
{
	function tampil()
	{
		$query = $this->db->query("Select * from data_supplier");
		return $query;
	}
}