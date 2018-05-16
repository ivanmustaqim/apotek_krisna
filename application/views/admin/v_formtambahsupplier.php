<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Akun / Tambah Akun</li>
      </ol>
    </div><!--/.row-->

  <!-- Main component for a primary marketing message or call to action -->
 <div class="row">

 

    <div class="panel-body">

      <form method="post" action="<?php echo site_url('supplier/prosestambah')?>" enctype="multipart/form-data">


        <div class="control-group">
         <label class="control-label">ID Supplier</label>
          <div class="controls">
            <input class="form-control" type="text" name="id_supplier" value="<?php echo $id_supplier; ?>" readonly="">
          </div>
        </div>
        <br />
        <div class="control-group">
         <label class="control-label">Nama Supplier</label>
          <div class="controls">
            <input class="form-control" type="text" name="nama_supplier" required="">
          </div>
        </div>
        <br />
        <div class="control-group">
          <label class="control-label">Alamat</label>
          <div class="controls">
            <textarea type="text" name="alamat" class="form-control" rows="5"></textarea>
          </div>
        </div>
        <br />
        <div class="control-group">
          <label class="control-label">No Telp</label>
          <div class="controls">
            <input class="form-control" type="number" name="no_telp">
          </div>
        </div>
         <br />

          <a class="btn btn-md btn-danger" href="<?php echo base_url('supplier');?>">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>

          </form>
          <br>
        </div>



   </div>

  </div>

</div>