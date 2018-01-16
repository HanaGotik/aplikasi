<?php
include "koneksi.php";

$x = $_GET['x'];
$y = $_GET['y'];
$judul = $_GET['judul'];
$des = $_GET['des'];
$jenis  = $_GET['jenis'];

$id_info  = $_GET['id_info'];
$id_desa  = $_GET['id_desa'];
$nama_kades  = $_GET['nama_kades'];
$alamat  = $_GET['alamat'];
$keterangan  = $_GET['keterangan'];
$fasilitas = $_GET['fasilitas'];


$masuk = mysql_query("insert into tbl_informasi(id_info,nama_kades,alamat,keterangan,fasilitas,id_desa,jenis,lat,lang)
values('$id_info','$nama_kades','$alamat','$keterangan','$fasilitas','$id_desa','$jenis',$x,$y)");

if($masuk){
    //move_uploaded_file($_FILES['foto']['tmp_name'], "foto/".$_FILES['foto']['name']);
    echo "Berhasil Menyimpan Data";
}else{
    echo "Gagal : ".mysql_error();
}
?>
