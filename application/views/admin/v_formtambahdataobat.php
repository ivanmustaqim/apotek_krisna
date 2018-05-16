<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Data Jenis Obat / Tambah Jenis Obat</li>
      </ol>
    </div><!--/.row-->

  <!-- Main component for a primary marketing message or call to action -->
 <div class="row">
<br>
    <div class="col-md-12">
      <div class="panel panel-default">
 

    <div class="panel-body">

      <form method="post" action="<?php echo site_url('dataobat/prosestambah')?>" enctype="multipart/form-data">


        <br />
        <div class="control-group">
         <label class="control-label">Jenis Obat</label>
          <div class="controls">
            <input class="form-control" type="text" name="nama_obat " placeholder="Nama Obat" required="" >
          </div>
        </div>
        <br />
       

          <a class="btn btn-md btn-danger" href="<?php echo base_url('dataobat');?>">Kembali</a>
          <button type="submit" class="btn btn-primary">Simpan</button>

          </form>
          <br>
        </div>



   </div>

  </div>
</div>
</div>
</div>