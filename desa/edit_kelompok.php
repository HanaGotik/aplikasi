<?php

include"koneksi.php";
include "header_admin.php";

$id_info=$_GET['id_info'];
$queryGet=mysql_query("SELECT * from tbl_informasi where id_info='$id_info'");
$dataGet=mysql_fetch_array($queryGet);
?>


<table width="477" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td align="left" valign="top" class="heading">Data Kelompok</td>
  </tr>
<tr><td bgcolor="#FFFFFF">
<form method="post" action="aksi_kelompok.php">
<table width=100% border=0 align="center">
<tr height="25"><td>ID Info</td><td><?php echo$dataGet['id_info'];?></td></tr><input type="hidden" name="id_info" value="<?php echo$dataGet['id_info'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Koordinat X</td><td><?php echo$dataGet['lat'];?></td></tr><input type="hidden" name="lat" value="<?php echo$dataGet['lat'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Koordinat Y</td><td><?php echo$dataGet['lng'];?></td></tr><input type="hidden" name="lng" value="<?php echo$dataGet['lng'];?>" size="65" required=""></td></tr><br>
<tr height="25"><td>Kecamatan</td><td><?php echo$dataGet['jenis'];?></td></tr><input type="hidden" name="jenis" value="<?php echo$dataGet['jenis'];?>" size="65" required=""></td></tr><br>
<tr height="25"><td>Nama Desa</td><td><?php echo$dataGet['nama_desa'];?></td></tr><input type="hidden" name="nama_desa" value="<?php echo$dataGet['nama_desa'];?>" size="65" required=""></td></tr><br>
<tr height="25"><td>Nama Tanaman &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;</td>
<td><select name="nama_tanaman" required="" id="nama_tanaman">
<?php 
$query2=mysql_query("select * from tbl_tanaman order by nama_tanaman asc");

while($row2=mysql_fetch_array($query2))
{
	?><option value="<?php  echo $row2['nama_tanaman']; ?>"><?php  echo $row2['nama_tanaman']; ?></option><?php 
}
?>

</select></td>
<tr height="25"><td>Nama Kelompok Tani</td><td><input type="text" name="nama_ketan" value="<?php echo$dataGet['nama_ketan'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Jumlah Anggota</td><td><input type="text" name="jumlah_anggota"  value="<?php echo$dataGet['jumlah_anggota'];?>"size="65" required=""></td></tr>
<tr height="25"><td>Luas Tanam</td><td><input type="text" name="luas_tanam"  value="<?php echo$dataGet['luas_tanam'];?>"size="65" required=""></td></tr>
<tr height="25"><td>Luas Panen</td><td><input type="text" name="luas_panen"  value="<?php echo$dataGet['luas_panen'];?>"size="65" required=""></td></tr>
<tr height="25"><td>Waktu Tanam</td><td><?php echo$dataGet['tgl'];?></td></tr><input type="hidden" name="tgl" value="<?php echo$dataGet['tgl'];?>" size="65" required=""></td></tr>
<tr><td></td><td>

<tr><td></td><td class="head-data">
<input type="submit" value="Ubah">
</td></tr>
</table>
</form>
</td></tr></table>

<?php
include "footer_admin.php";
?>


