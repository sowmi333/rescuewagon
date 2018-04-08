<?php
//Starts the session if it is not already started
if(!isset($_SESSION)){
  session_start();
}

if(!isset($_SESSION['userId'])) {
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
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/css/paper-kit.css?v=2.1.0" rel="stylesheet" />

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <!--  CSS for Demo Purpose, don't include it in your project     -->
  <link href="assets/css/demo.css" rel="stylesheet" />

  <!--     Fonts and icons     -->
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/style.css" rel="stylesheet" />
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
		  <br><br><br><br>
				<button type="button" id="call" class="btn btn-danger btn-circle btn-xl"><p style="margin: 0 auto;width:100%" class="fa fa-phone"></p>
        </button>
			</div>

        </div>
        <br>
        <br>
        <hr>
        <br>
        <br>
        <div class="container text-center">
          <button type="button" class="btn btn-outline-danger btn-round" id="signout"><i class="fa fa-sign-out"></i>Sign out</button>
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
    document.getElementById("signout").onclick = function () {
        location.href = "/assets/includes/signout.php";
    };
</script>


</html>
