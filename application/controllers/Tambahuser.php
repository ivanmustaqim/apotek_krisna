<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambahuser extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
   //  $this->load->model('m_supplier');
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

	// function __construct(){
	// 	parent::__construct();

	// 	$this->load->model('m_user');
	//  //$this->load->library('pagination');
	//  $this->load->helper(array('url','text','form')); //load helper url

	//  // if($this->session->userdata('status') != "login"){
	//  // 	redirect("login");
	//  // }
	// }


	public function index()
	{
     
     $data=array(
       'active_tambahuser'=>'active',
       'ambil_info'=>$this->m_user->TampilData('user'),

       );
     $this->load->helper('url');
 	    $this->load->library('pagination');//1
 	    $this->load->database();//memanggil pengaturan database dan mengaktifkannya
        $this->load->model('m_user');//memanggil model m_user

        $pencarian = $this->input->post('pencarian');
        $offset = $this->uri->segment(2, 0);
        $total = 5;
        $result = $this->m_user->list_data($pencarian,$offset,$total);
        $config['uri_segment'] = 2;
        $config['base_url'] = site_url('tambahuser');
        $config['per_page'] = $total;
        $config['total_rows'] = $result['total_rows'];

        /*Class bootstrap pagination yang digunakan*/
        $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        
        $this->pagination->initialize($config); 
        $data['pagination'] =  $this->pagination->create_links();
        $data['user'] = $result['data'];
        
        $alert = $this->session->flashdata('alert');
        if(!empty($alert)){
         $data['alert'] = $alert;
     }
     

     $this->load->view('admin/element/header');
     $this->load->view('admin/element/sidebar',$data);
     $this->load->view('admin/v_tambahuser',$data);
        // $this->load->view('admin/v_tambahuser');


 }

    // public function page($offset=0)
    // {

    // 	$jml = $this->db->get('user');

    // 	$config['base_url'] = base_url().'tambahuser/page';

    // 	$config['total_rows'] = $jml->num_rows();
    // 	$config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/
    // 	$config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

    // 	/*Class bootstrap pagination yang digunakan*/
    // 	$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
    // 	$config['full_tag_close'] ="</ul>";
    // 	$config['num_tag_open'] = '<li>';
    // 	$config['num_tag_close'] = '</li>';
    // 	$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    // 	$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    // 	$config['next_tag_open'] = "<li>";
    // 	$config['next_tagl_close'] = "</li>";
    // 	$config['prev_tag_open'] = "<li>";
    // 	$config['prev_tagl_close'] = "</li>";
    // 	$config['first_tag_open'] = "<li>";
    // 	$config['first_tagl_close'] = "</li>";
    // 	$config['last_tag_open'] = "<li>";
    // 	$config['last_tagl_close'] = "</li>";

    // 	$this->pagination->initialize($config);

    // 	$data['halaman'] = $this->pagination->create_links();
    // 	$data['offset'] = $offset;
    // 	$data['data'] = $this->m_user->view($config['per_page'], $offset);
    // 	$data['active_tambahuser'] = 'active';

    // 	$this->load->view('admin/element/header');
    // 	$this->load->view('admin/element/sidebar',$data);
    // 	$this->load->view('admin/v_tambahuser');
    // }
 /*end fungsi pagination*/

 public function adddata()
 {
   $data=array(
      'active_tambahuser'=>'active',
      'id_user'=>$this->m_user->getKodeInfo(),

      );
   $data['level'] = array(
      ''=>'--BELUM DIPILIH--',
      '1'=>'Administrator',
      '2'=>'Pegawai'
      );
   $this->load->view('admin/element/header');
   $this->load->view('admin/element/sidebar',$data);
   $this->load->view('admin/v_formtambahuser');
}

public function prosestambah(){

   $data_user = array (

      'id_user' => $this->input->post('id_user'),
      'username' => $this->input->post('username'),
      'nama_lengkap' => $this->input->post('nama_lengkap'),
      'password' => md5($this->input->post('password')),
      'level' => $this->input->post('level'),
      );
 //akses model untuk menyimpan ke database

   if ($this->m_user->insertData($data_user) > 0 ) {
     $alert  = array(
        'title' => 'INFO !<br>',
        'message' => 'Data Berhasil Disimpan',
        'type' => 'success',
        'icon' => 'glyphicon glyphicon-ok'
        );
 }else{
     $alert  = array(
        'title' => 'INFO !<br>',
        'message' => 'Data Gagal Disimpan',
        'type' => 'danger',
        'icon' => 'glyphicon glyphicon-remove'
        );
 }

 $this->session->set_flashdata('alert',$alert);

 redirect('tambahuser');

}
public function editdata(){


  $data = array(
     'active_tambahuser' => 'active',
     'edit_info'=>$this->m_user->getEditData(),

     );
  $this->load->view('admin/element/header');
  $this->load->view('admin/element/sidebar',$data);
  $this->load->view('admin/v_edituser');

}

public function prosesedit(){

  $id['username'] = $this->input->post('username');
  $password_lama = $this->input->post('password_lama');
  $password = $this->input->post('password');

  if(!empty($password)){
     $psw = md5($password);
 }else{
     $psw = $password_lama;
 }
 $data = array(

     'username'=>$this->input->post('username'),
     'nama_lengkap'=>$this->input->post('nama_lengkap'),
     'password'=>$psw,
     'level'=>$this->input->post('level'),

     );

        $this->m_user->updateData('user',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
        	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('tambahuser'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('tambahuser'); //jika gagal maka akan ditampilkan form upload
            }
        }


        public function hapusdata(){

        	$id['username'] = $this->uri->segment(3);
        	$this->m_user->deleteData('user',$id);

	 redirect('tambahuser'); //jika berhasil maka akan ditampilkan view vupload


	}



}
