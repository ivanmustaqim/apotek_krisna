<?php

class M_receivings extends CI_Model{

    function __construct(){
        parent::__construct();
    }

        /*start model paginaton*/
     public function view($num, $offset)  {
       $this->db->order_by('tgl_kadaluarsa', 'ASC');
       $query = $this->db->get("obat",$num, $offset);
       return $query->result();
       }
    /*end pagination*/

    // public function get()
    // {
    //     return $this->db->get('data_supplier');
    // }

    function insertData($table,$data)
    {
        $this->db->insert($table,$data);
    }

    function ambil_data_obat($id_obat){
        $this->db->where('id_obat', $id_obat);
        return $this->db->get('obat');
    }

    function cariobat($keyword){
        // $this->db->where('deleted', 0);
        $this->db->like('id_obat',$keyword,'after');
        $this->db->or_like('nama_obat',$keyword,'after');

        $suggestions = $this->db->get('obat');

        return $suggestions;
    }

    function ambil_data(){
        $this->db->where('receivings.deleted', 0);
        $this->db->join('user', 'user.id_user = receivings.id_user');
        return $this->db->get('receivings');
    }

        function ambil_obat($sale_id){
        $this->db->where('deleted', 0);
        $this->db->where('sale_id', $sale_id);
        $this->db->join('obat', 'obat.id_obat = receivings_items.id_obat ');
        return $this->db->get('receivings_items');
    }

        function hapus($sale_id){
        $this->db->where('sale_id', $sale_id);
        $this->db->update('receivings', array('deleted'=>1));
        return $this->db->affected_rows();
    }


    function hitung_kadaluarsa($tgl){
        $this->db->where('tgl_kadaluarsa <=', $tgl);
        return $this->db->get('obat');
    }
   function TampilData($table)
    {
     $this->db->order_by('nama_obat', 'ASC');
     return $this->db->get($table)->result();
    }

    function get_jenisobat(){
        $query = $this->db->get('jenis_obat');
        return $query->result();
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
            $q = $this->db->query("select MAX(RIGHT(id_obat,3)) as kd_max from obat");
            $kd = "";
            if($q->num_rows()>0){
                foreach($q->result() as $k){
                    $tmp = ((int)$k->kd_max)+1;
                    $kd = sprintf("%03s", $tmp);
                }
            }else{
                $kd = "001";
            }
            return "I-".$kd;
    }

    function getEditData(){

        $id = $this->uri->segment(3);

        $this->db->select('*');
        $this->db->from('obat');
        $this->db->where('id_obat', $id);
        $query = $this->db->get();
        return $query->result();

    }


}
