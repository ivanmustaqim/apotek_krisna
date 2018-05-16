<?php 
	 $this->load->view('admin/element/header');
      $this->load->view('admin/element/sidebar');
 ?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
 <div class="margin-atas">
 <?php 
		// ambil data dalam flashdata dan simpan kevariabel
		$pesan = $this->session->flashdata('pesan');

		// perikasa isi flashdata, jika berisi maka cetak $pesan 
		// fungsi isset() memerikasa sebuah variabel apakah ada isinya atau tidak
		if(isset($pesan)){
			echo $pesan;
		}
		?>
 	<div class="panel panel-primary margin-samping" style="margin-top:10px;">
 		<div class="panel-heading">
 			<h3 class="panel-title">LAPORAN OBAT KELUAR / BULAN <?php if(!empty($bulan)){ echo strtoupper( date('F',strtotime($bulan)));} ?></h3>
 		</div>
 		<div class="panel-body">
 			<table class="table table-hover panel-costome">
 				<thead>
 					<tr style="background-color:#9C9595; color:white;">
 						<th>No</th>
 						<th>ID User</th>
 						<th>Nama Obat</th>
 						<th>Jumlah Keluar</th>
 						<th>Harga Satuan</th>
 						<th>Tgl Keluar</th>
 					</tr>
 				</thead>
 				<tbody>
				<?php 
					if(empty($cari)){
						echo form_open('laporan/cari_bulan_keluar');?>
						<div class="navbar-form pull-right">
							<?php 
							echo form_label('Pilih Bulan');
							echo form_dropdown('cari', $laporan_options, '','class="form-control"');
							$simpan = array(
								'class'=>'btn btn-primary',
								'value'=>'Cari'
							);
							
							echo nbs(1);
							echo form_submit($simpan);
							echo nbs(1);
							echo form_close();?>
						</div>
 				<?php 
 					}
 				$no = 1;
 				if(!empty($cari)){
						foreach ($cari as $row) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo strtoupper($row->id_user); ?></td>
							<td><?php echo strtoupper($row->nama_obat); ?></td>
							<td><?php echo $row->sales_qty; ?></td>
							<td><?php echo 'Rp. '.number_format($row->harga,0,',','.'); ?></td>
							<td><?php echo date('d M Y', strtotime($row->sale_time)); ?></td>
						</tr>
						<?php 
						}
					}else{?>
						<tr>
							<td colspan="9" style="background-color:red; color:white; text-align:center;">DATA BELUM ADA</td>
						</tr>
				
				<?php 	}	?>	
 					</tr>
 				</tbody>
 			</table>
 		</div>
 		</div>
 		</div>
 	</div>
 	
 </div>
 <script type="text/javascript">
 	function autorefresh(page) {
    setTimeout("autorefresh(page)", 1);
}
 </script>
 <script type="text/javascript">
	$(document).ready(function(){
		// set waktu tunggu (timeout) pada sebuah halaman sebanyak 2 detik
		window.setTimeout(function(){
			// jika waktu tunggu tercapai
			// redupan pesan dan geser tabel ke atas
			$(".alert").fadeTo(1000, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 2000);
	});
	$(document).on("click", "#hapus",function(e){
		var link = $(this).attr("href");
		e.preventDefault();
		bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result){
			if(result){
				document.location.href = link;
			}
		});
	});
</script>
