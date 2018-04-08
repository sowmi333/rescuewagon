<?php
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
	<link href="assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />

</head>

<body>
    <nav class="navbar navbar-expand-md bg-danger fixed-top">
        <div class="container text-center">
            <div class="navbar-translate">
                <a class="navbar-brand" href="#"><i class="fa fa-heartbeat"></i></a>
            </div>
        </div>
    </nav>
    <div class="wrapper">
            <div class="section section-buttons">
                <div class="container text-center">

                  <?php
                    if((isset($_SESSION['error'])) && ($_SESSION['error'] == 1)) {
                      echo "<br id='alert'><div class='alert alert-danger' id='alert'>
                          <div class='container'>
                              <span>Invalid Login!</span>
                                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <i class='nc-icon nc-simple-remove'></i>
                                  </button>
                          </div>
                      </div>";
                      //Destroys the user's session
                    	session_destroy();
                    }
                  ?>
                  <br>
                  <div class="tim-title">
                      <h3 class="text-danger">RescueWagon</h3>
                  </div>
                  <br>
                  <br>
                  <div class="nav-tabs-navigation">
                      <div class="nav-tabs-wrapper">
                          <ul class="nav nav-tabs" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" data-toggle="tab" href="#follows" role="tab">User</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" data-toggle="tab" href="#following" role="tab">Driver</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <div class="tab-content following">
                      <div class="tab-pane active" id="follows" role="tabpanel">
                          <div class="row">
                              <div class="col-md-6 ml-auto mr-auto">
                                  <ul class="list-unstyled follows">
                                      <li>
                                          <div class="row">
                                            <div class="col-12">
                                            <form action="/assets/includes/validateUser.php" method="post">
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <input type="text" id="userId" class="form-control" placeholder="User ID" aria-describedby="userId">
                                                    <span class="input-group-addon"><i class="fa fa-user-circle-o text-danger" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-12">
                                                <div class="input-group">
                                                    <input type="password" id="userPassword" class="form-control" placeholder="Password" aria-describedby="userPassword">
                                                    <span class="input-group-addon"><i class="fa fa-lock  text-danger" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <div class="col-12">
                                                <div class="input-group">
                                                  <button type="submit" class="btn btn-outline-danger btn-round btn-block" id="signInUser">Sign In</button>
                                                </div>
                                            </div>
                                          </div>
                                          </div>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="tab-pane" id="following" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6 ml-auto mr-auto">
                                <ul class="list-unstyled follows">
                                    <li>
                                        <div class="row">
                                          <div class="col-12">
                                          <form action="/assets/includes/validateDriver.php" method="post">
                                          <div class="col-12">
                                              <div class="input-group">
                                                  <input type="text" id="driverId" class="form-control" placeholder="Driver ID" aria-describedby="driverId">
                                                  <span class="input-group-addon"><i class="fa fa-ambulance text-danger" aria-hidden="true"></i></span>
                                              </div>
                                          </div>
                                          <br>
                                          <div class="col-12">
                                              <div class="input-group">
                                                  <input type="password" id="driverPassword" class="form-control" placeholder="Password" aria-describedby="driverPassword">
                                                  <span class="input-group-addon"><i class="fa fa-lock  text-danger" aria-hidden="true"></i></span>
                                              </div>
                                          </div>
                                          <br>
                                          <br>
                                          <div class="col-12">
                                              <div class="input-group">
                                                <button type="submit" class="btn btn-outline-danger btn-round btn-block" id="signInDriver">Sign In</button>
                                              </div>
                                          </div>
                                        </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      </div>
                  </div>
                  <br>
                  <div class="credits ml-auto">
                      <span class="copyright">
                          © <script>document.write(new Date().getFullYear())</script>, Made for India
                      </span>
                  </div>
                  </div>
                  <br>
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
  $(".close").click(function() {
    $("#alert").css("display","none");
  });
</script>
<script>
$("#signInUser").click(function() {
  var userId = $("#userId").val();
  var userPassword = $("#userPassword").val();
  $.post("/assets/includes/validateUser.php",
  {
  		userId: userId,
  		userPassword: userPassword
  },
  function(data, status){
    if(data == "success") {
      window.location.href = "/home.php";
    }
    else {
      $("#alert").css("display","none");
    }
  });
});
$("#signInDriver").click(function() {
  var driverId = $("#driverId").val();
  var driverPassword = $("#driverPassword").val();
  $.post("/assets/includes/validateDriver.php",
  {
  		driverId: driverId,
  		driverPassword: driverPassword
  },
  function(data, status){
    if(data == "success") {
      window.location.href = "/dash.php";
    }
    else {
      $("#alert").css("display","none");
    }
  });
});
</script>
</html>
