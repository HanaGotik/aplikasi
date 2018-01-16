<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING) ^ E_DEPRECATED);
	$dbhost = 'localhost'; // Isi nama hosting
	$dbuser = 'root'; // Isi Nama User MySQL
	$dbpass = ''; // Isi Password Database MySQL
	$dbname = 'dbdesa'; // Isi dengan nama Database
	
	$koneksi = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	mysql_select_db($dbname,$koneksi);
?>