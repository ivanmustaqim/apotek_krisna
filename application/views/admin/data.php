<!-- silakan desain dengan menggunakan CSS -->
<style type="text/css">
#table{
	width:500px;
	border:1px solid #666;
}
</style>
<table id="table">
<?php
foreach($data->result() as $row) 
{
	echo '<tr><td>'.$row->id_supplier."</td><td>".$row->nama_supplier."</td><td>".$row->alamat."</td></tr>";	
}
?>
</table>