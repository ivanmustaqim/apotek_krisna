<?php

class M_jenisobat extends CI_Model{

    function __construct(){
        parent::__construct();
    }

        /*start model paginaton*/
     public function view($num, $offset)  {
       $this->db->order_by('jenis_obat', 'ASC');
       $query = $this->db->get("jenis_obat",$num, $offset);
       return $query->result();
       }
    /*end pagination*/



 function list_data($pencarian,$offset,$total){
     if ($pencarian){
      $this->db->like('id_jenis_obat',$pencarian);
  }     
  $result['total_rows'] = $this->db->count_all_results('jenis_obat');
  
  if ($pencarian){
      $this->db->like('id_jenis_obat',$pencarian);
  }
  $query = $this->db->get('jenis_obat',$total,$offset);

  $result['data'] = $query->result(); 
  return $result;
}


    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }


   function TampilData($table)
    {
      

     $this->db->order_by('jenis_obat', 'ASC');
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
            $q = $this->db->query("select MAX(RIGHT(id_jenis_obat,3)) as kd_max from jenis_obat");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "J-".$kd;
    }

    function getEditData(){

        $id = $this->uri->segment(3);

        $this->db->select('*');
        $this->db->from('jenis_obat');
        $this->db->where('id_jenis_obat', $id);
        $query = $this->db->get();
        return $query->result();

    }


}
