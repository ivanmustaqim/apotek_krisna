<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_jenisobat extends CI_Controller {

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


 //  function __construct(){
	// 	parent::__construct();

	// 	 $this->load->model('m_supplier');
	//  //$this->load->library('pagination');
	//  $this->load->helper(array('url','text','form')); //load helper url

	// 	// if($this->session->userdata('status') != "login"){
	// 	// 	redirect("Admin");
	// 	// }
	// }

	

	// public function index()
	// {
	// 	$data=array(
 //       'active_tambahdata'=>'active',
 //       'ambil_info'=>$this->m_supplier->TampilData('obat'),

 //   );

   
 //    $this->load->view('admin/element/header');
	//     $this->load->view('admin/element/sidebar',$data);
	//     $this->load->view('admin/v_tambahdata');
	// }


 public function index()
  {
      
     $data=array(
          'active_laporan_jenisobat'=>'active',
          'ambil_info'=>$this->m_jenisobat->TampilData('jenis_obat'),

          );
        $this->load->helper('url');
        $this->load->library('pagination');//1
        $this->load->database();//memanggil pengaturan database dan mengaktifkannya
        $this->load->model('m_jenisobat');//memanggil model m_user

        $pencarian = $this->input->post('pencarian');
        $offset = $this->uri->segment(2, 0);
        $total =5;
        $result = $this->m_jenisobat->list_data($pencarian,$offset,$total);
        $config['uri_segment'] = 2;
        $config['base_url'] = site_url('jenisobat');
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
        $data['jenis_obat'] = $result['data'];
       
        // $this->load->view('admin/element/header');
        // $this->load->view('admin/element/sidebar',$data);
        $this->load->view('admin/laporan_jenisobat',$data);
        // $this->load->view('admin/v_tambahuser');


    }

  // public function page($offset=0)
  // {

  //   $jml = $this->db->get('jenis_obat');

  //  $config['base_url'] = base_url().'jenisobat/page';

  //  $config['total_rows'] = $jml->num_rows();
  //  $config['per_page'] = 5; /*Jumlah data yang dipanggil perhalaman*/
  //  $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

  //  /*Class bootstrap pagination yang digunakan*/
  //  $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
  //  $config['full_tag_close'] ="</ul>";
  //  $config['num_tag_open'] = '<li>';
  //  $config['num_tag_close'] = '</li>';
  //  $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
  //  $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
  //  $config['next_tag_open'] = "<li>";
  //  $config['next_tagl_close'] = "</li>";
  //  $config['prev_tag_open'] = "<li>";
  //  $config['prev_tagl_close'] = "</li>";
  //  $config['first_tag_open'] = "<li>";
  //  $config['first_tagl_close'] = "</li>";
  //  $config['last_tag_open'] = "<li>";
  //  $config['last_tagl_close'] = "</li>";

  //  $this->pagination->initialize($config);

  //  $data['halaman'] = $this->pagination->create_links();
  //  $data['offset'] = $offset;
  //  $data['data'] = $this->m_jenisobat->view($config['per_page'], $offset);
  //  $data['active_jenisobat'] = 'active';

  //   $this->load->view('admin/element/header');
  //   $this->load->view('admin/element/sidebar',$data);
  //   $this->load->view('admin/v_tambahjenisobat');
  // }
  /*end fungsi pagination*/



	public function adddata()
{
			 $data=array(
					'active_jenisobat'=>'active',
					'id_jenis_obat'=>$this->m_jenisobat->getKodeInfo(),

			);
   
    $this->load->view('admin/element/header');
	    $this->load->view('admin/element/sidebar',$data);
	    $this->load->view('admin/v_formtambahjenisobat');
}

public function prosestambah(){

		$data = array (

				'id_jenis_obat' => $this->input->post('id_jenis_obat'),
				'jenis_obat' => $this->input->post('jenis_obat'),
		);

		$this->m_jenisobat->insertData('jenis_obat',$data); //akses model untuk menyimpan ke database

			if($data >= 1) {
							$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
							redirect('jenisobat'); //jika berhasil maka akan ditampilkan view vupload
					}else{

							//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
							$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
							redirect('jenisobat'); //jika gagal maka akan ditampilkan form upload
					}


		}


public function editdata(){


            $data = array(
                'active_jenisobat' => 'active',
                'edit_info'=>$this->m_jenisobat->getEditData(),

                );
           $this->load->view('admin/element/header');
	    $this->load->view('admin/element/sidebar',$data);
	    $this->load->view('admin/v_editjenisobat');

    }

		public function prosesedit(){

        $id['id_jenis_obat'] = $this->input->post('id_jenis_obat');
        $data = array(

          'jenis_obat'=>$this->input->post('jenis_obat'),

        );

        $this->m_jenisobat->updateData('jenis_obat',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('jenisobat'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('jenisobat'); //jika gagal maka akan ditampilkan form upload
            }
    }


			public function hapusdata(){

	 $id['id_jenis_obat'] = $this->uri->segment(2);
   $this->m_jenisobat->deleteData('jenis_obat',$id);

	 redirect('jenisobat'); //jika berhasil maka akan ditampilkan view vupload


}



}
