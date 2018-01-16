<?php

require ('koneksi.php');

// jika ada parameter yang dilempar dari script index.php
// maka lakukan pencarian
if (isset($_GET['id_info'])) {
	$id = $_GET['id_info'];
	$sql = "SELECT * from `tbl_informasi` WHERE `view_informasi` = '".$id."'";
} else {
	// kalo ga, tampilkan semua lokasi
	$sql = "SELECT * from `tbl_informasi`";
}

$data = mysql_query($sql);
$json = '{"dbdesa": {';
$json .= '"tbl_informasi":[ ';
while($x = mysql_fetch_array($data)){
	$json .= '{';
	$json .= '"id":"'.$x['id_info'].'",
		"judul":"'.htmlspecialchars($x['nama']).'",
		"deskripsi":"'.htmlspecialchars($x['deskripsi']).'",
		"nama_desa":"'.htmlspecialchars($x['nama_desa']).'",
		"alamat":"'.htmlspecialchars($x['alamat']).'",
		"nama_kades":"'.htmlspecialchars($x['nama_kades']).'",
		"keterangan":"'.htmlspecialchars($x['keterangan']).'",
		"fasilitas":"'.htmlspecialchars($x['fasilitas']).'",
		"id_info":"'.htmlspecialchars($x['id_info']).'",
		"x":"'.$x['lat'].'",
		"y":"'.$x['lang'].'",
		
        "jenis":"'.$x['jenis'].'"
	},';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';
$json .= '}}';

echo $json;

?>
