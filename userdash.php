<?php

	//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

    //Starts the session if it is not already started
  	if(!isset($_SESSION)){
  		session_start();
  	}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>RescueWagon - Every Life Matters!</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <!-- Bootstrap core CSS     -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet" />

  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="assets/css/demo.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>

  <nav class="navbar navbar-expand-md bg-danger">
      <div class="container">
          <div class="navbar-translate center">
              <a class="navbar-brand" href="/"><i class="fa fa-heartbeat"></i></a>
          </div>
      </div>
  </nav>

  <div class="wrapper">
    <div class="main">
      <br>
      <div class="container">
        <!-- Tab navigation -->

        <!-- Tab panes -->
        <div class="tab-content text-center">

          <!-- Home content -->
          <div class="tab-pane active" id="home" role="tabpanel">

            <div class="container text-center">
              <div id="button-layer" class="hidden">
                <button id="btnAction" onClick="locate()">My Current Location</button>
              </div>
              <!-- Display map -->
              <div id="map-layer" class="border"></div>
              <!-- Stores location temporarily -->
              <div id="lat" class="hidden"></div>
              <div id="lon" class="hidden"></div>
              <div id="latlon" class="hidden"></div>
            </div>
            <br>
            <!-- Patient details -->
            <div class="container col-12 text-center">
              <!--<h5 class="card-title"><span id="name">Jane Faker</span></h5>
              <h6 class="card-subtitle mb-2 text-muted">Vehicle ID: <span id="vehicleId">ECHN101</span></h6>
              <br>-->
              <ul class="list-group">
                <!-- <li class="list-group-item">
                  <i class="fa fa-map-marker"></i>
                  <br><br>
                  <span class="col-12" id="location"></span>
                </li> -->
                <li class="list-group-item">
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" id="typeTitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Type of Emergency
                    </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item type">Serious Injuries</a>
                      <a class="dropdown-item type">Cardiac Arrest</a>
                      <a class="dropdown-item type">Stroke</a>
                      <a class="dropdown-item type">Respiratory</a>
                      <a class="dropdown-item type">Diabetics</a>
                      <a class="dropdown-item type">Maternal/Neonatal/Pediatric</a>
                      <a class="dropdown-item type">Epilepsy</a>
                      <a class="dropdown-item type">Unconsiousness</a>
                      <a class="dropdown-item type">Infections</a>
                      <a class="dropdown-item type">Animal Bites</a>
                      <a class="dropdown-item type">High Fever</a>
                    </div>
                    <div id="injury" class="hidden"></div>
                  </div>
                </li>

				<li class="list-group-item">
					<h6>Number of Patients</h6>
					<ul class="pagination">
									<li class="page-item col-4"><a class="page-link patients">1</a></li>
                  <li class="page-item col-4"><a class="page-link patients">2</a></li>
                  <li class="page-item col-4">
                      <a class="page-link patients">3+</a>
                  </li>
                  <div id="patientcount" class="hidden"></div>
					</ul>
				</li>
        <li class="list-group-item">
					<h6>priority</h6>
					<ul class="pagination">
									<li class="page-item col-6"><a class="page-link priority">Low</a></li>
                  <li class="page-item col-6"><a class="page-link priority">High</a></li>
                  <div id="priority" class="hidden"></div>
					</ul>
				</li>
              </ul>
              <br><br>
              <button type="button" class="btn btn-danger btn-round" id="rescue"><i class="fa fa-ambulance"></i> Rescue</button>
              <br><br><br><br>
            </div>
			<div id="notify"> </div>
			</div>
          <!-- Profile Content -->
          <div class="tab-pane" id="profile" role="tabpanel">
          </div>
          <!-- First aid content -->
          <div class="tab-pane" id="first-aid" role="tabpanel">
            <div class="container">
              <div class="row">
                <div class="col-md-8 ml-auto mr-auto">
                  <!-- Example single danger button -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Type of Emergency
                          </button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="#cardiac-arrest">Cardiac Arrest</a>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row" id="cardiac-arrest">
                <div class="col-12">
                  <div class="info">
                    <div class="icon icon-danger">
                      Cardiac Arrest
                    </div>
                    <br>
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/8bAghO3dpJA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    <!-- <div class="description">
                            <h4 class="info-title">Tips:</h4>
                            <p class="description">Spend your time generating new ideas. You don't have to think of implementing.</p>
                            <a href="#pkp" class="btn btn-link btn-danger">See more</a>
                          </div> -->
                  </div>
                </div>
              </div><br><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<!-- Core JS Files -->
<script src="assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Switches -->
<script src="assets/js/bootstrap-switch.min.js"></script>

<!--  Plugins for Slider -->
<script src="assets/js/nouislider.js"></script>

<!--  Plugins for DateTimePicker -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>

<!--  Paper Kit Initialization and functons -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>
<script>
  // Redirects to signout
  $("#signout").click(function() {
    window.location.href = "/assets/includes/signout.php";
  });
</script>

<script>
  // Maps
  var map;

  // Locates user on page load
  window.onload = function locate() {
    $("#map-layer").html("<br>Locating you...<img src='https://www.bram.us/wordpress/wp-content/uploads/2017/02/locating-animation.gif' class='col-12'>");
    document.getElementById("btnAction").disabled = true;
    document.getElementById("btnAction").innerHTML = "Processing...";
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var currentLatitude = position.coords.latitude;
        var currentLongitude = position.coords.longitude;
        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
        // Stores location in temporary id
        storePosition(currentLatitude, currentLongitude);

        // Maps the user in google maps
        map(currentLatitude, currentLongitude);

        var geocoder = new google.maps.Geocoder;
        // geocodeLatLng(geocoder, map);

      });
    }
  }

  function storePosition(lat, lon) {
    $("#lat").html(lat);
    $("#lon").html(lon);
    $("#latlon").html(lat + "," + lon);
    $("#location").html(lat + "," + lon);

      $.post("/assets/includes/updatedriverloc.php",
      {
          lat: lat,
          lon: lon
      });
  }

  function map(lat, lon) {
    map = new google.maps.Map(document.getElementById('map-layer'), {
      center: {
        lat: lat,
        lng: lon
      },
      zoom: 15
    });
    var markDriver = new google.maps.Marker({
      position: {
        lat: lat,
        lng: lon
      },
      map: map,
      icon: 'assets/img/person.png'
    });
  }

  function geocodeLatLng(geocoder, map) {
    var input = $("#latlon").html();
    var latlngStr = input.split(',', 2);
    var latlng = {
      lat: parseFloat(latlngStr[0]),
      lng: parseFloat(latlngStr[1])
    };
    geocoder.geocode({
      'location': latlng
    }, function(results, status) {
      if (status === 'OK') {
        if (results[0]) {
          $("#location").html(results[0].formatted_address);
        }
      }
    });
  }
</script>
<script>
  $(".type").click(function() {
    $("#injury").html($(this).html());
    $("#typeTitle").html($(this).html());
  });
  $(".patients").click(function() {
    $(this).addClass('active');
    $("#patientcount").html($(this).html());
  });
  $(".priority").click(function() {
    $(this).addClass('active');
    $("#priority").html($(this).html());
  });

  $("#rescue").click(function() {
      var type = $("#injury").html();
      var patients = $("#patientcount").html();
      var priority = $("#priority").html();
      var lat = $("#lat").html();
      var lon = $("#lon").html();
      // $.ajax({
      //   type: "POST",
      //   url: "/assets/includes/rescue.php",
      //   data: {type:type, patients:patients, priority:priority, lat:lat, lon:lon},
      //   success: success
      // });
      $.post('/assets/includes/rescue.php', { type: type, patients : patients, priority: priority, lat : lat, lon:lon },
          function(data){
               if(data == "success") {
                 window.location.href = "/userdriver.php";
               }
      });
  });

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1l44VLK6fd3bz91bV4IRBlnIl-7S9BW8" async defer></script>

</html>
