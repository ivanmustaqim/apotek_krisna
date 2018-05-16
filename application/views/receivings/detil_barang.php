<?php 
	$this->load->view('header');
	$this->load->view('menu_admin');
 ?>
 <div class="container margin-atas">
 <?php 
		// ambil data dalam flashdata dan simpan kevariabel
		$pesan = $this->session->flashdata('pesan');

		// perikasa isi flashdata, jika berisi maka cetak $pesan 
		// fungsi isset() memerikasa sebuah variabel apakah ada isinya atau tidak
		if(isset($pesan)){
			echo $pesan;
		}
		echo anchor('receivings/detil_masuk', 'Kembali', array('class' =>'margin-samping btn btn-info btn-sm'));
?>
 	<div class="panel panel-primary margin-samping" style="margin-top:10px;">
 		<div class="panel-heading">
 			<h3 class="panel-title">DETIL BARANG MASUK</h3>
 		</div>
 		<div class="panel-body">
 			<table class="table table-hover panel-costome">
 				<thead>
 					<tr style="background-color:#9C9595; color:white;">
 						<th>No</th>
 						<th>Nama Barang</th>
 						<th>Jumlah Masuk</th>
 						<th>Harga</th>
 					</tr>
 				</thead>
 				<tbody>
 				<tr>
 					<?php 
 					$no = 1;
 					if(!empty($barang)){
						foreach ($barang as $row) { ?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo strtoupper($row->nama_barang); ?></td>
							<td><?php echo $row->receiving_qty; ?></td>
							<td><?php echo 'Rp. '.number_format($row->harga,0,',','.'); ?></td>
						</tr>
						<?php 
						}
					}else{?>
						<tr>
							<td colspan="3" style="background-color:red; color:white; text-align:center;">DATA BELUM ADA</td>
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