<?php
// panggil fungsi validasi xss dan injection
//error_reporting(E_ALL ^ (E_NOTICE | E_WARNING) ^ E_DEPRECATED);
require_once('fungsi_validasi.php');

// definisikan koneksi ke database
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "dbdesa";

// Koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

// buat variabel untuk validasi dari file fungsi_validasi.php
$val = new Lokovalidasi;
?>
