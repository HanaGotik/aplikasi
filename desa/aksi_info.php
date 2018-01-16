<?php
include"koneksi.php";

$id_info=$_POST['id_info'];
$id_desa=$_POST['id_desa'];
$nama_kades=$_POST['nama_kades'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];
$fasilitas=$_POST['fasilitas'];
$lat=$_POST['lat'];
$lang=$_POST['lang'];

$queryUpd=mysql_query("update tbl_informasi SET id_desa='$id_desa',
                      nama_kades='$nama_kades', alamat='$alamat',
                      keterangan='$keterangan', fasilitas='$fasilitas',
                      lat='$lat', lang='$lang'
                      where id_info='$id_info'");
	if($queryUpd){
		echo"<script>alert('Berhasil memperbarui Data dengan id $id_info')</script><script>location='index.php?page=info-lokasi'</script>";
	}else{
		echo"<script>alert('Gagal memperbarui $id_info')</script><script>location='edit_info.php?id_info=$id_info'</script>";
	}

?>


