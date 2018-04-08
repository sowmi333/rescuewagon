<?php

	//Sets the base directory of the host
    if(!defined('BASE')){
        define('BASE', $_SERVER["DOCUMENT_ROOT"]);
    }

	//Includes the database file that establishes the connection to the database
    include_once BASE.'/assets/includes/db.php';

	//Initiates the prepared statement
	$stmt = mysqli_stmt_init($connection);

  $driverId = $_POST['driverId'];
  $password = $_POST['driverPassword'];

	//Calls the function ValidateUser() with the arguments $email,$password,$stmt,$connection and holds the return value of that function
	validateDriver($driverId,$password,$stmt,$connection);

	//Function that validates the user
	function validateDriver($driverId, $password, $stmt, $connection){
    //Starts the session if it is not already started
  	if(!isset($_SESSION)){
  		session_start();
  	}

    $password = md5($password);
		//Following code selects the st_id and status from database for the credentials
		$query = "SELECT driver_id, vehicle_id, driver_name, phone from drivers where driver_id = (?) and password = (?)";

		//Data is passed to the database using prepared statements to avoid SQL Injection attacks
		mysqli_stmt_prepare($stmt,$query);
		mysqli_stmt_bind_param($stmt,"ss",$driverId,$password);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_bind_result($stmt,$driverId, $vehicleId, $driverName, $phone);
		mysqli_stmt_store_result($stmt);

		if(mysqli_stmt_num_rows($stmt) == 1) {
        while (mysqli_stmt_fetch($stmt)) {
            $_SESSION['vehicleId'] = $vehicleId;
            $_SESSION['driverId'] = $driverId;
            $_SESSION['driverName'] = $driverName;
            $_SESSION['phone'] = $phone;
        }
        echo "success";
		}
		else {
        echo "error";
		}
    mysqli_close($connection);
	}

	?>
