	<h3>Edit data</h3>
 
	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query_mysql = mysql_query("SELECT * FROM tbl_informasi WHERE id='$id'")or die(mysql_error());
	$nomor = 1;
	while($data = mysql_fetch_array($query_mysql)){
	?>
	<form action="edit.php" method="post">		
		<table>
					<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                        <input type="hidden" name="id" value="<?php echo $data['id_info'] ?>">
			    
			Kecamatan : <br>
                                <select name="id_camat" id="id_camat">
                                <?php 
                                $query=mysql_query("select * from tbl_camat order by nama_camat asc");
                                
                                while($row=mysql_fetch_array($query))
                                {
                                        ?><option value="<?php  echo $row['id_camat']; ?>"><?php  echo $row['nama_camat']; ?></option><?php 
                                }
                                ?>
                                </select>
                                <br><br>
                                Izin : <br>
                                <select name="id_izin" id="id_izin">
                                <?php 
                                $query2=mysql_query("select * from tbl_izin order by nama_izin asc");
                                
                                while($row2=mysql_fetch_array($query2))
                                {
                                        ?><option value="<?php  echo $row2['id_izin']; ?>"><?php  echo $row2['nama_izin']; ?></option><?php 
                                }
                                ?>
                                </select>
                                <br><br>
                                Jumlah :<br>
                                <input type=text name="jumlah" id="jumlah" size=10 value="<?php echo $data['jumlah'] ?>"><p>
                                Alamat :<br>
                                <input type=text name="alamat" id="alamat" size=35 value="<?php echo $data['alamat'] ?>"><p>
                                Nama :<br>
                                <input type=text name="nama" id="nama" size=30 value="<?php echo $data['nama'] ?>"><p>
                                Usaha :<br>
                                <input type=text name="usaha" id="usaha" size=30 value="<?php echo $data['usaha'] ?>"><p>
                                No Sertifikat :<br>
                                <input type=text name="no_sertifikat" id="no_sertifikat" size=30 value="<?php echo $data['no_sertifikat'] ?>"><p>
                                No Izin :<br>
                                <input type=text name="no_izin" id="no_izin" size=30 value="<?php echo $data['no_izin'] ?>"><p>
                                Bentuk :<br>
                                <input type=text name="bentuk" id="bentuk" size=20 value="<?php echo $data['bentuk'] ?>"><p>
                                <iframe name="upload-frame" id="upload-frame" style="display:none;"></iframe>  
                                <form name="formupload" method="post" enctype="multipart/form-data" action="upload.php" target="upload-frame" onsubmit="startUpload();">  
                                Foto :<br>
                                <input type=file name="foto" id="foto" size=20><input type="submit" name="upload" value="Upload"><p>
                                Tanggal : <br>
                                <input type="text" name="tgl" id="tgl" size="12" value="<?php echo $data['tgl'] ?>">
                                <br><br>
			<tr>
				<td></td>
				<td><input type="submit" value="Simpan"></td>					
			</tr>				
		</table>
	</form>
	<?php } ?>