<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	
	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->is_login();
	// }

	// public function is_login(){
	// 	$id_user = $this->session->userdata('id_user');

	// 	if(empty($id_user)){
	// 		redirect('Login');
	// 	}
	// }
	


	public function index()
	{
		$this->load->model('Model_data');
		$data['data'] = $this->Model_data->tampil();
		
		ob_start();
		$content = $this->load->view('data',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('L', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}

	
	}
	
	public function cetak()
	{
		$this->load->model('Model_data');
		$data['data'] = $this->Model_data->tampil();
		$this->load->view('data',$data);
	}
}

// $level = $this->session->userdata('level');