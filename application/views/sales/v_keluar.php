<?php 
 $this->load->view('admin/element/header');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('sales');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Obat Keluar</li>
    </ol>
  </div><!--/.row-->

<div class="row">
      <br>
       <div class="col-md-12">
      <div class="panel panel-default">


<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-body">
		<!-- 	<div class="pull-left judul">BARANG KELUAR</div> -->
			<div class="pull-left">
				<?php 
					echo "&nbsp";
					echo anchor('admin','KELUAR',array('class'=>'btn btn-danger btn-sm'));

					if(!empty($this->cart->contents())){
						echo nbs(2);
						echo anchor('Sales/batal','BATAL',array('class'=>'btn btn-warning btn-sm','id'=>'batal'));
					}
					echo "&nbsp";
					echo anchor('Sales/detil_keluar','LIHAT DATA',array('class'=>'btn btn-success btn-sm'));
				 ?>
			</div>

			<!-- menampilkan total cart -->
			<div class="pull-right total">
				<?php  
				$total = $this->cart->total();
				echo 'TOTAL : Rp.'.number_format($total,0,',','.');
				?>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<?php 
			if(isset($pesan)){
				echo $pesan;
			}
			 ?>
		</div>
	</div>
	<!-- data barang -->
	<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
		<div class="panel panel-primary">
			<div class="panel-body">
				<div>
					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						<?php echo form_open('sales/tambah'); ?>
						<div class="form-group">
							<?php  
							$tambah = array(
								'name'=>'id_obat',
								'class'=>'form-control',
								'placeholder'=>'ketikkan kode / nama obat',
								'id'=>'cariobat',
								'autocomplete'=>'off',
								'autofocus'=>'on'
							);
							echo form_input($tambah);
							echo form_close();
							?>
						</div>
					</div>
				</div>

				<!-- tabel barang -->
				<div>
					<table class="table table-condensed">
						<thead>
							<tr>
								<th>NO</th>
								<th>KODE OBAT</th>
								<th>NAMA OBAT</th>
								<th>JUMLAH</th>
								<th>HARGA</th>
								<th>SUBTOTAL</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$cart = $this->cart->contents();
							$no=1;
							if(!empty($cart)){
								foreach ($cart as $row) { ?>
									<tr>
										<td><?php echo $no++;?></td>
										<td><?php echo $row['id'];?></td>
										<td><?php echo $row['name'];?></td>
										<td width='8%'>
											<?php 
											echo form_open('Sales/update');
											echo form_hidden('id_obat', $row['id']);
											echo form_hidden('rowid', $row['rowid']);
											$qty = array(
												'name'=>'qty',
												'value'=>$row['qty'],
												'class'=>'form-control input-sm',
												'style'=>'text-align:right;font-size:14px;',
												'size'=>'5'
											);
											echo form_input($qty);
											echo form_close();
											?>
										</td>
										<td><?php echo 'Rp.'.number_format($row['price'],0,',','.');?></td>
										<td><?php echo 'Rp.'.number_format($row['qty']*$row['price'],0,',','.');?></td>
										<td>
											<?php echo anchor('Sales/hapus/'.$row['rowid'],'<span class="glyphicon glyphicon-remove"></span>', array('class'=>'btn btn-danger btn-xs'));
											?>
										</td>
									</tr>
								<?php 
								}
							}else{ ?>
								<tr style="background-color:#B4BAFF;color:#444;text-align:center;">
									<td colspan="7">BELUM ADA OBAT</td>
								</tr>
							<?php 
							} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>

	<!-- data transaksi -->
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<div class="panel panel-primary">
			<div class="panel-body">
				<?php echo form_open('Sales/simpan',array('id'=>'form-sales')); ?>
				<div class="form-group">
					<?php  
					echo form_label('TANGGAL KELUAR');
					$tgl_sales = array(
						'name'=>'tgl_sales',
						'class'=>'form-control',
						'value'=>date('d-m-Y'),
						'readonly'=>'readonly'
					);
					echo form_input($tgl_sales);
					?>
				</div>
				
				
				<?php 
				$simpan = array(
					'class'=>'btn btn-success',
					'value'=>'SIMPAN'
				);
				echo form_submit($simpan);
				echo form_close();
				 ?>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function () {
		// 	jquery-ui autocomplete
		$( "#cariobat" ).autocomplete({
			source: '<?php echo site_url('Sales/cariobat');?>',
			minLength:1
		});

		window.setTimeout(function() {
		    $(".alert").fadeTo(1000, 0).slideUp(500, function(){
		        $(this).remove(); 
		    });
		}, 2000);
	 
	});

	$(document).on("click", "#batal", function(e) {
        var link = $(this).attr("href");
        e.preventDefault();    
        bootbox.confirm("Anda yakin ingin membatalkan transaksi ?", function(result) {    
	       	if (result) {
	        	document.location.href = link;
	        }   
    	});        	
	});
</script>

