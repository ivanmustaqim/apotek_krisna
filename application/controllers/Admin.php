
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
   $this->load->model('Modelapp');
   // //$this->load->library('pagination');
   // $this->load->helper(array('url','text','form')); //load helper url
    $this->is_login();
  }

  public function is_login(){
    $id_user = $this->session->userdata('id_user');

    if(empty($id_user)){
      redirect('Login');
    }
  }
	
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
		$data=array(
			'title'=>'Home Apotek Krisna',
			'active_dashboard'=>'active',
			);
		$tgl1 = date('Y-m-d', strtotime('+90 days ', strtotime('now')));
		$tgl2 = date('Y-m-d', strtotime('now'));
		$tgl3 = date('Y-m-d', strtotime('+60 days ', strtotime('now')));
		$tgl4 = date('Y-m-d', strtotime('+30 days ', strtotime('now')));

		$obat = $this->Modelapp->hitung_kadaluarsa($tgl1)->num_rows();
		$obat2= $this->Modelapp->hitung_kadaluarsa2($tgl2)->num_rows();
		$obat3= $this->Modelapp->hitung_kadaluarsa2($tgl3)->num_rows();
		$obat4= $this->Modelapp->hitung_kadaluarsa2($tgl4)->num_rows();

		$data['kadaluarsa1'] = $obat;
		$data['kadaluarsa2'] = $obat2;
		$data['kadaluarsa3'] = $obat3;
		$data['kadaluarsa4'] = $obat4;

		$data['jumlah'] = $obat+$obat2;
		$this->load->view('admin/element/header');
		$this->load->view('admin/element/sidebar',$data);
		$this->load->view('admin/v_admin',$data);
	}
	public function coba(){
		$tgl = date('Y-m-d',strtotime('now'));
		$obat = $this->Modelapp->hitung_kadaluarsa($tgl)->num_rows();
		echo $obat;
	}
	
}

// $level = $this->session->userdata('level');