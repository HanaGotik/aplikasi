<?php
$connect = mysql_connect('localhost', 'root', '') or die(mysql_error());
$dbselect = mysql_select_db('dbdesa');
session_start();
?>

<?php
//MESSAGE
if (!empty($_GET['message']) && $_GET['message'] == 'success') {
	echo '<h3>Berhasil menambah data!</h3>';}
if (!empty($_GET['message']) && $_GET['message'] == 'suksestambah') {
	echo '<h3>Berhasil menambah data!</h3>';
} else if (!empty($_GET['message']) && $_GET['message'] == 'suksesedit') {
	echo '<h3>Berhasil mengubah data ID : '.$_SESSION['id'].'</h3>';
} else if (!empty($_GET['message']) && $_GET['message'] == 'suksesdelete') {
	echo '<h3>Berhasil menghapus data ID : '.$_SESSION['delete'].'</h3>';
}
?>

<?php
//FORM EDIT
if (!empty($_GET['edit'])){
	$edit = $_GET['edit'];
	$query = mysql_query("select * from tbl_desa where id_desa='$edit'") or die(mysql_error());
	$data = mysql_fetch_array($query);
}
//FORM INSERT
else {
	$data['nama_desa']="";
	$data['daerah']="";
}
?>

<?php
//DELETE
if (!empty($_GET['delete'])){
$delete = $_GET['delete'];
$query = mysql_query("delete from tbl_desa where id_desa='$delete'") or die(mysql_error());
if ($query) {
	$_SESSION['delete']=$delete;
	header('location:./?message=suksesdelete');
}
}
//EDIT
if (!empty($_GET['edit'])){
if ($_SERVER['REQUEST_METHOD']=="POST"){
$id_desa = $_POST['id_desa'];
$nama_desa = $_POST['nama_desa'];
$daerah = $_POST['daerah'];

//update data di database sesuai user_id
$query = mysql_query("update tbl_desa set nama_desa='$nama_desa', daerah='$daerah' where id_desa='$id_desa'") or die(mysql_error());
if ($query) {
	$_SESSION['id_desa']=$id;
	header('location:./?message=suksesedit');
}
}
}
//INSERT
else{
if ($_SERVER['REQUEST_METHOD']=="POST"){
$id_desa = $_POST['id_desa'];
$nama_desa = $_POST['nama_desa'];
$daerah = $_POST['daerah'];
//simpan data ke database
$query = mysql_query("insert into tbl_desa values('$id_desa', '$nama_desa', '$daerah')") or die(mysql_error());
if ($query) {
	header('location:./?message=suksestambah');
}
}
}
?>

<h3>Data desa</h3>
<form method="POST">
<input type="hidden" name="id_desa" value="<?php echo $edit; ?>" />
<table border="0" cellpadding="5" cellspacing="0">
    <tbody>
    	<tr>
        	<td>ID desa</td>
        	<td>:</td>
        	<td><input <?php if (!empty($edit)){echo "disabled";} else{ echo "enabled";} ?> type="text" name="id_desa" value="<?php echo $data['id_desa'];?>" <?php $_SESSION['id_desa']=$data['id_desa'];?> maxlength="20" required="required" onkeyup="this.value=this.value.replace(/[^a-z0-9]/g, '')" autofocus/></td>
        </tr>
    	<tr>
        	<td>Nama desa</td>
        	<td>:</td>
        	<td><input type="nama_desa" name="nama_desa" value="<?php echo $data['nama_desa'];?>" required="required"/></td>
        </tr>
    	<tr>
        	<td>Daerah</td>
        	<td>:</td>
        	<td><input type="text" name="daerah" value="<?php echo $data['daerah'];?>" maxlength="100" required="required"/></td>
        </tr>
	
        <tr>
        	<td align="right" colspan="3">
			<input type="submit" value="<?php if (!empty($edit)){echo "EDIT";} else{echo "SIMPAN";}?>" class="btn btn-success"/>
			<input type="reset" value="RESET" <?php if (!empty($edit)){echo "disabled";} else{echo "enabled";}?> class="btn btn-primary"/>
			</td>
		</tr>
    </tbody>
</table>
</form>

<?php
//VIEW TABEL
?>
<table border="1" cellpadding="5" cellspacing="0" width="1000px" class="sortable">
	<thead>
    	<tr align="center" bgcolor="#7CF000">
        	<td>No.</td>
		<td>ID desa</td>
        	<td>Nama desa</td>
        	<td>Daerah</td>
        	<td>Opsi</td>
        </tr>
    </thead>
    <tbody>
    <?php 
	$query = mysql_query("select * from tbl_desa");
	$no = 1;
	while ($data = mysql_fetch_array($query)) {
	?>
    	<tr>
        	<td><?php echo $no; ?></td>
		<td><?php echo $data['id_desa']; ?></td>
        	<td><?php echo $data['nama_desa']; ?></td>
        	<td><?php echo $data['daerah']; ?></td>
            <td>
            	<a <?php if($no==1){echo "hidden";}?> href="./?page=data-desa&edit=<?php echo $data['id_desa'];?>" class="btn btn-warning btn-xs">Edit
				<?php if($no<>1){echo "  ";}?>
                <a <?php if($no==1){echo "hidden";}?> href="./?page=data-desa&delete=<?php echo $data['id_desa'];?>" class="btn btn-danger btn-xs">Hapus</a>
            </td>
        </tr>
    <?php 
		$no++;
	}
	?>
    </tbody>
</table>

<?php
mysql_close();
?>


<!-- www.inderakula.com -->