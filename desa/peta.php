
<?php
if(isset($_GET['mode'])=='delete'){
	 $id_info=$_GET['id_info'];
	 mysql_query("delete from tbl_informasi where id_info='$id_info'");
	 
	 ?><script language="javascript">document.location.href="?page=info-lokasi"</script><?php
}
?>
<link rel="stylesheet" type="text/css" media="all" href="jsDatePick_ltr.min.css" />
<script type="text/javascript" src="jsDatePick.min.1.3.js"></script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9atv3GsUg30N7F9UXk6BdO1XpXHX2yG8"></script>
<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
//google maps GIS 1.1.b by politala
//dibuat tanggal 8 Jan 2011
var peta;
var pertama = 0;
var jenis = "Balai Desa";
var judulx = new Array();
var desx = new Array();
var desax = new Array();
var id_infox = new Array();

var alamatx = new Array();
var nama_kadesx = new Array();
var keteranganx = new Array();
var fasilitasx = new Array();

var koorx = new Array();
var koory = new Array();

var i;
var url;
var gambar_tanda;
function peta_awal(){
    var pelaihari = new google.maps.LatLng(-3.796474236507656, 114.78438377380371);
    var petaoption = {
        zoom: 13,
        center: pelaihari,
        mapTypeId: google.maps.MapTypeId.ROADMAP
        };
    peta = new google.maps.Map(document.getElementById("petaku"),petaoption);
    google.maps.event.addListener(peta,'click',function(event){
        kasihtanda(event.latLng);
    });
    ambildatabase('awal');
	
	/*untuk tgl*/
	new JsDatePick({
		useMode:2,
		target:"tgl",
		dateFormat:"%Y-%m-%d"
	});
}
//untuk simpan data
$(document).ready(function(){
    $("#tombol_simpan").click(function(){
        var x = $("#x").val();
        var y = $("#y").val();
        var judul = $("#judul").val();
        var des = $("#deskripsi").val();
		
		var id_info = $("#id_info").val();
		var id_desa = $("#id_desa").val();
		
		var alamat = $("#alamat").val();
		var nama_kades = $("#nama_kades").val();
		var keterangan = $("#keterangan").val();
		var fasilitas = $("#fasilitas").val();
		
        $("#loading").show();
        $.ajax({
            url: "simpanlokasi.php",
            data: "x="+x+"&y="+y+"&jenis="+jenis+"&id_info="+id_info+"&id_desa="+id_desa+"&alamat="+alamat+"&nama_kades="+nama_kades+"&keterangan="+keterangan+"&fasilitas="+fasilitas,
            cache: false,
            success: function(msg){
                alert(msg);
                $("#loading").hide();
                $("#x").val("");
                $("#y").val("");
				$("#id_info").val("");
				$("#alamat").val("");
				$("#nama_kades").val("");
				$("#keterangan").val("");
				$("#fasilitas").val("");
                ambildatabase('akhir');
				document.location.href='?page=info-lokasi';
            }
        });
    });
    $("#tutup").click(function(){
        $("#jendelainfo").fadeOut();
    });
});

//untuk klik tanda lokasi
function kasihtanda(lokasi){
    set_icon(jenis);
    tanda = new google.maps.Marker({
            position: lokasi,
            map: peta,
            icon: gambar_tanda
    });
    $("#x").val(lokasi.lat());
    $("#y").val(lokasi.lng());

}

//untuk icon lokasi
function set_icon(jenisnya){
    switch(jenisnya){
        case "Balai Desa":
            gambar_tanda = 'icon/desa.png';
            break;
			case "TPA":
            gambar_tanda = 'icon/TPA.png';
            break;
			case "Masjid":
            gambar_tanda = 'icon/masjid.png'; 
            break;
			case "Penyedia Air Bersih":
            gambar_tanda = 'icon/airbersih.png';
            break;
			case "Balai Penyuluhan":
            gambar_tanda = 'icon/balaipenyuluhan.png'; 
            break;
			case "Simpan Pinjam":
            gambar_tanda = 'icon/simpanpinjam.png'; 
            break;
    }
}

//untuk memanggil database
function ambildatabase(akhir){
    if(akhir=="akhir"){
        url = "ambildata.php?akhir=1";
    }else{
        url = "ambildata.php?akhir=0";
    }
    $.ajax({
        url: url,
        dataType: 'json',
        cache: false,
        success: function(msg){
            for(i=0;i<msg.wilayah.petak.length;i++){
                judulx[i] = msg.wilayah.petak[i].judul;
                desx[i] = msg.wilayah.petak[i].deskripsi;
				desax[i] = msg.wilayah.petak[i].nama_desa;
				id_infox[i] = msg.wilayah.petak[i].id_info;
				alamatx[i] = msg.wilayah.petak[i].alamat;
				nama_kadesx[i] = msg.wilayah.petak[i].nama_kades;
				keteranganx[i] = msg.wilayah.petak[i].keterangan;
				fasilitasx[i] = msg.wilayah.petak[i].fasilitas;
				
				koorx[i] = msg.wilayah.petak[i].x;
				koory[i] = msg.wilayah.petak[i].y;
				
                set_icon(msg.wilayah.petak[i].jenis);
                var point = new google.maps.LatLng(
                    parseFloat(msg.wilayah.petak[i].x),
                    parseFloat(msg.wilayah.petak[i].y));
                tanda = new google.maps.Marker({
                    position: point,
                    map: peta,
                    icon: gambar_tanda
                });
                setinfo(tanda,i);

            }
        }
    });
}

//untuk menyamakan jenis
function setjenis(jns){
    jenis = jns;
}

//untuk memunculkan keterangan
function setinfo(petak, nomor){
    google.maps.event.addListener(petak, 'click', function() {
        $("#jendelainfo").fadeIn();
        $("#teksjudul").html(judulx[nomor]);
        $("#teksdes").html(desx[nomor]);
		$("#teksdesa").html(desax[nomor]);
		$("#teksid_info").html(id_infox[nomor]);
		$("#teksalamat").html(alamatx[nomor]);
		$("#teksnama_kades").html(nama_kadesx[nomor]);
		$("#teksketerangan").html(keteranganx[nomor]);
		$("#teksfasilitas").html(fasilitasx[nomor]);
		
		$("#tekskoorx").html(koorx[nomor]);
		$("#tekskoory").html(koory[nomor]);
    });
}
</script>


<style>
#jendelainfo{position:absolute;z-index:1000;top:200;
left:600;background-color:yellow;display:none;}

</style>
</head>
<body onload="peta_awal()">
<center>
	 
<table id="jendelainfo" border="0" cellpadding="4" cellspacing="0" style="border-collapse: collapse" bordercolor="#FFCC00" height="140">
  <tr>
    <td width="248" bgcolor="#000000" height="19"><font color=white>ID Info: <span id="teksid_info"></span></font></td>
    <td width="30" bgcolor="#000000" height="19">
    <p align="center"><font color="#FFFFFF"><a style="cursor:pointer" id="tutup"><b>X</b></a></font></td>
  </tr>
  <tr>
    <td bgcolor="#FFCC00" valign="top" colspan="2"> 
        Nama Desa : <span id="teksdesa"></span><br>
	Nama Kepala Desa : <span id="teksnama_kades"></span><br>
	Alamat : <span id="teksalamat"></span><br>
	Keterangan : <span id="teksketerangan"></span><br>
	Fasilitas : <span id="teksfasilitas"></span><br>
	
	Koor X : <span id="tekskoorx"></span><br>
	Koor Y : <span id="tekskoory"></span><br>
	</td>
  </tr>
</table>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>



<table border=0>
<tr><td width="770">
<div id="petaku" style="width:770px; height:700px"></div>
</tr>
</td>
</table>

</body>
</html>


<br>
<?php
	$entries=10;
	$query=mysql_query("select * from view_informasi"); //input
	$get_pages=mysql_num_rows($query);
	
	if ($get_pages>$entries)  //proses
	{
		$jumlah_halaman=ceil($get_pages/$entries);
		$halaman_aktif=$_GET['id'];
		
		//untuk prev
		if(($halaman_aktif)>0){
			$prev=$halaman_aktif-1;
			?><a href="?page=info-lokasi&id=<?php  echo $prev; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900"> &laquo;Prev&nbsp;&nbsp;</font></a><?php 
		}
		
		//echo "Halaman : ";
		$pages=1;
		while($pages<=ceil($get_pages/$entries))
		{
			
			//untuk menandai halaman yang aktif
			if (($pages-1)==$halaman_aktif){
				$font="<font size='2' face='verdana' color='red'>";
			}else{
				$font="<font size='2' face='verdana' color='#009900'>";
			}
		?>
			
		<?php 
				$pages++;
		}
	}else{
		$pages=0;
	}
	
	//untuk next
	if($halaman_aktif<$jumlah_halaman){
		$next=$halaman_aktif+1;
		?>&nbsp;&nbsp;<a href="?page=info-lokasi&id=<?php  echo $next; ?> " style="text-decoration:none"><font size="2" face="verdana" color="#009900">Next&raquo;</font></a><?php 
	}
	
	//proses halaman
	$page=(int)$_GET['id'];
	$offset=$page*$entries;
	$result=mysql_query("select * from view_informasi order by id_info asc limit $offset,$entries"); //output
	$jumlah=mysql_num_rows($query);
	
	//akhir paging
	echo "</center>";

	if ($jumlah){
	?>

		<div style='overflow-y:scroll;overflow-x:scroll;width:1100px;height:600px;padding:20px;scroll-color:hidden;'>
		<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
		<thead>
			<tr>
				<th><h3>Nomor</h3></th>
				<th><h3>ID Desa</h3></th>
				<th><h3>Nama Desa</h3></th>
				<th><h3>Nama Kepala Desa</h3></th>
				<th><h3>Alamat</h3></th>
				<th><h3>Keterangan</h3></th>
				<th><h3>Fasilitas</h3></th>
				<th><h3>Jenis</h3></th>
				<th><h3>Koord X</h3></th>
				<th><h3>Koord Y</h3></th>
					<th><h3>Lihat MAP</h3></th>
			</tr>
		</thead>
		<tbody>
		 <?php
			//$query=mysql_query("SELECT * FROM view_informasi");					

		
			while($row=mysql_fetch_assoc($result)){
				?>
				<tr>
					<td><?php echo $d=$d+1;?></td>
					<td><?php echo $row['id_info'];?></td>
					<td><?php echo $row['nama_desa'];?></td>
					<td><?php echo $row['nama_kades'];?></td>
					<td><?php echo $row['alamat'];?></td>
					<td><?php echo $row['keterangan'];?></td>
					<td><?php echo $row['fasilitas'];?></td>
					<td><?php echo $row['jenis'];?></td>
					<td><?php echo $row['lat'];?></td>
					<td><?php echo $row['lang'];?></td> 
			<td><a href = "http://localhost/geo/geo.php?id_info=<?php echo $row['id_info'];?>" >Lihat MAP</a></td>
		</tr>
				<?php
			}
		?>
		</tbody>
		</table>
		</div>
		<center>Jumlah Data : <?php echo $jumlah;?></center>
		<script type="text/javascript" src="script.js"></script>
		<script type="text/javascript">
			var sorter = new TINY.table.sorter("sorter");
			sorter.head = "head";
			sorter.asc = "asc";
			sorter.desc = "desc";
			sorter.even = "evenrow";
			sorter.odd = "oddrow";
			sorter.evensel = "evenselected";
			sorter.oddsel = "oddselected";
			sorter.paginate = true;
			sorter.currentid = "currentpage";
			sorter.limitid = "pagelimit";
			sorter.init("table",0);
		</script>

<?php 	
}else{
	?><p><center><font color="#FF0000" face="verdana" size="2"><b>Belum ada data!!</b></font></center><br /><?php 
}
?>