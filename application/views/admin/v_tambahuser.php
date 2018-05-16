
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('tambahuser');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Akun</li>
		</ol>
	</div><!--/.row-->
	<!-- Main component for a primary marketing message or call to action -->
	<div class="row">

		<div class="panel-body" >
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a class="btn btn-md btn-success" href="<?php echo base_url('tambahuser/adddata');?>">Tambah Akun</a>

					</div>

					<!-- <style>
						th,td,table,thead,tbody,tr{
							border:1px solid #000;
						}
					</style> -->
					<div class="panel-body">
						<table class="table table-hover" >
							<thead>
								<th><center>NO</center></th>
								<th><center>USERNAME</center></th>
								<th><center>NAMA LENGKAP</center></th>
								<th><center>LEVEL</center></th>
								<th><center>AKSI</center></th>
							</thead>
							<tbody>

								<div class="col-md-3 col-lg-offset-9">
									<form role="search" action="<?php echo site_url('tambahuser');?>" method='post' >
										<div class="form-group" >
											<!-- <button type="submit" class="btn btn-default">Cari</button> -->
											<input type="text" class="form-control" placeholder="Search" name="pencarian">

											<!-- <input type="submit" value="Cari"> -->
										</div>
									</form>
								</div>
								<!-- <form action="<?php echo site_url('tambahuser');?>" method='post'>
									<input type="text" name="pencarian">
									<input type="submit" value="Cari">
								</form> -->
								<?php
								$no = 1;
								foreach($user as $value)
								{
									?>
									<tr>
										<td><center><?= $no;?></center></td>
										<td><center><?= $value->username;?></center></td>
										<td><center><?= $value->nama_lengkap;?></center></td>
										<td><center>
											<?php 
											if($value->level == 1){
												echo 'Admin';
											}else{
												echo 'Pegawai';
											}

											?>
										</center></td>
										<td>
											<center>
												<?php  
												echo anchor('tambahuser/editdata/'.$value->username, '<span class="glyphicon glyphicon-pencil"> EDIT</span>', array('class' =>'btn btn-success btn-sm','title'=>'Edit data ')); 
												?>
												<?php echo anchor('tambahuser/hapusdata/'.$value->username, '<span class="glyphicon glyphicon-trash"> HAPUS</span>', array('id'=>'hapus','class' =>'btn btn-danger btn-sm','title'=>'Hapus data '));
												?>
											</center> 
										</td>
									</tr>
									<?php
									$no++;
								}
								?>
							</tbody>
						</table>
						<div class="panel-footer" style="height:40px;">
							<?php echo $pagination ?>
						</div>
					</div>


				</div>
			</div>



		</div>

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

		<Br>
			<!--   <?php echo $halaman ?> -->
			<br>

