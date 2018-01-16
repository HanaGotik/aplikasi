<?php
//session_start();ob_start();
//if($_SESSION['hak_akses']=='admin'){
include "koneksi.php";
?>

<html>
<head>
<title>Pencarian Data</title>

</head>
<body background="">
<h2>Pencarian Data</h2>
		<form action='?page=cari'method="POST">
	<input type='text' value='' name='qcari'>
	<input type='submit' value='cari' class="btn btn-success"><a href='?page=cari' class="btn btn-primary">  All</a>
</form>

		<table border="1" width="1000px" class="sortable">
			<tr bgcolor="#d0b473"><td>ID</td><td>Nama Desa</td><td>Nama Camat</td><td>Nama Lapangan Kerja</td><td>Keunggulan</td><td>Jumlah Kepala Keluarga</a></td><td>Jumlah Kepala Keluarga (Miskin)</a></td><td>Foto</td><td>Jenis</td><td>Lat</td><td>Lang</td></th>

<?php
require_once('koneksi.php');
$query1="select * from view_informasi ";


if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM  view_informasi where nama_desa like '%$qcari%' or nama_camat like '%$qcari%' or nama_lapker like '%$qcari%' or keunggulan like '%$qcari%'";
}

$result=mysql_query($query1) or die(mysql_error());
$no=1; //penomoran 
while($rows=mysql_fetch_object($result)){
			?>
			<tr>
				<td><?php echo $no
				?></td>
				<td><?php		echo $rows -> nama_desa;?></td>
				<td><?php		echo $rows -> nama_camat;?></td>
				<td><?php		echo $rows -> nama_lapker;?></td>
				<td align='left'><?php echo $rows -> keunggulan;?></td>
				<td><?php		echo $rows -> jumlah_kk;?></td>
				<td><?php		echo $rows -> jumlah_km;?></td>
				<td><a href="foto/<?php echo $rows -> foto; ?>" target="_blank"><img src="foto/<?php echo $rows -> foto;?>" border="0"  style="max-width:120px;"/></a></td>
				<td><?php		echo $rows -> jenis;?></td>
				<td align='left'><?php		echo $rows -> lat;?></td>
				<td align='left'><?php		echo $rows -> lang;?></td>
			</tr>
			<?php
$no++;
}?>
		</table>	
</div>
</body>
</html>
