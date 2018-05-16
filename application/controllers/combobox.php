<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combobox extends CI_Controller {

	public function index()
	{
		$this->load->model('m_model');
		$dataNamasupplier = $this->m_model->getDataNamasupplier();
		$data['nama_supplier'] = $dataNamasupplier;	
		$this->load->view('view1', $data);
	}

	

}

/* End of file combobox.php */
/* Location: ./application/controllers/combobox.php */