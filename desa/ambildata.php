<?php
include "koneksi.php";
$akhir = $_GET['akhir'];
if($akhir==1){
    $query = "SELECT * FROM view_informasi ORDER BY id_info DESC LIMIT 1";
}else{
    $query = "SELECT * FROM view_informasi";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id":"'.$x['id_info'].'",
		"judul":"'.htmlspecialchars($x['nama']).'",
		"deskripsi":"'.htmlspecialchars($x['deskripsi']).'",
		"alamat":"'.htmlspecialchars($x['alamat']).'",
		"nama_desa":"'.htmlspecialchars($x['nama_desa']).'",
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
