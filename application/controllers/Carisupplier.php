<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carisupplier extends CI_Controller {

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
    $this->page();


  }

  public function page($offset=0)
  {

    $jml = $this->db->get('data_supplier');

   $config['base_url'] = base_url().'supplier/page';

   $config['total_rows'] = $jml->num_rows();
   $config['per_page'] = 7; /*Jumlah data yang dipanggil perhalaman*/
   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

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

   $data['halaman'] = $this->pagination->create_links();
   $data['offset'] = $offset;
   $data['data'] = $this->m_supplier->view($config['per_page'], $offset);
   $data['active_supplier'] = 'active';

   $keyword            =   $this->input->post('keyword');
   $data['results']    =   $this->m_search->search($keyword);

    $this->load->view('admin/element/header');
    $this->load->view('admin/element/sidebar',$data);
    $this->load->view('admin/v_tambahsupplier');
  }
  /*end fungsi pagination*/



	public function adddata()
{
			 $data=array(
					'active_supplier'=>'active',
					'id_supplier'=>$this->m_supplier->getKodeInfo(),

			);
   
    $this->load->view('admin/element/header');
	    $this->load->view('admin/element/sidebar',$data);
	    $this->load->view('admin/v_formtambahsupplier');
}

public function prosestambah(){

		$data = array (

				'id_supplier' => $this->input->post('id_supplier'),
				'nama_supplier' => $this->input->post('nama_supplier'),
				'alamat' => $this->input->post('alamat'),
				'no_telp' => $this->input->post('no_telp'),
		);

		$this->m_supplier->insertData('data_supplier',$data); //akses model untuk menyimpan ke database

			if($data >= 1) {
							$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
							redirect('supplier'); //jika berhasil maka akan ditampilkan view vupload
					}else{

							//pesan yang muncul jika terdapat error dimasukkan pada session flashdata
							$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
							redirect('supplier'); //jika gagal maka akan ditampilkan form upload
					}


		}


public function editdata(){


            $data = array(
                'active_supplier' => 'active',
                'edit_info'=>$this->m_supplier->getEditData(),

                );
           $this->load->view('admin/element/header');
	    $this->load->view('admin/element/sidebar',$data);
	    $this->load->view('admin/v_editsupplier');

    }

		public function prosesedit(){

        $id['id_supplier'] = $this->input->post('id_supplier');
        $data = array(

          'nama_supplier'=>$this->input->post('nama_supplier'),
          'alamat'=>$this->input->post('alamat'),
          'no_telp'=>$this->input->post('no_telp'),

        );

        $this->m_supplier->updateData('data_supplier',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('supplier'); //jika berhasil maka akan ditampilkan view vupload
            }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('supplier'); //jika gagal maka akan ditampilkan form upload
            }
    }


			public function hapusdata(){

	 $id['id_supplier'] = $this->uri->segment(3);
	 $this->m_supplier->deleteData('data_supplier',$id);

	 redirect('supplier'); //jika berhasil maka akan ditampilkan view vupload


}



}
