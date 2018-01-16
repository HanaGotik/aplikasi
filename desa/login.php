<?php
session_start();
include 'koneksi.php';
 
if(!empty($_POST)){
     
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    $sql = "select * from tbl_pengguna where username='".$username."' and password='".$password."'";
    #echo $sql."<br/>";
    $query = mysql_query($sql) or die (mysql_error());
 
    // pengecekan query valid atau tidak
    if($query){
        $row = mysql_num_rows($query);
         
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $_SESSION['isLoggedIn']=1;
            $_SESSION['username']=$username;
            header('Location: index.php');
        }else{
            echo "<center><h1><a color='#ffffff'>"."Username atau Password salah !!!"."</a></h1></center>";
        }
    }
}
?>

    <html>
        <head><title>Sistem Informasi Geografis Fasilitas Desa di Kecamatan Pelaihari</title>
        <style type="text/css">
            body {
	background-image: url(images/fix.png);
	background-repeat: repeat-x;
        }
        #main {
width:1000px;
margin:60px auto;
font-family:raleway
}
span {
color:red
}
h2 {
background-image: url(images/garis.png);
text-align:center;
border-radius:10px 10px 0 0;
margin:-10px -40px;
padding:18px
}
h4 {
background-image: url(images/garis.png);
color: #ffffff;
text-align:center;
border-radius:0px 0px 10 10;
margin:-10px -40px;
padding:12px
}
hr {
border:0;
border-bottom:1px solid #ccc;
margin:10px -40px;
margin-bottom:30px
}
#login {
background-image: url(images/beg.png);
width:310px;
float:center;
border-radius:10px;
font-family:raleway;
border:4px solid #ccc;
padding:10px 40px 25px;
margin-top:70px
}
input[type=text],input[type=password] {
width:99.5%;
padding:10px;
margin-top:8px;
border:1px solid #ccc;
padding-left:5px;
font-size:16px;
font-family:raleway
}
input[type=submit] {
width:100%;
background-color:#049806;
color:#fff;
border:2px solid #ffffff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
input[type=submit]:hover{
width:100%;
background-color:#000000;
color:#fff;
border:2px solid #ffffff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
input[type=button] {
width:100%;
background-color:#049806;
color:#fff;
border:2px solid #ffffff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
input[type=button]:hover{
width:100%;
background-color:#000000;
color:#fff;
border:2px solid #ffffff;
padding:10px;
font-size:20px;
cursor:pointer;
border-radius:5px;
margin-bottom:15px
}
#profile {
padding:50px;
border:1px dashed grey;
font-size:20px;
background-color:#DCE6F7
}
a {
font-size:22px;
text-decoration:none;
color:#ffffff
}
i {
color:#6495ed
}
        </style>
        </head>
        <link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="tala.ico" type="image/x-icon">
        <body bgcolor="#c0c0c0"><br>
        <div id="main">
            
            <div align="center">
                
                <form name="form-login" method="POST" action="login.php">
                    
                    <div id="login">
                    <table border="0" cellpadding="0" cellspacing="0" width="310">
                        <tbody><tr bgcolor="#00ff00">
                            <td colspan="3" align="center" height="25"><font color="#ffffff"><h2>LOGIN</h2></font></td>
                        </tr>
                        <tr>
                            <td height="16" width="110"> </td>
							<td width="10"></td>
                            <td width="190"> </td>
                        </tr>
                        <tr>
                            <td align="right" height="25"><a>Username :</a></td>
							<td></td>
                            <td><input name="username" size="20" maxlength="9" type="text" placeholder="Username"></td>
                        </tr>
                        <tr>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td align="right" height="25"><a>Password :</a></td>
							<td></td>
                            <td><input name="password" size="20" type="password" placeholder="********"></td>
                        </tr>
                        <tr>
                            <td height="16"> </td>
                            <td> </td>
                        </tr>
						<tr>
							<td align="top" height="18" align="left"><a href="index.php"><input value="Cancel" type="button"></td>
							<td></td>
                            <td align="top" height="18" align="left"><input value="Sign In" type="submit"></td>
                        </tr>
                        <tr>
                            <td height="16"> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center" height="15"><h4> Copyright Mayrida © 2016 (SIG) </h4></td>
                        </tr>
                    </tbody></table>
                    </div>
                </form>
            
            </div>
            </div>
        </body>
    </html>