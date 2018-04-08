<?php
//Starts the session if it is not already started
if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['driverId'])) {
  header("Location: /");
  session_destroy();
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
              <a class="navbar-brand" href="/home.php"><i class="fa fa-heartbeat"></i></a>
          </div>
      </div>
  </nav>
  <div id="notify"></div>
  <div class="wrapper">
    <div class="main">
      <br>
      <div class="container">
        <!-- Tab navigation -->
        <div class="nav-tabs-navigation">
          <div class="nav-tabs-wrapper">
            <ul class="nav nav-tabs" role="tablist">
              <!-- Home Tab -->
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><button type="button" class="btn btn-outline-danger btn-round"><i class="fa fa-home"></i></button></a>
              </li>
              <!-- Profile Tab -->
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><button type="button" class="btn btn-outline-danger btn-round"><i class="fa fa-user"></i></button></a>
              </li>
              <!-- First Aid tab -->
              <!-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#first-aid" role="tab"><button type="button" class="btn btn-outline-danger btn-round"><i class="fa fa-medkit"></i></button></a>
              </li> -->
            </ul>
          </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content text-center">
          <!-- Home content -->
          <div class="tab-pane active" id="home" role="tabpanel">
            <div class="container text-center">
              <div id="button-layer" class="hidden">
                <button id="btnAction" onClick="locate()">My Current Location</button>
              </div>
              <h5 class="card-title">Vehicle Location</h5>
              <!-- Display map -->
              <div id="map-layer" class="border"></div>
              <!-- Stores location temporarily -->
              <div id="lat" class="hidden"></div>
              <div id="lon" class="hidden"></div>
              <div id="latlon" class="hidden"></div>
            </div>
            <br>
            <hr>
            <!-- Driver details -->
            <div class="container col-12">
              <h5 class="card-title"><span id="name"><?php echo $_SESSION['driverName']; ?></span></h5>
              <h6 class="card-subtitle mb-2 text-muted">Vehicle ID: <span id="vehicleId"><?php echo $_SESSION['vehicleId']; ?></span></h6>
              <br>
              <button type="button" class="btn btn-outline-danger btn-round" id="trip"><i class="fa fa-play-circle"></i> Start Trip</button>
              <!-- <ul class="list-group">
                <li class="list-group-item">
                  <i class="fa fa-phone float-left"></i>
                  <a href="#" class="float-right" id="phone"><?php echo $_SESSION['phone']; ?></a>
                </li>
              </ul> -->
              <br>
              <br>
              <br>
              <button type="button" class="btn btn-outline-danger btn-round pull-left edit"><i class="fa fa-cog"></i> Edit Profile</button>
              <button type="button" class="btn btn-danger btn-round pull-right" id="signout"><i class="fa fa-sign-out"></i> Sign Out</button>

            </div>
          </div>
          <!-- Profile Content -->
          <div class="tab-pane" id="profile" role="tabpanel">
            <div class="section profile-content">
                <div class="container">
                    <div class="owner">
                    </div>
    								<div class="section profile-content"></div>
    								<div class="container">
    	                <div class="row">
    	                    <div class="col-12 mr-auto text-center">
    												<div class="input-group input-group-sm mb-3">
    														<div class="input-group">
    															<span class="input-group-addon text-danger"><i class="fa fa-user"></i></span>
    																<input type="text" class="form-control" disabled id="driverName" value="<?php echo $_SESSION['driverName']; ?>" aria-describedby="driverName" name="driverName">
    														</div>
    												</div>
                            <div class="input-group input-group-sm mb-3">
    														<div class="input-group">
    															<span class="input-group-addon text-danger"><i class="fa fa-id-card-o"></i></span>
    																<input type="text" class="form-control" disabled id="driverPhone" value="<?php echo $_SESSION['driverId']; ?>" aria-describedby="driverName" name="driverPhone">
    														</div>
    												</div>
    												<div class="input-group input-group-sm mb-3">
    														<div class="input-group">
    															<span class="input-group-addon text-danger"><i class="fa fa-phone"></i></span>
    																<input type="text" class="form-control" disabled id="driverPhone" value="<?php echo $_SESSION['phone']; ?>" aria-describedby="driverName" name="driverPhone">
    														</div>
    												</div>
    												<div class="input-group input-group-sm mb-3">
    														<div class="input-group">
    															<span class="input-group-addon text-danger"><i class="fa fa-ambulance"></i></span>
    																<input type="text" class="form-control" disabled id="vehicleId" value="<?php echo $_SESSION['vehicleId']; ?>" aria-describedby="vehicleId" name="vehicleId">
    														</div>
    												</div>
    												<br></div>
    	                </div>
    								</div>
                </div>
            </div>
          </div>
          <!-- First aid content -->
          <div class="tab-pane" id="first-aid" role="tabpanel">
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
  // Redirects to edit profile
  $(".edit").click(function() {
    window.location.href = "/editprofile.php";
  });
  $("#trip").click(function() {
    window.location.href = "/driver_route.php";
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
        geocodeLatLng(geocoder, map);
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
      icon: 'assets/img/ambulance.png'
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
$(document).ready(function () {
    function showNotification() {
        $.post("/assets/includes/drivernotify.php",
        function(data, status){
          $(".notification").css("display","block");
        }
      );
      setTimeout(showNotification,1000);
    }
    showNotification();
});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1l44VLK6fd3bz91bV4IRBlnIl-7S9BW8" async defer></script>

</html>
