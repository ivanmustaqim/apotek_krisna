//ini Controller

//alurnye
//dari header, name di input, di POST(pakai form action dan method) ke findproduct controller, dr findproduct ke model
//view nye punye tampilan khusus v_Search
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Findproduct extends CI_Controller {
  function __construct(){
    parent::__construct();

    $this->load->model('m_tampilfooter');
    $this->load->model('m_search');
    //$this->load->library('pagination');
    $this->load->helper(array('url','text','form')); //load helper url
}

public function index()
{

  $footer_content=array(
 'data_footer'=>$this->m_tampilfooter->footer(),
 'data_contact'=>$this->m_tampilfooter->contact(),
  );

  $keyword    =   $this->input->post('keyword');
  $data['results']    =   $this->m_search->search($keyword);

  $this->load->view('element/header');
  $this->load->view('v_search',$data);
  $this->load->view('element/footer',$footer_content);

}
}
