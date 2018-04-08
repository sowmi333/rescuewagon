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
        <div class="main">
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
                  <div class="row">
                      <div class="col-12">
                      <form action="/assets/includes/validateUser.php" method="post">
                      <div class="col-12">
                          <div class="input-group">
                              <input type="text" class="form-control" placeholder="User ID" aria-describedby="userId" name="userId" required>
                              <span class="input-group-addon" id="userId"><i class="fa fa-user-circle-o text-danger" aria-hidden="true"></i></span>
                          </div>
                      </div>
                      <br>
                      <div class="col-12">
                          <div class="input-group">
                              <input type="password" class="form-control" placeholder="Password" aria-describedby="password" name="password" required>
                              <span class="input-group-addon" id="password"><i class="fa fa-lock  text-danger" aria-hidden="true"></i></span>
                          </div>
                      </div>
                      <br>
                      <br>
                      <div class="col-12">
                          <div class="input-group">
                            <button type="submit" class="btn btn-outline-danger btn-round btn-block" id="signIn">Sign In</button>
                          </div>
                      </div>
                    </div>
                    </div>
                  </div>
                  <br>
                </div>
              </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="credits ml-auto">
                            <span class="copyright">
                                © <script>document.write(new Date().getFullYear())</script>, Made for India
                            </span>
                        </div>
                    </div>
                </div>
            </footer>
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
</html>
