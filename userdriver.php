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

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
<div id="notify"><div class="alert alert-success bg-dark fixed-bottom"><div class="container text-center"><span id="notification"><br>Contacting Driver...</span><br><br></div></div></div>
  <div class="wrapper">
    <div class="main">
      <br>
      <br>
      <div class="container text-center">
        <div id="button-layer" class="hidden">
          <button id="btnAction" onClick="locate()">My Current Location</button>
        </div>
        <!-- Stores location temporarily -->
        <div id="lat" class="hidden"></div>
        <div id="lon" class="hidden"></div>
        <div id="latlon" class="hidden"></div>
			<div class="card text-white bg-dark mb-3 text-center col">
  <div class="card-header"><h3><strong>Ambulance Details</strong></h3></div>

  <!-- Display map -->
  <div id="map-layer"></div>
  <br><br>
  <div class="card-body">
				<p class="card-text"><span class="float-left" id="distance" style="font-size:20px;"><b>Distance:</span></span><span id="dist" class="float-right" style="font-size:20px;"></span>
						<br><br>
						<span class="float-left" id="eta" style="font-size:20px;">ETA:</b></span><span id="time" class="float-right" style="font-size:20px;"></span>
						<br><br>
            <div id="driverlat"></div>
            <div id="driverlon"></div>
				</p>
			</div>
      <a href="tel:8973077187"><button type="button" class="btn btn-danger btn-round col-6"><i class="fa fa-phone"></i> Call Driver</button></a>
      <br>
		</div>
						<br><br>
        </div>
        <br>
        <div class="container text-center">
          <button type="button" class="btn btn-outline-danger btn-round" id="home"><i class="fa fa-home"></i>Home</button>
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

<script type="text/javascript">


  // Maps
  var map;

  // Locates user on page load
  window.onload = function locate() {
    $("#map-layer").html("<img src='https://www.bram.us/wordpress/wp-content/uploads/2017/02/locating-animation.gif' class='col-12'>");
    document.getElementById("btnAction").disabled = true;
    document.getElementById("btnAction").innerHTML = "Processing...";
    if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var currentLatitude = position.coords.latitude;
        var currentLongitude = position.coords.longitude;
        // Stores location in temporary id
        storePosition(currentLatitude, currentLongitude);

        // Maps the user in google maps
        map(currentLatitude, currentLongitude);
        calcDistance();
      });
    }
  }

  function storePosition(lat, lon) {
    $("#lat").html(lat);
    $("#lon").html(lon);
  }

  function map(lat, lon) {
    map = new google.maps.Map(document.getElementById('map-layer'), {
      center: {
        lat: 28.536312,
        lng: 77.349458
      },
      zoom: 13
    });
    var markUser = new google.maps.Marker({
      position: {
        lat: lat,
        lng: lon
      },
      map: map,
      icon: '/assets/img/person.png'
    });
    var markDriver = new google.maps.Marker({
      position: {
        lat: 28.536312,
        lng: 77.349458
      },
      map: map,
      icon: '/assets/img/ambulance.png'
    });
  }

function calcDistance(){
  var lat = $("#lat").html();
  var lon = $("#lon").html();
  var origin = new google.maps.LatLng(28.536312, 77.349458);
  var destination = new google.maps.LatLng(lat, lon);

  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
      origins: [origin],
      destinations: [destination],
      travelMode: 'DRIVING',
      unitSystem: google.maps.UnitSystem.METRIC,
      avoidHighways: false,
      avoidTolls: false,
    }, function callback(response, status) {
    if (status == 'OK') {
      var origins = response.originAddresses;
      var destinations = response.destinationAddresses;

      for (var i = 0; i < origins.length; i++) {
        var results = response.rows[i].elements;
        for (var j = 0; j < results.length; j++) {
          var element = results[j];
          var distance = element.distance.text;
          var duration = element.duration.text;
          var from = origins[i];
          var to = destinations[j];

          $("#dist").html(distance);
          $("#time").html(duration);

          }
        }
      }
    });

    $("#notify").css("display","none");
}

</script>
<script>

  $("#home").click(function() {
    window.location.href = "/";
  });
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1l44VLK6fd3bz91bV4IRBlnIl-7S9BW8">
</script>

</html>
