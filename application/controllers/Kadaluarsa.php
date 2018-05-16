<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kadaluarsa extends CI_Controller {

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
  //  parent::__construct();

  //   $this->load->model('modelapp');
  //  //$this->load->library('pagination');
  //  $this->load->helper(array('url','text','form')); //load helper url

  //  // if($this->session->userdata('status') != "login"){
  //  //  redirect("Admin");
  //  // }
  // }

  

  // public function index()
  // {
  //  $data=array(
 //       'active_tambahdata'=>'active',
 //       'ambil_info'=>$this->modelapp->TampilData('obat'),

 //   );

  
 //    $this->load->view('admin/element/header');
  //     $this->load->view('admin/element/sidebar',$data);
  //     $this->load->view('admin/v_tambahdata');
  // }


  public function index()
  {
    // $this->page();

    $data=array(
       'active_kadaluarsa'=>'active',
       // 'ambil_info'=>$this->modelapp->TampilData('obat'),

   );
    $tgl = date('Y-m-d', strtotime('+90 days ', strtotime('now')));
    $data['ambil_info']=$this->modelapp->TampilDataKadaluarsa($tgl)->result();
    $this->load->view('admin/element/header');
    $this->load->view('admin/element/sidebar',$data);
      $this->load->view('admin/v_kadaluarsa',$data);

      // $this->data['data_supplier']=$this->modelapp->get();
    // $this->load->view('modelapp', $this->data);
        $pencarian = $this->input->post('pencarian');
        $offset = $this->uri->segment(2, 0);
        $total = 5;
        $result = $this->modelapp->list_data($pencarian,$offset,$total);
        $config['uri_segment'] = 2;
        $config['base_url'] = site_url('tambahdata');
        $config['per_page'] = $total;
        $config['total_rows'] = $result['total_rows'];
  }

    

  // public function page($offset=0)
  // {

  //   $jml = $this->db->get('obat');

  //   $config['base_url'] = base_url().'tambahdata/page';

  //   $config['total_rows'] = $jml->num_rows();
  //   $config['per_page'] = 4; /*Jumlah data yang dipanggil perhalaman*/
  //   $config['uri_segment'] = 3; /*data selanjutnya di parse diurisegmen 3*/

  //   /*Class bootstrap pagination yang digunakan*/
  //   $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
  //   $config['full_tag_close'] ="</ul>";
  //   $config['num_tag_open'] = '<li>';
  //   $config['num_tag_close'] = '</li>';
  //   $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
  //   $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
  //   $config['next_tag_open'] = "<li>";
  //   $config['next_tagl_close'] = "</li>";
  //   $config['prev_tag_open'] = "<li>";
  //   $config['prev_tagl_close'] = "</li>";
  //   $config['first_tag_open'] = "<li>";
  //   $config['first_tagl_close'] = "</li>";
  //   $config['last_tag_open'] = "<li>";
  //   $config['last_tagl_close'] = "</li>";

  //   $this->pagination->initialize($config);

  //   $data['halaman'] = $this->pagination->create_links();
  //   $data['offset'] = $offset;
  //   $data['data'] = $this->modelapp->view($config['per_page'], $offset);
  //   $data['active_tambahdata'] = 'active';

  //   $this->load->view('admin/element/header');
  //   $this->load->view('admin/element/sidebar',$data);
  //   $this->load->view('admin/v_tambahdata');
  // }
  // /*end fungsi pagination*/



  public function adddata()
  {
    $data=array(
     'active_kadaluarsa'=>'active',
     'id_obat'=>$this->modelapp->getKodeInfo(),

     );

    $dropdown=array(
      'jenisobat'=>$this->modelapp->get_jenisobat(),
      );
    
    $this->load->view('admin/element/header');
    $this->load->view('admin/element/sidebar',$data);
    $this->load->view('admin/v_formtambahdata',$dropdown);
  }

  public function prosestambah(){
    $nama = $this->session->userdata('nama');
    $data = array (

      'id_obat' => $this->input->post('id_obat'),
      'id_jenis_obat' => $this->input->post('id_jenis_obat'),
      'nama_obat' => $this->input->post('nama_obat'),
      'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
      'jumlah' => $this->input->post('jumlah'),
      'harga' => $this->input->post('harga'),
      'tgl_sales' => $this->input->post('tgl_sales'),
      'nama_supplier' => $this->input->post('nama_supplier'),
      'nama' => $nama,
      );

    $this->modelapp->insertData('obat',$data); //akses model untuk menyimpan ke database

   if($data >= 1) {
     $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Ditambahkan </div></div>");
              redirect('kadaluarsa'); //jika berhasil maka akan ditampilkan view vupload
           }else{

              //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
             $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Tambah coba lagi !</div></div>");
              redirect('kadaluarsa'); //jika gagal maka akan ditampilkan form upload
           }


         }


         public function editdata(){


          $data = array(
            'active_kadaluarsa' => 'active',
            'edit_info'=>$this->modelapp->getEditData(),

            );
          $dropdown=array(
      'jenisobat'=>$this->modelapp->get_jenisobat(),
      );
          $this->load->view('admin/element/header');
          $this->load->view('admin/element/sidebar',$data);
          $this->load->view('admin/v_editdata',$dropdown);

        }

        public function prosesedit(){

          $id['id_obat'] = $this->input->post('id_obat');
          $nama = $this->session->userdata('nama');
          $data = array(

            'id_jenis_obat' => $this->input->post('id_jenis_obat'),
            'nama_obat' => $this->input->post('nama_obat'),
            'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $this->input->post('harga'),
            'tgl_sales' => $this->input->post('tgl_sales'),
            'nama_supplier' => $this->input->post('nama_supplier'),
            'nama' => $nama,

            );

        $this->modelapp->updateData('obat',$data,$id); //akses model untuk menyimpan ke database

        if($data >= 1) {
          $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\">Data Berhasil Diupdate </div></div>");
                redirect('kadaluarsa'); //jika berhasil maka akan ditampilkan view vupload
              }else{

                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\">Gagal Update coba lagi !</div></div>");
                redirect('kadaluarsa'); //jika gagal maka akan ditampilkan form upload
              }
            }


            public function hapusdata(){

              $id['id_obat'] = $this->uri->segment(3);
              $this->modelapp->deleteData('obat',$id);

   redirect('kadaluarsa'); //jika berhasil maka akan ditampilkan view vupload


  }

  public function coba(){
    $tgl = date('Y-m-d',strtotime('now'));
    $obat = $this->Modelapp->hitung_kadaluarsa($tgl)->num_rows();
    echo $obat;
  }

}
