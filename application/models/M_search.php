<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_search Extends CI_Model
{
    function __construct()
    {
    parent::__construct();
    }

    function search($keyword)
    {
        $this->db->like('nama_supplier',$keyword);
        $this->db->order_by('nama_supplier', 'DESC');
        $query  =   $this->db->get('data_supplier');
        return $query->result();
    }
}
