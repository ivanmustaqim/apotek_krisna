<?php 
	 $this->load->view('admin/element/header');
      $this->load->view('admin/element/sidebar');
 ?>
 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
 <div class="container margin-atas">
 <?php 
		// ambil data dalam flashdata dan simpan kevariabel
		$pesan = $this->session->flashdata('pesan');

		// perikasa isi flashdata, jika berisi maka cetak $pesan 
		// fungsi isset() memerikasa sebuah variabel apakah ada isinya atau tidak
		if(isset($pesan)){
			echo $pesan;
		}
		?>

	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	 	<div class="panel panel-primary margin-samping" style="margin-top:10px;">
	 		<div class="panel-heading">
	 			<h3 class="panel-title">Pilih Laporan</h3>
	 		</div>
	 		<div class="panel-body">
	 			<?php 
	 							
	 				echo anchor('laporan/bulan_keluar', 'Bulanan',array('class'=>'btn btn-success btn-sm'));

	 			 ?>
	 		</div>
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
