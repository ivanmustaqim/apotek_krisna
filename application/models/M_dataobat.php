<?php

class M_dataobat extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    /*start model paginaton*/
    public function view($num, $offset)  {
     $this->db->order_by('id', 'ASC');
     $query = $this->db->get("dataobat",$num, $offset);
     return $query->result();
 }
 /*end pagination*/
 


 function list_data($pencarian,$offset,$total){
     if ($pencarian){
      $this->db->like('nama_obat',$pencarian);
  }     
  $result['total_rows'] = $this->db->count_all_results('dataobat');
  
  if ($pencarian){
      $this->db->like('nama_obat',$pencarian);
  }
  $query = $this->db->get('dataobat',$total,$offset);

  $result['data'] = $query->result(); 
  return $result;
}





function insertData($data_obat)
{
    $this->db->insert('dataobat',$data_obat );
    return $this->db->affected_rows();
}


// function validasi($username,$password){
//     $this->db->where('username',$username);
//     $this->db->where('password',$password);
//     return $this->db->get('user');

}

function TampilData($table)
{


   $this->db->order_by('nama_obat', 'ASC');
   return $this->db->get($table)->result();
}

function updateData($table,$data,$field_key)
{
    $this->db->update($table,$data,$field_key);
}

function deleteData($table,$data)
{
    $this->db->delete($table,$data);
}


function getKodeInfo(){
    $q = $this->db->query("select MAX(RIGHT(id,3)) as kd_max from dataobat");
    $kd = "";
    if($q->num_rows()>0){
        foreach($q->result() as $k){
            $tmp = ((int)$k->kd_max)+1;
            $kd = sprintf("%03s", $tmp);
        }
    }else{
        $kd = "001";
    }
    return "U-".$kd;
}

function getEditData(){

    $id = $this->uri->segment(3);

    $this->db->select('*');
    $this->db->from('dataobat');
    $this->db->where('id', $id);
    $query = $this->db->get();
    return $query->result();

}
}
