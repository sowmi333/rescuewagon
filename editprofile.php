<?php
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

	<!-- Bootstrap core CSS     -->
	<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="/assets/css/paper-kit.css?v=2.1.0" rel="stylesheet"/>

	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="/assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/css/nucleo-icons.css" rel="stylesheet">
	<link href="/assets/css/style.css" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-expand-md bg-danger">
			<div class="container">
					<div class="navbar-translate">
							<a class="navbar-brand" href="/dash.php"><i class="fa fa-heartbeat"></i></a>
					</div>
			</div>
	</nav>
	<div class="alert alert-success notification-success hidden text-center">
			<div class="container">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="nc-icon nc-simple-remove"></i>
					</button>
					<span id="notify-success">Profile updated successfully!</span>
			</div>
	</div>
	<div class="alert alert-danger notification-error hidden text-center">
			<div class="container">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<i class="nc-icon nc-simple-remove"></i>
					</button>
					<span id="notify-error">Error updating your profile</span>
			</div>
	</div>
	<div class="section profile-content"></div>
	<br>
	<br>
    <div class="wrapper">
        <div class="section profile-content">
            <div class="container">
                <div class="owner">
                    <div class="avatar">
                        <img src="https://www.moonlight-limo.net/wp-content/uploads/2015/05/icon-driver.png" alt="Circle Image" class="img-circle img-padding img-responsive">
                    </div>
                    <div class="name">
                    	<h4 class="title"><?php echo $_SESSION['driverName']; ?><br></h4>
											<h6 class="description">Driver ID: <?php echo $_SESSION['driverId']; ?></h6>
                    </div>
                </div>
								<div class="section profile-content"></div>
								<div class="container">
	                <div class="row">
	                    <div class="col-12 mr-auto text-center">
												<div class="input-group input-group-sm mb-3">
														<div class="input-group">
															<span class="input-group-addon text-danger"><i class="fa fa-user"></i></span>
																<input type="text" class="form-control" id="driverName" value="<?php echo $_SESSION['driverName']; ?>" aria-describedby="driverName" name="driverName">
														</div>
												</div>
												<div class="input-group input-group-sm mb-3">
														<div class="input-group">
															<span class="input-group-addon text-danger"><i class="fa fa-phone"></i></span>
																<input type="text" class="form-control" id="driverPhone" value="<?php echo $_SESSION['phone']; ?>" aria-describedby="driverName" name="driverPhone">
														</div>
												</div>
												<div class="input-group input-group-sm mb-3">
														<div class="input-group">
															<span class="input-group-addon text-danger"><i class="fa fa-ambulance"></i></span>
																<input type="text" class="form-control" id="vehicleId" value="<?php echo $_SESSION['vehicleId']; ?>" aria-describedby="vehicleId" name="vehicleId">
														</div>
												</div>
												<br>
	                    	<btn class="btn btn-outline-danger btn-round" id="update"><i class="fa fa-cog"></i> Update</btn>
	                    </div>
	                </div>
								</div>
            </div>
        </div>
    </div>
	<footer class="footer section-dark">
        <div class="container">
            <div class="row">
                <div class="credits ml-auto">
                    <span class="copyright">
                        © <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
                    </span>
                </div>
            </div>
        </div>
    </footer>
</body>

<!-- Core JS Files -->
<script src="/assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="/assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<!-- <script src="../assets/js/tether.min.js" type="text/javascript"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Paper Kit Initialization snd functons -->
<script src="/assets/js/paper-kit.js?v=2.1.0"></script>
<script>
	$("#update").click(function() {
		var driverPhone = $("#driverPhone").val();
		var driverName = $("#driverName").val();
		var vehicleId = $("#vehicleId").val();
		$.post("/assets/includes/editprofile.php",
		{
				driverPhone: driverPhone,
				driverName: driverName,
				vehicleId: vehicleId
		},
		function(data, status){


				if(data == "success") {
					$(".notification-success").css("display", "block");
					$(".notification-error").css("display", "none");
				}
				if(data == "error") {
					$(".notification-error").css("display", "block");
					$(".notification-success").css("display", "none");
				}
				setTimeout(function() {
					window.location.href = "/editprofile.php";
				}, 5000);
		});
	});
</script>

</html>
