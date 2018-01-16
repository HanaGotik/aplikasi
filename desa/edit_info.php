<?php

include"koneksi.php";


$id_info=$_GET['id_info'];
$queryGet=mysql_query("SELECT * from tbl_informasi where id_info='$id_info'");
$dataGet=mysql_fetch_array($queryGet);
?>

<br><br><br><br><br>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td align="left" valign="top" class="heading"><h1>Data Fasilitas</h1></td>
  </tr>
<tr><td bgcolor="#FFFFFF">
<form method="post" action="aksi_info.php">
<table width=100% border=0 align="center">
<tr height="25"><td>ID Info</td><td><?php echo$dataGet['id_info'];?></td></tr><input type="hidden" name="id_info" value="<?php echo$dataGet['id_info'];?>" size="65" required=""></td></tr>
<tr height="25"><td>ID desa</td><td><?php echo$dataGet['id_desa'];?></td></tr><input type="hidden" name="id_desa" value="<?php echo$dataGet['id_desa'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Latitudinal</td><td><?php echo$dataGet['lat'];?></td></tr><input type="hidden" name="lat" value="<?php echo$dataGet['lat'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Longitudinal</td><td><?php echo$dataGet['lang'];?></td></tr><input type="hidden" name="lang" value="<?php echo$dataGet['lang'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Nama Kades</td><td><input type="text" name="nama_kades" value="<?php echo$dataGet['nama_kades'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Alamat</td><td><input type="text" name="alamat" value="<?php echo$dataGet['alamat'];?>" size="65" required=""></td></tr>
<tr height="25"><td>Keterangan</td><td><input type="text" name="keterangan" value="<?php echo$dataGet['keterangan'];?>" size="65" required=""></td></tr>
<tr height="30"><td>Fasilitas</td><td><input type="text" name="fasilitas"  value="<?php echo$dataGet['fasilitas'];?>"size="65" required=""></td></tr>

</td><td class="head-data">
<input type="submit" value="Ubah">
</td></tr>
</table>
</form>
</td></tr></table>



