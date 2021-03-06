<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
        <title><?php echo $title ;?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min-lumen.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    
  
    <!--Icons-->
    
    <script type="text/javascript" src="assets/js/bootstrap-notify.min"></script>
    <script type="text/javascript" src="assets/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="assets/js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="assets/js/bootbox.js"></script>


    <script src="assets/js/lumino.glyphs.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Apotek Krisna Pontianak  </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
           <!--  <li class="<?php if(isset($active_home)){echo $active_home ;}?>"><a href="<?php echo base_url();?>">Home</a></li>
            <li class="<?php if(isset($active_about)){echo $active_about ;}?>"><a href="<?php echo base_url('about');?>">About</a></li> -->
            <li class="<?php if(isset($active_login)){echo $active_login ;}?>"><a href="<?php echo base_url('login');?>">Login</a></li>

          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
