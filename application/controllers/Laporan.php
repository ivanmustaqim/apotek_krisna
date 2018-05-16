<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		// $this->bulan_keluar();	

		$data=array(
       'active_laporan'=>'active',
       );	

	  $this->load->view('admin/element/header');
      $this->load->view('admin/element/sidebar',$data);
      $this->load->view('admin/v_laporan');
	}
	public function masuk(){
		$this->load->view('laporan/form_pilih_masuk');
	}
	public function keluar(){
		$this->load->view('laporan/form_pilih_keluar');
	}
	
	public function set_laporan(){
	 	$status = $this->input->post('status');

	 	if ($status == 1) {
	 		$this->bulan();
	 	}else{
	 		$this->bulan_keluar();
	 	}
	}
	public function bulan(){
		$laporan = $this->m_laporan->ambil_data_masuk();
		$laporan_options = array();

		 $laporan_options['']='--BELUM DIPILIH--';

		if($laporan->num_rows() > 0){
			foreach ($laporan->result_array() as $row) {
				$laporan_options[date('Y-m',strtotime($row['tgl_sales']))] = strtoupper(date('F Y',strtotime($row['tgl_sales'])));
			}
		}
		$data['laporan_options'] = $laporan_options;
		$this->load->view('laporan/form_bulan_masuk',$data);
	 }
	// public function cari_hari_masuk(){
	// 	$cari = $this->input->post('cari');
	// 	$data['tgl'] = $cari;
	// 	$data['cari'] = $this->m_laporan->ambil_cari_masuk($cari)->result();

	// 	$this->load->view('laporan/form_harian_masuk', $data);
	// }
	public function cari_bulan_masuk(){
		$cari = $this->input->post('cari');
		$data['bulan'] = $cari;
		$data['cari'] = $this->m_laporan->ambil_cari_masuk($cari)->result();

		$this->load->view('laporan/form_bulan_masuk', $data);
	}
	
	
		public function bulan_keluar(){
			$laporan = $this->m_laporan->ambil_data_keluar();
			$laporan_options = array();

			 $laporan_options['']='--BELUM DIPILIH--';

			if($laporan->num_rows() > 0){
				foreach ($laporan->result_array() as $row) {
					$laporan_options[date('Y-m',strtotime($row['sale_time']))] = strtoupper(date('F Y',strtotime($row['sale_time'])));
				}
			}
			$data['laporan_options'] = $laporan_options;
			$this->load->view('laporan/form_bulan_keluar',$data);
		}
	public function cari_bulan_keluar(){
		$cari = $this->input->post('cari');
		$data['bulan'] = $cari;
		$data['cari'] = $this->m_laporan->ambil_cari_keluar($cari)->result();

		$this->load->view('laporan/form_bulan_keluar', $data);
	}

}

/* End of file laporan.php */
/* Location: ./application/views/laporan.php */