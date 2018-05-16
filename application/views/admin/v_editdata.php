<!-- <?php 
mysql_connect("localhost", "root", "");
mysql_select_db("apotek_krisna"); ?> -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
 <div class="row">
  <ol class="breadcrumb">
    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Data Obat</li>
  </ol>
</div><!--/.row-->
<br/>
<div class="row">
<div class="col-md-12">
      <div class="panel panel-default">
  <div class="panel-body">

    <form method="post" action="<?php echo site_url('tambahdata/prosesedit')?>" enctype="multipart/form-data">

     <?php foreach ($edit_info as $key) { ?>

    <!--  <div class="control-group">
       <label class="control-label">ID Obat</label>
       <div class="controls">
        <input class="form-control" type="text" name="id_obat" value="<?php echo $key->id_obat; ?>" readonly="">
      </div>
    </div>
    <br /> -->

   
<!-- 
      <div class="control-group">
       <label class="control-label">ID Jenis Obat</label>
       <div class="controls">
        <input class="form-control" type="text" name="id_jenis_obat" value="<?php echo $key->id_jenis_obat; ?>" >
      </div>
    </div>
    <br /> -->

    <div class="control-group">
            <label class="control-label">Jenis Obat</label>
            <div class="controls">
              <select class="form-control" id="id_jenis_obat" name="id_jenis_obat">
         <option></option>
                <?php 
                foreach ($jenisobat as $k) {
                  # code...
                  ?>

                  <option value="<?php echo $k->id_jenis_obat; ?>"><?php echo $k->jenis_obat; ?></option><?php } ?>
                
                
              </select>
            </div>
          </div> 
    <br/>

    <div class="control-group">
      <label class="control-label">Nama Obat</label>
      <div class="controls">
       <input class="form-control" type="text" name="nama_obat" value="<?php echo $key->nama_obat; ?>" required>
     </div>
   </div>
   <br />

   <div class="control-group">
     <label class="control-label">Tgl Kadaluarsa</label>
     <div class="controls">
      <input class="form-control" type="date" name="tgl_kadaluarsa" value="<?php echo $key->tgl_kadaluarsa; ?>" >
    </div>
  </div>
  <br />

   <div class="control-group">
    <label class="control-label">Jumlah</label>
    <div class="controls">
     <input class="form-control" type="number" name="harga" value="<?php echo $key->jumlah; ?>" required>
   </div>
 </div>
 <br />

  <div class="control-group">
    <label class="control-label">Harga Obat</label>
    <div class="controls">
     <input class="form-control" type="number" name="harga" value="<?php echo $key->harga; ?>" required>
   </div>
 </div>
 <br />

  <div class="control-group">
     <label class="control-label">Tgl Masuk</label>
     <div class="controls">
      <input class="form-control" type="date" name="tgl_masuk" value="<?php echo $key->tgl_sales; ?>" >
    </div>
  </div>
  <br />

       <!--  <div class="control-group">
          <label class="control-label">Nama Supplier</label>
          <div class="controls">
           <input class="form-control" type="text" name="nama_supplier" value="<?php echo $key->nama_supplier; ?>" required>
          </div>
        </div>
        <br /> -->

        
        <div class="form-group">
          <label>Selects</label>
          <select class="form-control" name="nama_supplier" required>
            <option>
              <?php  echo $key->nama_supplier;?>
              <?php
                    // mysql_connect("localhost", "root", "");
                    // mysql_select_db("apotek_krisna");
              $sql = mysql_query("SELECT * FROM data_supplier ORDER BY nama_supplier ASC");
              if(mysql_num_rows($sql) != 0){
                while($data = mysql_fetch_assoc($sql)){
                  echo '<option>'.$data['nama_supplier'].'</option>';
                }
              }
              ?></option>
            </select>
          </div>

          <!-- <div class="control-group">
            <label class="control-label">ID User</label>
            <div class="controls">
             <input class="form-control" type="text" name="username" value="<?php echo $key->username; ?>" required>
           </div>
         </div> -->
         <br />

         <?php } ?>

         <a class="btn btn-md btn-danger" href="<?php echo base_url('tambahdata');?>">Kembali</a>
         <button type="submit" class="btn btn-primary">Simpan</button>

       </form>

       <br>
     </div>
</div>
</div>
   </div>



 </div>