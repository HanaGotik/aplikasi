<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Rute</title>
            <link rel="stylesheet" href="jqm/themes/azis.css" />
	    <link rel="shortcut icon" href="4.ico" type="image/x-icon">
        <link rel="stylesheet" href="jqm/themes/jquery.mobile.icons.min.css" />
        <link href="jqm/jquery.mobile.structure-1.4.5.min.css" rel="stylesheet">
        <script src="jqm/jquery.js" type="text/javascript"></script>
        <script src="jqm/jquery.mobile-1.4.5.js" type="text/javascript"></script>
	<script id="panel-init">
            $(function() {
            $("body>[data-role='panel']" ).panel().enhanceWithin(); 
            });
        </script>
        <style>
        .ui-panel-inner{
            padding: 0 !important;
        }
        </style>
    <!-- load library place untuk geocoder autocomplete dan kita set bahasanya ke bahasa indonesia -->
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=places&language=id"></script>
    <script src="jquery.js"></script>
    <script>
    var dest;
    var directionsDisplay;

    // memanggil service Google Maps Direction
	var directionsService = new google.maps.DirectionsService();
	directionsDisplay = new google.maps.DirectionsRenderer();

    $(document).ready(function() {
        var myOptions = {
            zoom: 13,
            center: new google.maps.LatLng(-3.7899475,114.7466419),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // posisi awal ketika halaman pertama kali dimuat
        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

        // memanggil fungsi geocoder autocomplete
        var autocomplete = new google.maps.places.Autocomplete((document.getElementById('dest')),{ types: ['geocode'] });
    	
    	/*	
    		fungsi geolocation pada geocoder ini sangat penting
    		agar pencarian daerah tujuan pada textbox ga ngaco 
    	*/
    	if (navigator.geolocation) {
        	navigator.geolocation.getCurrentPosition(function(position) {
            	var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            	autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,geolocation));
        	});
    	}

	});

	$(document).ready(function() {
		// ketika tombol cari di klik, maka proses pencarian rute dimulai
		$("#cari").click(function(){


			var defaultLatLng = new google.maps.LatLng(-3.7899475,114.7466419);

			/*	
				nah, pada fungsi geolocation disini adalah
				ketika koordinat user berhasil didapat maka peta koordinat yang digunakan
				adalah koordinat user, namun jika tidak berhasil maka koordinat yang digunakan
				adalah koordinat default (pada variable defaultLatLng)
			*/
		    if (navigator.geolocation) {
		        function success(pos) {
		            drawMap(pos.coords.latitude,pos.coords.longitude);
		        }

		        function fail(error) {
		            drawMap(defaultLatLng);
		        }
		        
		        navigator.geolocation.getCurrentPosition(success, fail, { maximumAge: 500000, enableHighAccuracy:true, timeout: 6000 });

		    } else {
		        drawMap(defaultLatLng);  
		    }

		    function drawMap(lat,lng) {

		        var myOptions = {
		            zoom: 13,
		            center: new google.maps.LatLng(lat,lng),
		            mapTypeId: google.maps.MapTypeId.ROADMAP
		        };

		        var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

		        // kita bikin marker untuk asal dengan koordinat user hasil dari geolocation
		        var markerorigin = new google.maps.Marker({
	                position: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
	                map: map,
	                title: "Origin",
	                visible:false // kita ga perlu menampilkan markernya, jadi visibilitasnya kita set false
				});
			<?php
                            include "koneksi.php";
			    $id_info =$_GET['id_info'];
                            $view=mysql_query("SELECT * FROM tbl_informasi where id_info='$id_info'");
                            $row=mysql_fetch_array($view)
                        ?>
			    var lokasi = new google.maps.LatLng(<?php echo $row['lat']; ?>,<?php echo $row['lang']; ?>)
		        // membuat request ke Direction Service
		        var request = {
				    origin: markerorigin.getPosition(), // untuk daerah asal, kita ambil posisi user
				    destination: lokasi, // untuk daerah tujuan, kita ambil value dari textbox tujuan
				    provideRouteAlternatives:true, // set true, karena kita ingin menampilkan rute alternatif

				    /**
				     * kamu bisa tambahkan opsi yang lain seperti
				     * avoidHighways:true (set true untuk menghindari jalan raya, set false untuk menonantifkan opsi ini)
				     * atau kamu bisa juga menambahkan opsi seperti
				     * avoidTolls:true (set true untuk menghindari jalan tol, set false untuk menonantifkan opsi ini)
				     */
				    travelMode: google.maps.TravelMode.DRIVING // set mode DRIVING (mode berkendara / kendaraan pribadi)
				    /**
				     * kamu bisa ganti dengan 
				     * google.maps.TravelMode.BICYCLING (mode bersepeda)
				     * google.maps.TravelMode.WALKING (mode berjalan)
				     * google.maps.TravelMode.TRANSIT (mode kendaraan / transportasi umum)
				     */
				};


				directionsService.route(request, function(response, status) {
				    if (status == google.maps.DirectionsStatus.OK) {
				      directionsDisplay.setDirections(response); 
				    }
			  	});
				// menampiklkan rute pada peta dan juga direction panel sebagai petunjuk text
			  	directionsDisplay.setMap(map);
		  		directionsDisplay.setPanel(document.getElementById('directions-panel'));
		  		
		  		// menampilkan layer traffic atau lalu-lintas pada peta
		  		var trafficLayer = new google.maps.TrafficLayer();
  				trafficLayer.setMap(map);

		    }
		});
	});
    </script>
  </head>
  <body>
    <!--<div data-role="page">
                <div data-role="header" data-position="fixed">
                <a href="#menu" data-icon="bars" class="ui-btn-left">Menu</a>
                <h1>Detail</h1>
                <a href="http://localhost/indekos/cari_kos.php" data-icon="search" class="ui-btn-right">Cari</a>
                <div data-role="navbar">
                    <ul>
			<li><a href="http://localhost/indekos/index.php" data-icon="home">Home</a></li>
                        <li><a href="http://localhost/indekos/kategori.php" data-icon="tag">Kategori</a></li>
                        <li><a href="http://localhost/indekos/berdasarkan_kecamatan.php" data-icon="location">Kecamatan</a></li>
			<li><a href="http://localhost/indekos/berdasarkan_harga.php" data-icon="heart">Harga</a></li>
                    </ul>
                </div>
            </div>-->
	    <div data-role="main" class="ui-content">
  	    <button type="button" id="cari" class="ui-btn ui-corner-all ui-btn-inline ui-icon-navigation ui-btn-icon-left ui-nodisc-icon ui-alt-icon">Tampilkan Rute</button>
	    <div id="map-canvas" style=" height:400px;"></div>
	    <div id="directions-panel"></div>
	     </div>
	   <!-- <div data-role="footer" data-position="fixed">
                <h1>Copyright © 2015 Kabupaten Tanah Laut.</h1>
            </div>-->
            <!--<div data-role="panel" id="menu" data-display="push" data-theme="a">
                <div data-role="header">
                    <h1>Menu</h1>
                </div>
                <div data-role="main" class="ui-content">
                    <ul data-role="listview">
                        <li data-icon="user"><a href="http://localhost/indekos/masuk_atau_daftar.php">Login</a></li>
                        <li data-icon="info"><a href="#bantuan">Bantuan</a></li>
                    </ul>
                </div>-->
    </div>
  </body>
</html>