<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
$username = $_SESSION['username'];
$isLoggedIn = $_SESSION['isLoggedIn'];
 
if($isLoggedIn != '1'){
    session_destroy();
    header('Location: index_2.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistem Informasi Geografis Potensi Desa</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
	<script src="./lib/jquery.min.js"></script>
	<script src="./lib/highcharts.js"></script>
	<script src="./lib/modules/exporting.js"></script>
	
	<link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="tala.ico" type="image/x-icon">
		
	<?php include "koneksi.php";?>
	
</head>

<body backgroundcolor="green">
      <tr>
        <td align="center" valign="top">
            <div style="float:left; width:1350px;">
              <div style="float:left; width:1370px;"><img src="images/header_mayrida2.jpg" alt="" width="1370" height="172" border="0" usemap="#Map" /></div>
              <table width="780" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td align="left" valign="top"><table width="790" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" style="background-image:url(images/index_02.gif); background-repeat:repeat-x; padding-top:3px;"><table width="1370" border="0" cellspacing="0" cellpadding="0">
          <tr>
            
			<td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=home">Home</a></td>
              </tr>
              <tr>
                <td align="center" valign="top" ><a href="?page=home"><img src="images/home1.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>
			
			<td width="2" align="center" valign="top"><img src="images/index_05.gif" alt="" width="2" height="60" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=admin">Managemen Admin</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=admin"><img src="images/manajemenadmin.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>

			<td width="2" align="center" valign="top"><img src="images/index_05.gif" alt="" width="2" height="60" /></td>
            <td width="130" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=data-desa">Data Desa</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=data-desa"><img src="images/kelurahan.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>
			

						
            <td width="2" align="center" valign="top"><img src="images/index_05.gif" alt="" width="2" height="60" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=info-lokasi">Info Lokasi</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=info-lokasi"><img src="images/infolokasi.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>
		
			
			<td width="2" align="center" valign="top"><img src="images/index_05.gif" alt="" width="2" height="60" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=peta">Peta</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=peta"><img src="images/peta.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>
			
			<td width="2" align="center" valign="top"><img src="images/index_05.gif" alt="" width="2" height="60" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="?page=cari">pencarian Data</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="?page=cari"><img src="images/data-pencarian.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>
	    <td width="2" align="center" valign="top"><img src="images/index_05.gif" alt="" width="2" height="60" /></td>
            <td width="130" align="center" valign="middle">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="center" valign="top" class="menu"><a href="logout.php">Log Out</a></td>
              </tr>
              <tr>
                <td align="center" valign="top"><a href="logout.php"><img src="images/logout.png" width="24" height="24" alt="" /></a></td>
              </tr>
            </table>
			</td>
			            
          </tr>
        </table></td>
      </tr>
            </div> 
          </td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" valign="top" style="padding-top:36px;"><table width="780" height="272" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="780" height="160" align="center" valign="top">
		
		<!--content web-->
		<?php
		$pg = htmlentities($_GET['page']);	
		$file ="$pg.php";
		if (!file_exists($file)) {
			include ("home.php");
		}else if($pg=="" || $pg=="home"){
			include ("home.php");
		}else{
			include ("$pg.php");
		}
		?>
		
		</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-top:10px;"><table width="1370"  border="0" cellspacing="0" cellpadding="0" style="background-image:url(images/index_66.gif); background-repeat:repeat-x;">
      <tr>
        <td align="center" valign="middle"><pre class="footer"></pre></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="copyright">Copyright Mayrida © 2016 Sistem Informasi Geografis fasilitas desa Kab. Tanah Laut. All rights reserved </td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>

<iframe width=174 height=189 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">

