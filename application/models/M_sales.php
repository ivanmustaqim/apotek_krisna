<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sales extends CI_Model {

	function simpan_keluar($data_keluar){
		$this->db->insert('sales', $data_keluar);

		if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
		}else{
			return 0;
		}
	}
	
	function simpan_detil_keluar($data_detil_keluar){
		$this->db->insert_batch('sales_items', $data_detil_keluar);

		return $this->db->affected_rows();
	}
}

/* End of file M_sales.php */
/* Location: ./application/models/M_sales.php */