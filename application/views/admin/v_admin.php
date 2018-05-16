<?php
$level = $this->session->userdata('level');
?>


<script src="assets/js/lumino.glyphs.js"></script>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?php echo base_url('admin');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">
				<?php 
				$nama = $this->session->userdata('nama');
				if($level == 1){
					echo 'Administrator';
				}else{
					echo 'Petugas';
				}
				?>
			</li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-12">
			
			<h1 class="page-header"> Selamat Datang
				<?php echo $nama;

				?>

			</h1>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-blue panel-widget ">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">

						<svg class="glyph stroked app window with content"><use xlink:href="#stroked-app-window-with-content"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">

							<?php
							$this->db->from('obat');
							echo $this->db->count_all_results()
							?>

						</div>
						<div class="text-muted">Jenis Obat</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-teal panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">

							<?php
							$this->db->from('user');
							echo $this->db->count_all_results()
							?>

						</div>
						<div class="text-muted">Users</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-md-6 col-lg-3">
			<div class="panel panel-red panel-widget">
				<div class="row no-padding">
					<div class="col-sm-3 col-lg-5 widget-left">
						<svg class="glyph stroked open folder"><use xlink:href="#stroked-open-folder"/></svg>
					</div>
					<div class="col-sm-9 col-lg-7 widget-right">
						<div class="large">
							<?php
							$this->db->from('data_supplier');
							echo $this->db->count_all_results()
							?>
						</div>
						<div class="text-muted">Supplier</div>


					</div>
				</div>
			</div>
		</div>

			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked empty-message"><use xlink:href="#stroked-empty-message"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">
							<?php 
							echo $jumlah;
							 ?>
							</div>
							<div class="text-muted">Obat Kadaluarsa</div>
						</div>
					</div>
				</div>
			</div>

		<div class="col-md-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<a href="<?php echo base_url('kadaluarsa');?>">Info Kadaluarsa Obat</a>
				</div>
				<div class="panel-body">
					<ul style="list-style-type:square">
						<li>
							<?php
							$this->db->from('obat');
							$this->db->where('kadaluarsa',1);
							$query = $this->db->get();
							echo $query->num_rows()
							?>
							obat dengan masa kadaluarsa 30 hari.
						</li>
						<li> 
							<?php
							$this->db->from('obat');
							$this->db->where('kadaluarsa',2);
							$query = $this->db->get();
							echo $query->num_rows()
							?>
							obat dengan masa kadaluarsa 60 hari.</li>
							<li>
								<?php
								$this->db->from('obat');
								$this->db->where('kadaluarsa',3);
								$query = $this->db->get();
								echo $query->num_rows()
								?>
								obat dengan masa kadaluarsa 90 hari.</li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-xs-12 col-md-4 col-lg-4">
					<div class="panel panel-blue">
						<div class="panel-heading dark-overlay"><svg class="glyph stroked calendar"><use xlink:href="#stroked-calendar"></use></svg>Kalender</div>
						<div class="panel-body">
							<div id="calendar"></div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div><!--/.col-->
	</div><!--/.row-->
</div>	<!--/.main-->
<script src="lumino/js/jquery-1.11.1.min.js"></script>
<script src="lumino/js/bootstrap.min.js"></script>
<script src="lumino/js/bootstrap-datepicker.js"></script>
<script>
	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
			$(this).find('em:first').toggleClass("glyphicon-minus");      
		}); 
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>
<?php 
if($jumlah > 0){?>
<script type="text/javascript">
	bootbox.alert("Ada <?php echo $jumlah;?> obat yang kadaluarsa !", function() {});
</script>
<script>
	$('#calendar').datepicker({
	});

	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
			$(this).find('em:first').toggleClass("glyphicon-minus");      
		}); 
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>	
<?php
}
?>
<script>
	$('#calendar').datepicker({
	});

	!function ($) {
		$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
			$(this).find('em:first').toggleClass("glyphicon-minus");      
		}); 
		$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
	}(window.jQuery);

	$(window).on('resize', function () {
		if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
	})
	$(window).on('resize', function () {
		if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
	})
</script>
