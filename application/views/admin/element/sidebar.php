<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">

	<!-- <form role="search">
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search">
		</div>
	</form> -->
	<!-- <?php $level = $this->session->userdata('level') ?> -->

	<ul class="nav menu">
		<li class="<?php if(isset($active_dashboard)){echo $active_dashboard ;}?>"><a href="<?php echo base_url('admin');?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Home</a></li>
		
		
		
		<?php if($level == 1){ ?>
		<li class="<?php if(isset($active_tambahuser)){echo $active_tambahuser ;}?>"><a href="<?php echo base_url('tambahuser');?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Akun</a></li>
		<?php } ?>
		
		<?php if($level == 1){ ?>
		<li class="<?php if(isset($active_jenisobat)){echo $active_jenisobat ;}?>"><a href="<?php echo base_url('jenisobat');?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Katagori Obat</a></li>
		<?php } ?>

	<!-- 	<?php if($level == 1){ ?>
		<li class="<?php if(isset($active_dataobat)){echo $active_dataobat ;}?>"><a href="<?php echo base_url('dataobat');?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Data Obat</a></li>
		<?php } ?> -->

		<?php if($level == 1){ ?>
		<li class="<?php if(isset($active_supplier)){echo $active_supplier ;}?>"><a href="<?php echo base_url('supplier');?>"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Supplier</a></li>
		<?php } ?>

		<li class="<?php if(isset($active_tambahdata)){echo $active_tambahdata ;}?>"><a href="<?php echo base_url('tambahdata');?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"/></svg> Data Masuk</a></li>

		<!-- <li class="<?php if(isset($active_laporan_jenisobat)){echo $active_laporan_jenisobat ;}?>"><a href="<?php echo base_url('laporan_jenisobat');?>"><svg class="glyph stroked arrow right"><use xlink:href="#stroked-arrow-right"/></svg> Laporan Jenis Obat</a></li>
 -->

		<!-- <li class="<?php if(isset($active_receivings)){echo $active_receivings ;}?>"><a href="<?php echo base_url('receivings');?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Data Masuk2s</a></li> -->

		<li class="<?php if(isset($active_sales)){echo $active_sales ;}?>"><a href="<?php echo base_url('sales');?>"><svg class="glyph stroked arrow left"><use xlink:href="#stroked-arrow-left"/></svg> Data Keluar</a></li>

		<li class="<?php if(isset($active_kadaluarsa)){echo $active_kadaluarsa ;}?>"><a href="<?php echo base_url('kadaluarsa');?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Kadaluarsa</a></li>

		<li class="<?php if(isset($active_laporan)){echo $active_laporan ;}?>"><a href="<?php echo base_url('laporan');?>"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg> Laporan</a></li>

		




	<!-- 	<li><a href="forms.html"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg> Forms</a></li> -->
<!-- 		<li><a href="panels.html"><svg class="glyph stroked app-window"><use xlink:href="#stroked-app-window"></use></svg> Alerts &amp; Panels</a></li>
		<li><a href="icons.html"><svg class="glyph stroked star"><use xlink:href="#stroked-star"></use></svg> Icons</a></li>
		<li class="parent ">
			<a href="#">
				<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Dropdown
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li>
					<a class="" href="#">
						<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 1
					</a>
				</li>
				<li>
					<a class="" href="#">
						<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 2
					</a>
				</li>
				<li>
					<a class="" href="#">
						<svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Sub Item 3
					</a>
				</li>
			</ul>
		</li> -->
		<li role="presentation" class="divider"></li>
		<li><a href="<?php echo base_url();?>Login/logout"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
	</ul>

</div><!--/.sidebar-->

<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-table.js"></script>
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
</body>

</html>
