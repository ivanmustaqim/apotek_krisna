<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Data Supplier</li>
      </ol>
    </div><!--/.row-->
  <!-- Main component for a primary marketing message or call to action -->
 <div class="row">
    <div class="panel-body">

      <form method="post" action="<?php echo site_url('supplier/prosesedit')?>" enctype="multipart/form-data">

         <?php foreach ($edit_info as $key) { ?>

        <div class="control-group">
         <label class="control-label">ID Supplier</label>
          <div class="controls">
            <input class="form-control" type="text" name="id_supplier" value="<?php echo $key->id_supplier; ?>" >
          </div>
        </div>
        <br />
        <div class="control-group">
         <label class="control-label">Nama Supplier</label>
          <div class="controls">
            <input class="form-control" type="text" name="nama_supplier" value="<?php echo $key->nama_supplier; ?>" required>
          </div>
        </div>
        <br />
        <div class="control-group">
          <label class="control-label">Alamat</label>
          <div class="controls">
             <textarea class="form-control" id="message" name="alamat" rows="5"><?php echo $key->alamat; ?></textarea>
          </div>
        </div>
        <br />
        <div class="control-group">
          <label class="control-label">No Telp</label>
          <div class="controls">
           <input class="form-control" type="number" name="no_telp" value="<?php echo $key->no_telp; ?>" required>
          </div>
        </div>
         <br />

            <?php } ?>

          <a class="btn btn-md btn-danger" href="<?php echo base_url('supplier');?>">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>

          </form>

          <br>
        </div>



   </div>

  </div>

</div>