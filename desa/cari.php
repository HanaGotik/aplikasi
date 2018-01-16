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
			<tr bgcolor="#1e97a8"><td>No</td>
			<td>Nama Desa</td>
			<td>Nama Kades</td>
			<td>Alamat</td>
			<td>Keterangan</td>
			<td>Fasilitas</td>
			<td>Jenis</td>
			<td>Lat</td>
			<td>Lang</td>
			</th>

<?php
require_once('koneksi.php');
$query1="select * from view_informasi ";


if(isset($_POST['qcari'])){
	$qcari=$_POST['qcari'];
	$query1="SELECT * FROM  view_informasi where nama_desa like '%$qcari%' or nama_kades like '%$qcari%' or alamat like '%$qcari%' or fasilitas like '%$qcari%'";
}

$result=mysql_query($query1) or die(mysql_error());
$no=1; //penomoran 
while($rows=mysql_fetch_object($result)){
			?>
			<tr>
				<td><?php echo $no?></td>
				<td><?php		echo $rows -> nama_desa;?></td>
				<td><?php		echo $rows -> nama_kades;?></td>
				<td><?php		echo $rows -> alamat;?></td>
				<td><?php		echo $rows -> keterangan;?></td>
				<td><?php		echo $rows -> fasilitas;?></td>
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
