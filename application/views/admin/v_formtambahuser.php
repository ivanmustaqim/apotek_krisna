
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('tambahuser');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Akun &nbsp/&nbsp Tambah Akun</li>
    </ol>
  </div><!--/.row-->


  <!-- Main component for a primary marketing message or call to action -->
  <div class="row">
    <br>
    <div class="col-md-12">
      <div class="panel panel-default">


        <div class="panel-body">

          <form method="post" action="<?php echo site_url('tambahuser/prosestambah')?>" enctype="multipart/form-data">




            <div class="control-group">
             <label class="control-label">ID User</label>
             <div class="controls">
              <input class="form-control" type="text" name="id_user" value="<?php echo $id_user; ?>" readonly="">
            </div>
          </div>
          <br />


          <div class="control-group">
           <label class="control-label">Username</label>
           <div class="controls">
             <input class="form-control" type="text" name="username" >
           </div>
         </div>
         <br/>

         <div class="control-group">
          <label class="control-label">Password</label>
          <div class="controls">
           <input class="form-control" type="password" name="password">
         </div>
       </div>
       <br />

       <div class="control-group">
        <label class="control-label">Nama Lengkap</label>
        <div class="controls">
         <input class="form-control" type="text" name="nama_lengkap">
       </div>
     </div>
     <br />

     <div class="control-group">
      <label class="control-label">Level</label>
      <div class="controls">
        <?php echo form_dropdown('level', $level, '','class="form-control"');
        ?>
      </div>
    </div>
    <br />



    <a class="btn btn-md btn-danger" href="<?php echo base_url('tambahuser');?>">Kembali</a>
    <button type="submit" class="btn btn-primary">Simpan</button>

  </form>
  <br>
</div>



</div>
</div>
</div>
</div>

</div>
