<?php
$level = $this->session->userdata('level');
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url('supplier');?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
      <li class="active">Data Supplier</li>
    </ol>
  </div><!--/.row-->
  <!-- Main component for a primary marketing message or call to action -->
  <div class="row"> 
   <div class="panel-body" >
     
     <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
        <?php if($level == 1){ ?>
          <a class="btn btn-md btn-success" href="<?php echo base_url('supplier/adddata');?>">Tambah Supplier</a>
          <?php } ?>
        </div>
      

        <div class="panel-body">
          <table data-toggle="table" id="table-style" data-row-style="rowStyle" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc" >
            <thead>
              <tr>
                <!-- <th data-field="no" >Nomor</th> -->
                <th data-field="nama_supplier" data-sortable="true"><center>Nama Supplier</center></th>
                <th data-field="alamat"  data-sortable="true"><center>Alamat</center></th>
                <th data-field="no_telp" data-sortable="true"><center>No Telp</center></th>
                <th data-field="aksi" data-sortable="true"><center>Aksi</center></th>
              </tr>
            </thead>
            <tbody>
              
              <?php
              $no = 1;
              foreach($ambil_info as $row){
                ?>
                <tr>
                 <!--  <td style="font-size: 12px;"><?php echo $no++; ?></td> -->
                 <!--  <td style="font-size: 12px;width:80px"><?php echo $row->id_supplier; ?></td> -->
                 <td style="font-size: 12px;"><?php echo $row->nama_supplier; ?></td>
                 <td style="font-size: 12px;"><?php echo $row->alamat; ?></td>
                 <td style="font-size: 12px;width:120px"><?php echo $row->no_telp; ?></td>

                 <?php if($level == 1){ ?>
                 <td style="width:120px">
                  <center>

                    <?php  
                    echo anchor('supplier/editdata/'.$row->id_supplier, '<span class="glyphicon glyphicon-pencil"> EDIT</span>', array('class' =>'btn btn-success btn-sm','title'=>'Edit data ')); 
                    ?>

               <!--  <a class="btn btn-info btn-xs" href="<?php echo base_url('supplier/editdata/'.$row->id_supplier);?>"><i class="fa fa-pencil"></i> Edit</a>
             -->

               <!--  <a class="btn btn-danger btn-xs" href="<?php echo base_url('supplier/hapusdata/'.$row->id_supplier);?>"
               onclick="return confirm('Anda yakin akan menghapus data ?')"> <i class="fa fa-trash"></i> Hapus</a> -->
               
               <?php echo anchor('supplier/hapusdata/'.$row->id_supplier, '<span class="glyphicon glyphicon-trash"> HAPUS</span>', array('id'=>'hapus','class' =>'btn btn-danger btn-sm','title'=>'Hapus data '));
               ?>

             </center>
           </td>
           <?php } ?>
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
<!-- <?php echo $halaman ?> -->
</div>



<br/>
<br/>

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
