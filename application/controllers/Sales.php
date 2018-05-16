<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
   //  $this->load->model('m_supplier');
   //$this->load->library('cart');
   // $this->load->helper(array('url','text','form')); //load helper url
    $this->is_login();
  }

  public function is_login(){
    $id_user = $this->session->userdata('id_user');

    if(empty($id_user)){
      redirect('Login');
    }
  }

  public function index(){
  	$this->tampil();
  }

  public function tampil(){
  	$data['pesan'] = $this->session->flashdata('pesan');

		$data=array(
       'active_sales'=>'active',
       'ambil_info'=>$this->modelapp->TampilData('obat'),

   );

   		$this->load->view('admin/element/header');
        $this->load->view('admin/element/sidebar',$data);
		$this->load->view('sales/v_keluar',$data);

  }

  public function cariobat(){
		$keyword = $this->input->get('term');

		$data = $this->modelapp->cariobat($keyword);

	    foreach($data->result() as $result)
	    {
	        $arr[] = array(
	    		'label'  =>$result->nama_obat.' Rp.'.number_format($result->harga,0,',','.').' || '.$result->jumlah.' pcs',
	    		'value'   =>$result->id_obat
	    	);
	    }

	    echo json_encode($arr);
	}

	

	public function tambah(){
		$id_obat = $this->input->post('id_obat');

		$obat = $this->modelapp->ambil_data_obat($id_obat);
		$pesan='';
		if($obat->num_rows() > 0){  // kode barang ditemukan
			$hasil = $obat->row();
			
			if($hasil->jumlah > 0){  // jika stok masih ada

				// periksa kode barang yg diinputkan melalui 
				// fungsi cek_cart() dan simpan hasilnya ke $cart_data
				$cart_data = $this->cek_cart($id_obat);

				if(!empty($cart_data)){  // jika kode_barang ditemukan

					// siapkan array utk update cart
					// berdasarkan kode_barang yg ditemukan
					$data_update = array(
						'rowid' => $cart_data['id_obat'],
						'qty'   => $cart_data['qty'] +1
					);
						
					$this->cart->update($data_update);
				}else{
					// jika tidak ditemukan, maka dianggap data baru
					// siapkan array utk insert data baru
					$data_insert = array(
						'id'      => $hasil->id_obat,
						'qty'     => 1,
						'price'   => $hasil->harga,
						'name'    => $hasil->nama_obat
					);

					$this->cart->insert($data_insert);
				}
				
			}else{
				$pesan = '<div class="alert alert-danger">Stok Barang Kosong !</div>';
			}
		}else{
			$pesan = '<div class="alert alert-danger">Barang tidak ditemukan, cek lagi kode/nama barang !</div>';
		}
		$this->session->set_flashdata('pesan', $pesan);
		redirect('sales');
	}

	public function cek_cart($id_obat){
		$cart = $this->cart->contents();
		foreach ($cart as $obt) {
			if($obt['id'] == $id_obat){
				$result = array(
					'id_obat' => $obt['rowid'],
					'qty' => $obt['qty']
				);
			}else{
				continue;
			}
		}

		return $result;
	}


	//CEK 
	public function hapus($rowid){
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
		);
		
		$this->cart->update($data);

		redirect('sales');
	}

	public function update(){
		// ambil data dari form (rowid dan qty)
		$id_obat = $this->input->post('id_obat');
		$rowid = $this->input->post('rowid');
		$qty = $this->input->post('qty');

		$obat = $this->modelapp->ambil_data_obat($id_obat)->row();
		$jumlah = $obat->jumlah;

		if($jumlah > $qty){
			// persiapkan array utk diupdate ke cart
			$data = array(
				'rowid' => $rowid,
				'qty'   => $qty
			);
			
			// update cart dengan data array di atas
			$this->cart->update($data);

			// kembali ke controller masuk
			}else{
				$pesan = '<div class="alert alert-danger">Stok Barang Tidak Mencukupi !</div>';
			}
		$this->session->set_flashdata('pesan', $pesan);
		redirect('sales');
	}

	public function batal(){
		$this->cart->destroy();
		redirect('sales');
	}

	public function simpan(){
		$cart = $this->cart->contents();

		if(!empty($cart)){
			$id_user = $this->session->userdata('id_user');
			$tgl_keluar = date('Y-m-d',strtotime($this->input->post('tgl_sales'))	);
	
			$total = $this->cart->total();

			$data_keluar = array(
				'id_user'=>$id_user,
				'sale_time' => $tgl_keluar,
				'total'=>$total
			);
 
			$sale_id = $this->modelapp->simpan_keluar($data_keluar);
			if($sale_id > 0) {
				// $data_detil_masuk = array();
				foreach ($cart as $row) {
					$data_detil_keluar[] = array(
						'sale_id'=>$sale_id,
						'id_obat' => $row['id'],
						'sales_qty' => $row['qty'],
						'harga'=> $row['price']
					);
				}

				if($this->modelapp->simpan_detil_keluar($data_detil_keluar) > 0){
					$this->cart->destroy();
					$pesan = '<div class="alert alert-info">TRANSAKSI BERHASIL DISIMPAN</div>';
				}else{
					$pesan = '<div class="alert alert-danger">GAGAL MENYIMPAN TRANSAKSI</div>';
				}
			}else{
				$pesan = '<div class="alert alert-danger">GAGAL MENYIMPAN TRANSAKSI</div>';
			}
		}else{
			$pesan = '<div class="alert alert-danger">TIDAK ADA BARANG DI TRANSAKSI</div>';
		}

		$this->session->set_flashdata('pesan', $pesan);
		redirect('sales');
	}

	public function detil_keluar(){
		$data['sales'] = $this->modelapp->ambil_data()->result();
		$this->load->view('sales/detil_keluar', $data);
	}

	public function detil_obat($sale_id){
		$data['obat'] = $this->modelapp->ambil_obat($sale_id)->result();
		$this->load->view('sales/detil_obat', $data);
	}

	public function hapus_detil_obat($sale_id){
		if($this->modelapp->hapus($sale_id) > 0){
			$pesan = '<div class="alert alert-info">DATA BERHASIL DIHAPUS</div>';
		}else{
			$pesan = '<div class="alert alert-danger">DATA GAGAL DIHAPUS</div>';
		}
		$this->session->set_flashdata('pesan', $pesan);
		redirect('sales/detil_keluar');
	}		

}

/* End of file Sales.php */
/* Location: ./application/controllers/Sales.php */