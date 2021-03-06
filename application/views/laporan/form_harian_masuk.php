<?php 
	$this->load->view('header');
	$this->load->view('menu_admin');
 ?>
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
 			<h3 class="panel-title">LAPORAN BARANG MASUK / HARIAN TGL <?php if(!empty($tgl)){ echo date('d/m/Y',strtotime($tgl));} ?></h3>
 		</div>
 		<div class="panel-body">
 			<table class="table table-hover panel-costome">
 				<thead>
 					<tr style="background-color:#9C9595; color:white;">
 						<th>No</th>
 						<th>ID Pegawai</th>
 						<th>Nama Toko</th>
 						<th>Nama Barang</th>
 						<th>Jumlah Masuk</th>
 						<th>Harga Satuan</th>
 						<th>Tgl Masuk</th>
 					</tr>
 				</thead>
 				<tbody>
				<?php 
					if(empty($cari)){
						echo form_open('laporan/cari_hari_masuk');?>
						<div class="navbar-form pull-right">
							<?php 
							echo form_label('Pilih Tanggal');
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
							<td><?php echo strtoupper($row->pegawai_id); ?></td>
							<td><?php echo strtoupper($row->shop); ?></td>
							<td><?php echo strtoupper($row->nama_barang); ?></td>
							<td><?php echo $row->receiving_qty; ?></td>
							<td><?php echo 'Rp. '.number_format($row->harga,0,',','.'); ?></td>
							<td><?php echo date('d M Y', strtotime($row->receiving_time)); ?></td>
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
<?php $this->load->view('footer'); ?>