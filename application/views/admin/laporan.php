<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$this->masuk();		
	}
	public function masuk(){
		$this->load->view('laporan/form_pilih_masuk');
	}
	public function harian(){
		$$this->load->view('laporan/form_harian_masuk');
	}

}

/* End of file laporan.php */
/* Location: ./application/views/laporan.php */