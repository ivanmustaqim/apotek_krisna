<?php
$level = $this->session->userdata('level');
?>


<link href="<?php echo base_url();?>/assets/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="assets/js/bootstrap.js"></script>
<script src="assets/js/print.js"></script>



<!-- <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  Main component for a primary marketing message or call to action
<br>


 -->
 <!--  <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
        
            <center>
            Apotek Krinsa
            <br>
            Jalan Dr.Wahidin Sudirohusodo No.31 Pontianak
            </center>
          
          </div>
          <div class="panel-body">
          <center>
          <h4>
          Laporan Jenis Obat
          </h4>
          </center>
          </div>
        </div>
      </div>

 -->

     <!--    <div class="panel-body"> -->
         <!--  <table class="table table-hover" >
            <thead>
              <th><center>NO</center></th>
              <th><center>ID JENIS OBAT</center></th>
              <th><center>JENIS OBAT</center></th>
            </thead>
            <tbody>

             
               
                <?php
                $no = 1;
                foreach($ambil_info as $value)
                {
                  ?>
                  <tr>
                    <td><center><?= $no;?></center></td>
                    <td><center><?= $value->id_jenis_obat;?></center></td>
                    <td><center><?= $value->jenis_obat;?></center></td>
                   
                    
                  </tr>
                  <?php
                  $no++;
                }
                ?>
              </tbody>
            </table> -->
      <!--       <div class="panel-footer" style="height:40px;">

 -->
            </div>
          </div>

        </div>

        

<br>
<div id="print-area-2" class="print-area">
&nbsp <a class="btn btn-md btn-primary no-print" href="<?php echo base_url('laporan');?>">Kembali</a>
<a class="btn btn-md btn-primary no-print"  href="javascript:printDiv('print-area-2');">Cetak</a>


<br>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<br>
     <div class="col-md-12">
        <div class="panel panel-primary">
         <!--  <div class="panel-heading">
        
            <center>
            Apotek Krinsa
            <br>
            Jalan Dr.Wahidin Sudirohusodo No.31 Pontianak
            </center>
          
          </div> -->
          <div class="panel-body">
          <center>
          <h4>
          Laporan Supplier
          </h4>
          </center>
          </div>
        </div>
      </div>

    <table border="1">
        <thead>
              <th><center> NO </center></th>
              <th><center> NAMA SUPPLIER </center></th>
              <th><center> NAMA SUPPLIER </center></th>
              <th><center> ALAMAT </center></th>
              <th><center> NO TELP </center></th>
            </thead>
        <tbody>

             
               
                <?php
                $no = 1;
                foreach($ambil_info as $value)
                {
                  ?>
                  <tr>
                    <td><center><?= $no;?></center></td>
                    <td><center><?= $value->id_supplier;?></center></td>
                    <td><center><?= $value->nama_supplier;?></center></td>
                    <td><center><?= $value->alamat;?></center></td>
                    <td><center><?= $value->no_telp;?></center></td>
                  </tr>
                  <?php
                  $no++;
                }
                ?>
              </tbody>
    </table>
</div>
</div>

      <textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
