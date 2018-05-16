<?php
$level = $this->session->userdata('level');
?>



<script src="js/lumino.glyphs.js"></script>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('laporan');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Laporan</li>
    </ol>
  </div><!--/.row-->
  <!-- Main component for a primary marketing message or call to action -->

  <div class="panel-body" >
    <div class="row">
      <div class="col-lg-12">
        
            <?php if($level == 1){ ?>
           
            <?php } ?>

            
        </div>
        <div class="panel-body">
        <div class="col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Jenis Obat
          </div>
          <div class="panel-body">
            <?php 
          echo form_open('laporan/set_laporan',array('id'=>'form_agent'));?>
          <div class="form-group">
            <div><?php echo form_radio('status', '1', FALSE).' '.form_label('LAPORAN OBAT MASUK');?></div>
            <div><?php echo form_radio('status', '2', FALSE).' '.form_label('LAPORAN OBAT KELUAR');?></div>

          </div>
          
          <?php 
          $submit = array(
            'class'=>'btn btn-primary btn-sm',
            'value'=>'PILIH LAPORAN'
            );
          echo form_submit($submit);
          echo form_close(); ?>
          </div>
        </div>
      </div>
          
      <div class="col-md-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            Laporan Data
          </div>
          <div class="panel-body">
          <div class="form-group">
            <a class="btn btn-md btn-primary" href="<?php echo base_url('laporan_jenisobat');?>">Laporan Jenis Obat</a>
            <br><br>
            <a class="btn btn-md btn-primary" href="<?php echo base_url('laporan_supplier');?>">Laporan Supplier</a>
          </div>
        </div>
      </div>

      <!--   </div> -->
              
            </div>

                
</div>


          </div>
          <div class="panel-body">
          
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

