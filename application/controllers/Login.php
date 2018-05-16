<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function __construct(){
		parent::__construct();
		$this->load->model('m_login');

	}

	public function index()
	{
    $data=array(
        'title'=>'Login - Apotek Krisna',
       'active_login'=>'active',
   );

   $this->load->view('element/header',$data);
   $this->load->view('v_login');
   $this->load->view('element/footer');
	}

	public function login(){
		$username = trim($this->input->post('username'));
		$password =trim($this->input->post('password'));

		if(empty($username) OR empty($password)){
			$pesan = '<div class="alert alert-danger" role="alert">
  					  <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
  					  <span class="sr-only">Error:</span>
  					  Username dan password tidak boleh kosong !
				      </div>';
		
			$this->session->set_flashdata('pesan',$pesan);

			redirect('Login');
		}

		$user = $this->m_user->validasi($username,md5($password));

		if($user->num_rows() > 0){
			$result = $user->row();

			$data_user = array(
					'id_user' => $result->id_user,
					'level' => $result->level,
					'nama' => $result->nama_lengkap,
					// 'status' => "login",
				);

			$this->session->set_userdata($data_user);

			if($result->level == 1){
				redirect('admin');
			}else{
				redirect('admin');
			}

		}else{
			$pesan = '<div class="alert alert-warning" role="alert">
  					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  					  <span class="sr-only">Error:</span>
  					  Username dan password tidak cocok !
				      </div>';

			$this->session->set_flashdata('pesan',$pesan);

			redirect('Login');
		}
	}
	public function logout(){
		$this->session->sess_destroy();

		redirect('login');
	}

 //  public function aksi_login(){
 //  		$username = trim($this->input->post('username'));
	// 	$password =trim($this->input->post('password'));
		
	// 	$where = array(
	// 		'username' => $username,
	// 		'password' => md5($password)
	// 		);
	// 	$cek = $this->m_login->cek_login("admin",$where)->num_rows();
	// 	if($cek > 0){

	// 		$data_session = array(
	// 			'nama' => $username,
	// 			'status' => "login"
	// 			);

	// 		$this->session->set_userdata($data_session);

	// 		redirect("admin");

	// 	}else{
 //      $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
 //      redirect('login'); //jika gagal maka akan ditampilkan form upload
	// 	}
	// }

 //  public function logout(){
	// 	$this->session->sess_destroy();
	// 	redirect(base_url('login'));
	// }
}
