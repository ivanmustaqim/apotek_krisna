<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_model extends CI_Model {

	function getDataNamasupplier(){
		$query="select * from data_supplier";
		$q=$this->db->query($query);
		if ($q->num_rows() > 0 ) {
			foreach ($q->result () as $row) {
				$data[]=$row;
			}
			return $data;
		}
	}

}

/* End of file M_model.php */
/* Location: ./application/models/M_model.php */