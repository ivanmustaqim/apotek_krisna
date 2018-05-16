    <!-- <?php 
        mysql_connect("localhost", "root", "");
     ?>
    -->
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
        <ol class="breadcrumb">
          <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
          <li class="active">Data Obat</li>
        </ol>
      </div>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="row">
      <br>
       <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-body">

          <form method="post" action="<?php echo site_url('tambahdata/prosestambah')?>" enctype="multipart/form-data">

  <div class="control-group">
             <label class="control-label">ID Obat</label>
             <div class="controls">
              <input class="form-control" type="text" name="id_obat" value="<?php echo $id_obat; ?>" readonly="">
            </div>
          </div>
          <br />

          <div class="form-group">
        <?php 
            echo form_label('Katagori obat');
            echo form_dropdown('id_jenis_obat', $category_options, '','class="form-control"');
         ?>
      </div>
            
      <!-- div class="control-group">
            <label class="control-label">Katagori Obat</label>
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
 -->
          <!-- <div class="form-group">
            <label>Id Jenis Obat</label>
            <select class="form-control" name="id_jenis_obat" required>
              <option><?php

                mysql_select_db("apotek_krisna");
                $sql = mysql_query("SELECT * FROM jenis_obat ORDER BY id_jenis_obat ASC");
                if(mysql_num_rows($sql) != 0){
                  while($data = mysql_fetch_assoc($sql)){
                    echo '<option>'.$data['id_jenis_obat'].'</option>';
                  }
                }
                ?></option>
              </select>
            </div> -->

         <!--  <div class="control-group">
           <label class="control-label">ID Jenis Obat</label>
           <div class="controls">
            <input class="form-control" type="text" name="id_jenis_obat" required>
          </div>
        </div>
        <br />
      -->
      <br/>
      <div class="control-group">
        <label class="control-label">Nama Obat</label>
        <div class="controls">
         <input class="form-control" type="text" name="nama_obat" required>
       </div>
     </div>
     <br />

     <div class="control-group">
       <label class="control-label">Tgl Kadaluarsa</label>
       <div class="controls">
        <input class="form-control" type="date" name="tgl_kadaluarsa" required>
      </div>
    </div>
    <br />

    <div class="control-group">
     <label class="control-label">Jumlah</label>
     <div class="controls">
      <input class="form-control" type="number" name="jumlah" required>
    </div>
    </div>
    <br />

    <div class="control-group">
     <label class="control-label">Harga</label>
     <div class="controls">
      <input class="form-control" type="number" name="harga" required>
    </div>
    </div>
    <br />

    <div class="control-group">
       <?php  
          echo form_label('Tanggal Masuk');
          $tgl_sales = array(
            'name'=>'tgl_sales',
            'class'=>'form-control',
            'value'=>date('Y-m-d'),
            'readonly'=>'readonly'
          );
          echo form_input($tgl_sales);
          ?>
    </div>
    <br />

    <div class="form-group">
      <label>Nama Supplier</label>
      <select class="form-control" name="nama_supplier" required>
        <option><?php

          mysql_select_db("apotek_krisna");
          $sql = mysql_query("SELECT * FROM data_supplier ORDER BY nama_supplier ASC");
          if(mysql_num_rows($sql) != 0){
            while($data = mysql_fetch_assoc($sql)){
              echo '<option>'.$data['nama_supplier'].'</option>';
            }
          }
          ?></option>
        </select>
      </div>
      <div class="form-group">
        <?php 
            echo form_label('KADALUARSA');
            echo form_dropdown('kadaluarsa', $status, '','class="form-control"');
         ?>
      </div>

            <!-- <div class="control-group">
              <label class="control-label">Nama Supplier</label>
              <div class="controls">
                <input class="form-control" type="text" name="nama_supplier" required>
              </div>
            </div>
            <br /> -->

            <!-- <div class="control-group">
              <label class="control-label">ID User</label>
              <div class="controls">
                <input class="form-control" type="text" name="username" required>
              </div>
            </div> -->
            <br />

            <a class="btn btn-md btn-danger" href="<?php echo base_url('tambahdata');?>">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>

          </form>
          <br>
        </div>

</div>
</div>
      </div>

    </div>

    </div>