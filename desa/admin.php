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
	echo '<h3>Berhasil mengubah data ID : '.$_SESSION['user_id'].' dengan Username '.$_SESSION['username'].'</h3>';
} else if (!empty($_GET['message']) && $_GET['message'] == 'suksesdelete') {
	echo '<h3>Berhasil menghapus data ID : '.$_SESSION['delete'].'</h3>';
}
?>

<?php
//FORM EDIT
if (!empty($_GET['edit'])){
	$edit = $_GET['edit'];
	$query = mysql_query("select * from tbl_pengguna where user_id='$edit'") or die(mysql_error());
	$data = mysql_fetch_array($query);
}
//FORM INSERT
else {
	$data['username']="";
	$data['password']="";
	$data['email']="";
	$data['fullname']="";
	$data['no_hp']="";
}
?>

<?php
//DELETE
if (!empty($_GET['delete'])){
$delete = $_GET['delete'];
$query = mysql_query("delete from tbl_pengguna where user_id='$delete'") or die(mysql_error());
if ($query) {
	$_SESSION['delete']=$delete;
	header('location:./?message=suksesdelete');
}
}
//EDIT
if (!empty($_GET['edit'])){
if ($_SERVER['REQUEST_METHOD']=="POST"){
$id = $_POST['user_id'];
$password = $_POST['password'];
$email = $_POST['email'];
$fullname = $_POST['fullname'];
$agama = $_POST['agama'];
$no_hp = $_POST['no_hp'];
//update data di database sesuai user_id
$query = mysql_query("update tbl_pengguna set password='$password', email='$email', fullname='$fullname', agama='$agama', no_hp='$no_hp' where user_id='$id'") or die(mysql_error());
if ($query) {
	$_SESSION['user_id']=$id;
	header('location:./?message=suksesedit');
}
}
}
//INSERT
else{
if ($_SERVER['REQUEST_METHOD']=="POST"){
$username = $_POST['username'];
$password = $_POST['password'];
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$agama = $_POST['agama'];
$no_hp = $_POST['no_hp'];
//simpan data ke database
$query = mysql_query("insert into tbl_pengguna values('', '$username', '$password', '$email', '$fullname', '$agama', '$no_hp')") or die(mysql_error());
if ($query) {
	header('location:./?message=suksestambah');
}
}
}
?>

<h3>Data Admin</h3>
<form method="POST">
<input type="hidden" name="user_id" value="<?php echo $edit; ?>" />
<table border="0" cellpadding="5" cellspacing="0">
    <tbody>
    	<tr>
        	<td>Username</td>
        	<td>:</td>
        	<td><input <?php if (!empty($edit)){echo "disabled";} else{ echo "enabled";} ?> type="text" name="username" value="<?php echo $data['username'];?>" <?php $_SESSION['username']=$data['username'];?> maxlength="20" required="required" onkeyup="this.value=this.value.replace(/[^a-z0-9]/g, '')" autofocus/></td>
        </tr>
    	<tr>
        	<td>Password</td>
        	<td>:</td>
        	<td><input type="password" name="password" value="<?php echo $data['password'];?>" maxlength="20" required="required" /></td>
        </tr>
    	<tr>
        	<td>Email</td>
        	<td>:</td>
        	<td><input type="email" name="email" value="<?php echo $data['email'];?>" required="required" onkeyup="this.value=this.value.replace(/[^0-9a-z-_.@]/g, '')"/></td>
        </tr>
    	<tr>
        	<td>Nama Lengkap</td>
        	<td>:</td>
        	<td><input type="text" name="fullname" value="<?php echo $data['fullname'];?>" maxlength="100" required="required" onkeyup="this.value=this.value.replace(/[^A-Za-z ]/g, '')"/></td>
        </tr>
    	<tr>
        	<td>Agama</td>
        	<td>:</td>
			<td>
			<select name="agama">
			<?php $option = $data['agama']; ?>
				<option value="Islam"<?php if ($option=="Islam" or empty($option)){echo 'selected';}?>>Islam</option>
				<option value="Kristen"<?php if ($option=="Kristen"){echo 'selected';}?>>Kristen</option>
				<option value="Budha"<?php if ($option=="Budha"){echo 'selected';}?>>Budha</option>
				<option value="Hindu"<?php if ($option=="Hindu"){echo 'selected';}?>>Hindu</option>
			</select>
			</td>
        </tr>
    	<tr>
        	<td>Nomor HP</td>
        	<td>:</td>
        	<td><input type="text" name="no_hp" value="<?php echo $data['no_hp'];?>" maxlength="14" required="required" onkeyup="this.value=this.value.replace(/[^0-9]/g, '')" /></td>
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
		<td>ID</td>
        	<td>Username</td>
        	<td>Email</td>
        	<td>Nama Lengkap</td>
        	<td>Agama</td>
        	<td>No. HP</td>
        	<td>Opsi</td>
        </tr>
    </thead>
    <tbody>
    <?php 
	$query = mysql_query("select * from tbl_pengguna");
	$no = 1;
	while ($data = mysql_fetch_array($query)) {
	?>
    	<tr>
        	<td><?php echo $no; ?></td>
		<td><?php echo $data['user_id']; ?></td>
        	<td><?php echo $data['username']; ?></td>
        	<td><?php echo $data['email']; ?></td>
        	<td><?php echo $data['fullname']; ?></td>
        	<td><?php echo $data['agama']; ?></td>
        	<td><?php echo $data['no_hp']; ?></td>
            <td>
            	<a <?php if($no==1){echo "hidden";}?> href="./?page=admin&edit=<?php echo $data['user_id'];?>" class="btn btn-warning btn-xs">Edit
				<?php if($no<>1){echo "  ";}?>
                <a <?php if($no==1){echo "hidden";}?> href="./?page=admin&delete=<?php echo $data['user_id'].' dengan Username '.$data['username'];?>" class="btn btn-danger btn-xs">Hapus</a>
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