<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
        <link rel="stylesheet" href="assets/login/style.css">
</head>
<body><Br><br><br><Br>
<div class="container" style="margin-top:80px;">
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

	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" style="font-size:20px; text-align:center;">Haruppi </h3>
			</div>
			<div class="panel-body">
                <div style="margin-bottom:20px;" align="center">
                    <img src="img/logo.jpg" style="widht:100px; height:120px; ">
                </div>
				<?php echo form_open('Login/login'); ?>
                <div class="form-group">
                    <?php
                        $username=array(
                            'name'=>'username',
                            'class'=>'form-control',
                            'placeholder'=>'Username',
                            'autocomplete'=>'off',
                            'autofocus'=>'on'

                        );
                        echo '<div class="input-group input-group-sm">';
                        echo  '<span class="input-group-addon"><span class = "glyphicon glyphicon-user"></span></span>';
                        echo form_input($username);
                        echo '</div>';
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        $password=array(
                            'name'=>'password',
                            'class'=>'form-control',
                            'placeholder'=>'Password'
                        );
                        echo '<div class="input-group input-group-sm">';
                        echo  '<span class="input-group-addon"><span class = "glyphicon glyphicon-lock"></span></span>';
                        echo form_password($password);
                        echo '</div>';
                    ?>
                </div>
                <?php
                    $login = array(
                        'class'=>'btn btn-theme btn-block btn-primary',
                        'value'=>'Login'
                    );
                    echo form_submit($login);
                    echo form_close();
            ?>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

	</div>
</div>


<!-- <div class="login">
  <div class="login-triangle"></div>

  <h2 class="login-header">Log in</h2>

  <form class="login-container">
    <p><input type="text" placeholder="username"></p>
    <p><input type="password" placeholder="Password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



 -->


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
</script>

</body>
</html>
