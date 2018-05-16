<?php
$level = $this->session->userdata('level');
?>
<script src="js/lumino.glyphs.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('admin');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Data Masuk</li>
    </ol>
  </div><!--/.row-->
  <!-- Main component for a primary marketing message or call to action -->

  <div class="panel-body" >
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <?php if($level == 1){ ?>
            <!-- <div class="col-md-6"> -->
            <a class="btn btn-md btn-success" href="<?php echo base_url('tambahdata/adddata');?>">Tambah Obat Masuk</a>
            <!--  </div> -->
            <?php } ?>



          </div>
          <div class="panel-body">
            <div class="col-lg-6"></div>

            <table data-toggle="table"  data-show-refresh="true" data-show-toggle="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="nama_obat" data-sort-order="desc">

              <thead>
                <tr>
                <!--   <th data-field="id_jenis_obat"  > Katagori Obat  </th> -->
                  <th data-field="nama_obat" > Nama Obat  </th>
           
                  <th data-field="aksi" > Aksi  </th>
                </tr>
              </thead>
              <tbody>

                <?php
                $no = 1;
                foreach($dataobat as $row){
                  ?>
                  <tr>
                    <!-- <td style="font-size: 12px;"><?php echo $no++; ?></td> -->
                    <!--  <td style="font-size: 12px;width:80px"><?php echo $row->id_obat; ?></td> -->
                   <!--  <td style="font-size: 12px;width:80px"><?php echo $row->id_jenis_obat; ?></td> -->
                    <td style="font-size: 12px;width:180px"><?php echo $row->nama_obat; ?></td>

                  
                    <td style="width:120px">
                      <center>

                        <?php  
                        echo anchor('dataobat/editdata/'.$row->id, '<span class="glyphicon glyphicon-pencil"> EDIT</span>', array('class' =>'btn btn-success btn-sm','title'=>'Edit data ')); 
                        ?>

                <?php echo anchor('dataobat/hapusdata/'.$row->id, '<span class="glyphicon glyphicon-trash"> DEl</span>', array('id'=>'hapus','class' =>'btn btn-danger btn-sm','title'=>'Hapus data '));
                ?>


              </center>
            </td>
          

            
          </tr>

          <?php
        }
        ?>

      </tbody>
    </table>
    <script>
      $(function () {
        $('#hover, #striped, #condensed').click(function () {
          var classes = 'table';

          if ($('#hover').prop('checked')) {
            classes += ' table-hover';
          }
          if ($('#condensed').prop('checked')) {
            classes += ' table-condensed';
          }
          $('#table-style').bootstrapTable('destroy')
          .bootstrapTable({
            classes: classes,
            striped: $('#striped').prop('checked')
          });
        });
      });

      function rowStyle(row, index) {
        var classes = ['active', 'success', 'info', 'warning', 'danger'];

        if (index % 2 === 0 && index / 2 < classes.length) {
          return {
            classes: classes[index / 2]
          };
        }
        return {};
      }
    </script>
  </div>
</div>
</div>
</div><!--/.row-->

<br/>
<br/>


</div>

</div>
<script>
  !function ($) {
    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
      $(this).find('em:first').toggleClass("glyphicon-minus");
    });
    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
  }(window.jQuery);

  $(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
  })
  $(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
  })
</script>
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

<Br>
  <!--   <?php echo $halaman ?> -->
  <br>

