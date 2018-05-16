<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

	function ambil_data_masuk(){
		// $this->db->where('deleted', 0);
		return $this->db->get('obat');
	}
		
	function ambil_data_keluar(){
		$this->db->where('deleted', 0);
		return $this->db->get('sales');
	}

	function ambil_cari_masuk($cari){
		// $this->db->where('receivings_items.deleted', 0);
		$this->db->like('tgl_sales',$cari, 'both');
		// $this->db->join('receivings', 'receivings.receiving_id = receivings_items.receiving_id');
		// $this->db->join('barang', 'barang.id_barang = receivings_items.id_barang');
		return $this->db->get('obat');
	}
	function ambil_cari_keluar($cari){
		$this->db->where('sales_items.deleted', 0);
		$this->db->like('sale_time',$cari, 'both');
		$this->db->join('sales', 'sales.sale_id = sales_items.sale_id');
		$this->db->join('obat', 'obat.id_obat = sales_items.id_obat');
		return $this->db->get('sales_items');
	}

}

/* End of file m_laporan.php */
/* Location: ./application/models/m_laporan.php */