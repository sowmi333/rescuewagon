<?php 
//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
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
  <meta http-equiv="refresh" content="5";/>

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
              <a class="navbar-brand" href="#"><i class="fa fa-heartbeat"></i></a>
          </div>
      </div>
  </nav>

  <div class="wrapper">
    <div class="main">
      <br>
      <div class="container">
			<div class="list-group">
    <a href="ambulance_route.php" class="list-group-item">
	<span class="float-Left" id="hospital">Vehicle ID:</span>
	<span class="col-12" id="hospital">ECHN101</span></li>
	</a>
    <a href="ambulance_route1.php" class="list-group-item">
	<span class="float-Left" id="hospital">Vehicle ID:</span>
	<span class="col-12" id="hospital">ECHN102</span></li>
	</a>
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

<script type="text/javascript">
    document.getElementById("call").onclick = function () {
        location.href = "userdash.php";
    };
</script>
<script>
setTimeout(function(){
   window.location.reload(1);
}, 5000);
</script>

</html>
