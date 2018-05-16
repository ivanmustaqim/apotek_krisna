<?php
$level = $this->session->userdata('level');
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('jenisobat');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Data Jenis Obat</li>
    </ol>
  </div><!--/.row-->
  <!-- Main component for a primary marketing message or call to action -->

   <div class="panel-body" >
   <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
        <?php if($level == 1){ ?>

         <a class="btn btn-md btn-success" href="<?php echo base_url('jenisobat/adddata');?>">Tambah Data Jenis Obat</a>
         <!--  </div> -->
         <?php } ?>
         </div>
         <div class="panel-body">
          <div class="col-lg-6"></div>


          <div class="panel-body">
            <table class="table table-hover" >
              <thead>
                <th><center>NO</center></th>
                <th><center>ID JENIS OBAT</center></th>
                <th><center>JENIS OBAT</center></th>
                <th><center>AKSI</center></th>
              </thead>
              <tbody>

                <div class="col-md-3 col-lg-offset-9">
                <form role="search" action="<?php echo site_url('jenisobat');?>" method='post' >
                  <div class="form-group" >
                  <!-- <button type="submit" class="btn btn-default">Cari</button> -->
                  <input type="text" class="form-control" placeholder="Search" name="pencarian">

                  <!-- <input type="submit" value="Cari"> -->
                  </div>
                </form>
                </div>
                
                <?php
                $no = 1;
                foreach($ambil_info as $value)
                {
                  ?>
                  <tr>
                    <td><center><?= $no;?></center></td>
                    <td><center><?= $value->id_jenis_obat;?></center></td>
                    <td><center><?= $value->jenis_obat;?></center></td>
                    
                    <td>
                      <center>
                        <?php  
                        echo anchor('jenisobat/editdata/'.$value->id_jenis_obat, '<span class="glyphicon glyphicon-pencil"> EDIT</span>', array('class' =>'btn btn-success btn-sm','title'=>'Edit data ')); 
                        ?>
                        <?php echo anchor('jenisobat/hapusdata/'.$value->id_jenis_obat, '<span class="glyphicon glyphicon-trash"> HAPUS</span>', array('id'=>'hapus','class' =>'btn btn-danger btn-sm','title'=>'Hapus data '));
                        ?>
                      </center> 
                    </td>
                  </tr>
                  <?php
                  $no++;
                }
                ?>
              </tbody>
            </table>
            <div class="panel-footer" style="height:40px;">
            <?php echo $pagination ?>
            </div>
          </div>



        </div>
      </div>

    </div>

  </div>

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
    $(document).on("click", "#hapus",function(e){
      var link = $(this).attr("href");
      e.preventDefault();
      bootbox.confirm("Anda yakin ingin menghapus data ini ?", function(result){
        if(result){
          document.location.href = link;
        }
      });
    });
  </script>
