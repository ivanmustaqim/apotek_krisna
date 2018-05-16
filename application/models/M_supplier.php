<?php

class M_supplier extends CI_Model{

    function __construct(){
        parent::__construct();
    }

        /*start model paginaton*/
     public function view($num, $offset)  {
       $this->db->order_by('nama_supplier', 'ASC');
       $query = $this->db->get("data_supplier",$num, $offset);
       return $query->result();
       }
    /*end pagination*/


    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }


   function TampilData($table)
    {
      

     $this->db->order_by('nama_supplier', 'ASC');
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
            $q = $this->db->query("select MAX(RIGHT(id_supplier,3)) as kd_max from data_supplier");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "S-".$kd;
    }

    function getEditData(){

        $id = $this->uri->segment(3);

        $this->db->select('*');
        $this->db->from('data_supplier');
        $this->db->where('id_supplier', $id);
        $query = $this->db->get();
        return $query->result();

    }


}
