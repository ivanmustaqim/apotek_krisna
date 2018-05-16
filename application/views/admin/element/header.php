<?php
$level = $this->session->userdata('level');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Apotek </title>

<link href="assets/css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url();?>/assets/css/styles.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--Icons-->
<script type="text/javascript" src="assets/js/print.js"></script>
<script type="text/javascript" src="assets/js/bootstrapValidator.js"></script>
<script type="text/javascript" src="assets/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-notify.min.js"></script>

<script src="assets/js/print.js"></script>
<script src="assets/js/bootstrapValidator.js"></script>
<script src="assets/js/bootstrapValidator.min.js"></script>
<script src="assets/js/bootstrap-notify.min.js"></script>
<script src="assets/js/chart.min.js"></script>
<script src="assets/js/chart-data.js"></script>
<script src="assets/js/easypiechart.js"></script>
<script src="assets/js/easypiechart-data.js"></script>


<script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url();?>/assets/js/lumino.glyphs.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/js/bootbox.js"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

    <!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Apotek </span> Krisna 			
				</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> 

							<?php 
							if($level == 1){
								echo 'Admin';
							}else{
								echo 'Petugas';
							}
							?>

						 <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							
							<li><?php echo anchor('Login/logout','<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg>Logout'); ?></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>
