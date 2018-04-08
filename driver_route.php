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

<body onload="locate()">

  <nav class="navbar navbar-expand-md bg-danger">
      <div class="container">
          <div class="navbar-translate center">
              <a class="navbar-brand" href="/dash.php"><i class="fa fa-heartbeat"></i></a>
          </div>
      </div>
  </nav>

  <div class="wrapper">
    <div class="main">
      <br>
      <div class="container">

        <!-- Tab panes -->
        <div class="tab-content text-center">
          <!-- Home content -->
          <div class="tab-pane active" id="home" role="tabpanel">
            <div class="container text-center">
              <div id="button-layer" class="hidden">
                <button id="btnAction" onClick="locate()">My Current Location</button>
              </div>
              <h5 class="card-title">Trip Tracking</h5>
              <!-- Display map -->
              <div id="map"></div>
			           <div id="warnings-panel"></div>
              <!-- Stores location temporarily -->
              <div id="lat" class="hidden"></div>
              <div id="lon" class="hidden"></div>
              <div id="latlon" class="hidden"></div>
            </div>
            <br>
            <!-- Reposition map -->
            <!-- <div class="container text-center">
              <button type="button" class="btn btn-outline-danger btn-just-icon center" id="reposition"><i class="fa fa-refresh"></i></button>
            </div> -->
            <hr>
            <!-- Driver details -->
            <div class="container col-12">
              <button type="button" class="btn btn-outline-danger btn-round pull-left" id="patient" onclick="locate()"><i class="fa fa-user"></i> Patient</button>
              <button type="button" class="btn btn-outline-danger btn-round pull-right" id="hospital" onclick="hospDistance()"><i class="fa fa-hospital-o"></i> Hospital</button>
              <br><br><br>
              <ul class="list-group">
                <li class="list-group-item">
                  <i class="fa fa-map-marker float-left text-danger"></i>
                  <span class="col-12" id="distance"></span>
                </li>
                <li class="list-group-item">
                  <i class="fa fa-clock-o float-left text-danger"></i>
                  <span class="col-12" id="duration"></span>
                </li>
                <li class="list-group-item">
                  <i class="fa fa-phone float-left text-danger"></i>
                  <span class="col-12" id="phone"><a href="tel:8973077187">8973077187</a></span>
                </li>
              </ul>
              <br>
              <button type="button" class="btn btn-outline-danger btn-round" id="end"> End Trip</button>
              <br><br><br><br>
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

  // Maps
  var map;

  // Locates user on page load
  function locate() {
  var markerArray = [];

  // Instantiate a directions service.
  var directionsService = new google.maps.DirectionsService;


  var bounds = new google.maps.LatLngBounds;



  // Create a map and center it on Manhattan.
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: {lat: 28.542327, lng: 77.334718}
  });

  // Create a renderer for directions and bind it to the map.
  var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

  // Instantiate an info window to hold step text.
  var stepDisplay = new google.maps.InfoWindow;

  // Display the route between the initial start and end selections.
  calculateAndDisplayRoute(
      directionsDisplay, directionsService, markerArray, stepDisplay, map);
  // Listen to change events from the start and end lists.
  var onChangeHandler = function() {
    calculateAndDisplayRoute(
        directionsDisplay, directionsService, markerArray, stepDisplay, map);
  };
  document.getElementById('start').addEventListener('change', onChangeHandler);
  document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute(directionsDisplay, directionsService,
    markerArray, stepDisplay, map) {
  // First, remove any existing markers from the map.
  for (var i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(null);
  }
   var start =new google.maps.LatLng(28.542327, 77.334718);
   var end=new google.maps.LatLng(28.543796,77.331004);
  // Retrieve the start and end locations and create a DirectionsRequest using
  // WALKING directions.
  directionsService.route({
    origin: start,
    destination: end,
    travelMode: 'DRIVING'
  }, function(response, status) {
    // Route the directions and pass the response to a function to create
    // markers for each step.
    if (status === 'OK') {
      document.getElementById('warnings-panel').innerHTML =
          '<b>' + response.routes[0].warnings + '</b>';
      directionsDisplay.setDirections(response);
      //showSteps(response, markerArray, stepDisplay, map);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
  calcDistance();
}

function calcDistance()
{
var origin = new google.maps.LatLng(28.542327, 77.334718);
var destination = new google.maps.LatLng(28.543796,77.331004);

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
         $("#distance").html(distance);
         $("#duration").html(duration);

      }
    }
  }
}
 );
 }

</script>



<script type="text/javascript">


function hospDistance() {
  var markerArray = [];

  // Instantiate a directions service.
  var directionsService = new google.maps.DirectionsService;


  var bounds = new google.maps.LatLngBounds;
  var markersArray = [];


  // Create a map and center it on Manhattan.
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 15,
    center: {lat: 28.543796, lng: 77.331004}
  });

  // Create a renderer for directions and bind it to the map.
  var directionsDisplay = new google.maps.DirectionsRenderer({map: map});

  // Instantiate an info window to hold step text.
  var stepDisplay = new google.maps.InfoWindow;

  // Display the route between the initial start and end selections.
  calculateAndDisplayRoute1(
      directionsDisplay, directionsService, markerArray, stepDisplay, map);
  // Listen to change events from the start and end lists.
  var onChangeHandler = function() {
    calculateAndDisplayRoute1(
        directionsDisplay, directionsService, markerArray, stepDisplay, map);
  };
  document.getElementById('start').addEventListener('change', onChangeHandler);
  document.getElementById('end').addEventListener('change', onChangeHandler);
}

function calculateAndDisplayRoute1(directionsDisplay, directionsService,
    markerArray, stepDisplay, map) {
  // First, remove any existing markers from the map.
  for (var i = 0; i < markerArray.length; i++) {
    markerArray[i].setMap(null);
  }
   var start =new google.maps.LatLng(28.543796,77.331004);
   var end=new google.maps.LatLng(28.545086, 77.333784);
  // Retrieve the start and end locations and create a DirectionsRequest using
  // WALKING directions.
  directionsService.route({
    origin: start,
    destination: end,
    travelMode: 'DRIVING'
  }, function(response, status) {
    // Route the directions and pass the response to a function to create
    // markers for each step.
    if (status === 'OK') {
      document.getElementById('warnings-panel').innerHTML =
          '<b>' + response.routes[0].warnings + '</b>';
      directionsDisplay.setDirections(response);
      //showSteps(response, markerArray, stepDisplay, map);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
  calcDistance1();
}


function calcDistance1()
{
var origin1 = new google.maps.LatLng(28.543796,77.331004);
var destinationB = new google.maps.LatLng(28.545086, 77.333784);

var service = new google.maps.DistanceMatrixService();
service.getDistanceMatrix(
  {
    origins: [origin1],
    destinations: [destinationB],
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
        $("#distance").html(distance);
         $("#duration").html(duration);

      }
    }
  }
}
 );
 }
 </script>
 <script>

  $("#end").click(function() {
    window.location.href = "dash.php";
  });
</script>
<script>

  // Repositions driver to center
  $("#reposition").click(function() {
    var lat = $("#lat").html();
    var lon = $("#lon").html();
    var center = new google.maps.LatLng(lat, lon);
    map.panTo(center);
  });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1l44VLK6fd3bz91bV4IRBlnIl-7S9BW8" async defer></script>

</html>
