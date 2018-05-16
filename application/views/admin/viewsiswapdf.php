<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div class="box-body mdl-cell--12-col">

    <h3 class="mdl-cell mdl-cell--12-col">Data Siswa SMK Taruna Bhakti </h3>
   
    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">
         
            <table width="85%"  class="table table-condensed" >
                <thead>

                    <tr>   
                        <th data-field="name">ID Siswa</th>
                        <th data-field="name">No Ujian</th>
                                       
                      
                    </tr>    
                </thead>
                <tbody>

                    <?php
                    foreach ($data_tbsiswa->result() as $dt) {
                        ?>
                        <tr><td><?php echo $dt->id_obat; ?></td>
                            <td><?php echo $dt->nama_obat; ?></td>
                           
                        </tr>

                    <?php } ?> 
                </tbody>
            </table>
        </div></div>
</div>  

<div class="box-footer clearfix">
    <?php //echo $jum_penguji;  ?>
</div>
</div>    

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>